<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use DB;

class AuthController extends Controller
{
    public function sellerRegister()
    {

        return view('auth.seller_register');
    }

    public function sellerRegisterPost(Request $request)
    {

        $request->validate([
            'email' => 'nullable|email|unique:users',
            'username' => 'required|min:6|unique:users',
            'first_name' => 'required',
            'business_name' => '',
            'last_name' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $data = $request->all();
        $user = $this->create($data);
        $user->is_seller = 1;
        $user->status = 1;
        $user->save();
        $user->assignRole('vendor');
        $url = session()->get('url');

        if (empty($url)) {

            $url = route('front.home');
        }

        // $credentials = $request->only('email', 'password');

        return response()->json(['success' => true, 'msg' => 'Successfully Create Seller Account!', 'url' => route('front.home')]);

    }

    public function create(array $data)
    {

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     * @method POST
     */
    public function login(Request $request): JsonResponse
    {
        $date = date('Y-m-d H:i:s');
        $date = strtotime($date);
        $date = strtotime("+3 minute", $date);
        $new_date = date('Y-m-d H:i:s', $date);
//        $otp = rand(100000, 999999);
        $otp = 12345;

        $data = request()
                    ->validate([
//                        'phone' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/'
                        'phone' => 'required'
                    ]);

        $data['otp_verify'] = $otp;
        $data['exp_time'] = $new_date;

        session()->put('user_data', $data);
        $number = request('phone');
        $msg = 'Your One-Time PIN is ' . $otp . '. It will expire in 3 minutes.Visit softitsecurity.com';
        $success = sendSMS($number, $msg);
        $res = json_decode($success);

        $url = route('front.getOpt');

        if (1 || isset($res->Status) && ($res->Status == '0')) {
            return response()->json(['success' => true, 'msg' => 'PIN Is Send Please Check Your Phone', 'url' => $url]);
        } else {
            return response()->json(['success' => false, 'msg' => 'Something Went Wrong . try again Later !']);
        }
    }

    public function getOpt()
    {

        $user_data = session()->get('user_data');

        if (empty($user_data)) {
            return redirect()->route('login');
        }

        return view('auth.otp_verify');
    }

    public function optVerify()
    {

        $user_data = session()->get('user_data');
        date_default_timezone_set("Asia/Dhaka");


        if (empty($user_data)) {
            return redirect()->route('login');
        }

        $exp_date = date('Y-m-d H:i:s');
        if (request('button') == 'Save') {
            request()->validate([
                'otp_verify' => 'required',
            ]);

            if ($user_data['otp_verify'] != request('otp_verify')) {
                return back()->with('error_msg', 'PIN Is Not Match. please try again !');
            }

            if ($user_data['exp_time'] < $exp_date) {
                return back()->with('error_msg', 'Time Is Expired!');
            }

            $user = User::where('mobile', $user_data['phone'])->first();
            if ($user) {
                Auth::loginUsingId($user->id);
                session()->put('user_data', []);

                if (auth()->user()->type == '1') {
                    session()->put('cart', []);
                }
                return redirect(url('/checkouts'))->with('success_msg', 'Login Success!');
            } else {
                $user = $this->createUser($user_data);
                if ($user) {
                    Auth::loginUsingId($user->id);
                    session()->put('user_data', []);
                    return redirect(url('/checkouts'))->with('success_msg', 'Login Success!');
                } else {

                    return back()->with('error_msg', 'Something Went Wrong . try again !');
                }
            }
        } else if (request('button') == 'Resend') {
            $date = date('Y-m-d H:i:s');
            $date = strtotime($date);
            $date = strtotime("+3 minute", $date);
            $new_date = date('Y-m-d H:i:s', $date);
            $otp = rand(100000, 999999);
            $user_data['exp_time'] = $new_date;
            $user_data['otp_verify'] = $otp;
            session()->put('user_data', $user_data);
            $number = $user_data['phone'];
            $msg = 'Your One-Time PIN is ' . $otp . '. It will expire in 3 minutes.Visit softitsecurity.com';

            $success = sendSMS($number, $msg);
            $res = json_decode($success);
            if (isset($res->Status) && ($res->Status == '0')) {
                return redirect()->route('front.getOpt')->with('status', 'PIN Is Send Check Your Phone');
            } else {
                return back()->with('error_msg', 'OTP Is Send Check Your Phone');
            }


        }
    }

    private function createUser($data)
    {
        $user = User::create([
            'mobile' => $data['phone'],
        ]);
        return $user;
    }

    public function register(Request $request)
    {


        //     $number='01863651124';
        //   	$message='01863651124';

        //   	$res=SendSms($number,$message);
        //   	$status=json_decode($res)->status_code;

        $request->validate([
            'email' => 'nullable|email|unique:users',
            'username' => 'required|min:6|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        $url = session()->get('url');

        if (empty($url)) {
            $url = route('front.home');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['success' => true, 'msg' => 'Successfully Register !', 'url' => route('front.home')]);
        }
        return response()->json(['success' => false, 'msg' => 'Oppes! You have entered invalid credentials !']);

    }

}
