<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomepageFeaturedItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;


class FeaturedSliderController extends Controller
{
    public function index()
    {
        $items = HomepageFeaturedItem::get();

        $products = Product::whereNotIn("id", $items->map(function ($i){ return $i->product_id; })->toArray() )->get();

        return view('backend.featured_sliders.index', compact('items', "products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('slider.create')) {
            abort(403, 'unauthorized');
        }

        $data = $request->validate([
            'product_id' => 'required'
        ]);

        HomepageFeaturedItem::create($data);

        return response()->json(['status' => true, 'msg' => 'Slider Is  Created !!', 'url' => route('admin.featured-sliders.index')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('slider.create')) {
            abort(403, 'unauthorized');
        }

        return view('backend.sliders.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('slider.edit')) {
            abort(403, 'unauthorized');
        }

        $item = Slider::find($id);


        return view('backend.featured_sliders.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('slider.edit')) {
            abort(403, 'unauthorized');
        }

        $slider = Slider::find($id);
        $data = $request->validate([
            'title' => 'required',
            'link' => '',
        ]);

        if ($request->hasFile('image')) {
            deleteImage('sliders', $slider->image);
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . time() . '.' . $extension;

            $request->file('image')->move(public_path('sliders'), $fileName);
            $data['image'] = $fileName;
        }

        if ($request->hasFile('mobile_image')) {
            deleteImage('sliders', $slider->mobile_image);
            $originName = $request->file('mobile_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('mobile_image')->getClientOriginalExtension();
            $fileName = $fileName . time() . '.' . $extension;

            $request->file('mobile_image')->move(public_path('sliders'), $fileName);
            $data['mobile_image'] = $fileName;
        }


        $slider->update($data);

        return response()->json(['status' => true, 'msg' => 'Slider Is Updated !!', 'url' => route('admin.featured-sliders.index')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('slider.delete')) {
            abort(403, 'unauthorized');
        }

        $slider = HomepageFeaturedItem::find($id);
        $slider->delete();
        return response()->json(['status' => true, 'msg' => 'Item Is Deleted !!']);

    }

}
