<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\HomeSectionImage;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Page;

class HomeController extends Controller
{
    public function sendSMs()
    {

    }


    /**
     * @return View
     */
    public function home(): View
    {
        $sliders = Slider::latest()->get();

        $brands = Type::whereNotNull('is_top')
            ->take(12)
            ->get();

        $cats = Category::whereNull('parent_id')
                        ->where('is_popular', 1)
                        ->with('subcats')
                        ->get();

        $images = HomeSectionImage::all();

        return view('frontend.home', compact('sliders', 'cats', 'brands', 'images'));
    }

    public function aboutUs()
    {
        $page = Page::where('page', 'about')->first();
        return view('frontend.about_us', compact('page'));
    }

    public function contactUs()
    {

        return view('frontend.contact_us');

    }

    public function privacyPolicy()
    {

        return view('frontend.privacy_policy');

    }

    public function termCondition()
    {
        $page = Page::where('page', 'term')->first();
        return view('frontend.term_and_condition', compact('page'));

    }


    public function faq()
    {
        return view('frontend.faq');
    }

    public function returnPolicy()
    {
        return view('frontend.return_policy');
    }

    public function contact(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'email' => '',
            'message' => 'required',
        ]);

        Contact::create($data);

        return response()->json(['success' => true, 'msg' => 'Successfully Created Your Info!']);


    }

}
