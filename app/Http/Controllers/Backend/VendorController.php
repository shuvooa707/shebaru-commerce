<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Type;
use DB;
use Illuminate\Http\Response;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('backend.vendors.index', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request): mixed
    {
//        if (!auth()->user()->can('vendor.create')) {
//            abort(403, 'unauthorized');
//        }

        $data = $request->validate([
            'name' => 'required',
            'phone' => "string",
            "email" => "email",
            "whatsapp" => "string",
            "facebook_link" => "string",
            "address" => "string"
        ]);

        if ($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . time() . '.' . $extension;

            $request->file('image')->move(public_path('vendors'), $fileName);
            $data['image'] = $fileName;
        }

        Vendor::create($data);

        return response()->json(['status' => true, 'msg' => 'Vendor Is  Created !!', 'url' => route('admin.vendors.index')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (!auth()->user()->can('type.create')) {
            abort(403, 'unauthorized');
        }

        return view('backend.vendors.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('type.edit')) {
            abort(403, 'unauthorized');
        }

        $vendor = Vendor::find($id);
        return view('backend.vendors.edit', compact('vendor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
//        if (!auth()->user()->can('type.delete')) {
//            abort(403, 'unauthorized');
//        }

        Vendor::find($id)?->delete();
        return response()->json(['status' => true, 'msg' => 'Vendor Is Deleted !!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('type.edit')) {
            abort(403, 'unauthorized');
        }

        $category = Vendor::find($id);
        $data = $request->validate([
            'name' => 'required',
            'phone' => "string",
            "email" => "email",
            "whatsapp" => "string",
            "facebook_link" => "string",
            "address" => "string"
        ]);

        if ($request->hasFile('image')) {
            deleteImage('vendors', $category->image);
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . time() . '.' . $extension;

            $request->file('image')->move(public_path('vendors'), $fileName);
            $data['image'] = $fileName;
        }

        $category->update($data);

        return response()->json(['status' => true, 'msg' => 'Vendor Is Updated !!', 'url' => route('admin.vendors.index')]);

    }
}
