<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SlidersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use imageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SlidersDataTable $dataTable)
    {
        // return view('backend.slider.index');
        return $dataTable->render('backend.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'starting_price' => 'required|max:250',
            'serial' => 'required|integer',
            'btn_url' => 'url',
            'status' => 'required',
        ]);
        $slider = new Slider();
        /** handle image upload */
        $imagePath = $this->uploadImage($request, 'banner', 'uploads/slider', $width = 780, $height = 480);
        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->serial = $request->serial;
        $slider->btn_url = $request->btn_url;
        $slider->status = $request->status;
        $slider->save();
        toastr('Slider Create Successfully!', 'success',);
        return redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'starting_price' => 'required|max:250',
            'serial' => 'required|integer',
            'btn_url' => 'url',
            'status' => 'required',
        ]);

        $slider = Slider::findOrFail($id);
        /** handle image upload */
        $imagePath = $this->updateImage($request, 'banner', 'uploads/slider', $slider->banner, $width = 780, $height = 480);
        // $slider->banner=$imagePath;
        $slider->banner = empty(!$imagePath) ? $imagePath : $slider->banner;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->serial = $request->serial;
        $slider->btn_url = $request->btn_url;
        $slider->status = $request->status;
        $slider->save();
        toastr('Slider Update Successfully!', 'success',);
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();
        return response(['status' => 'success', 'message' => 'Delete Successfully!']);
    }
    public function changeStatus(Request $request)
    {
        $slider = Slider::findOrFail($request->id);
        $slider->status = $request->status == 'true' ? 1 : 0;
        $slider->save();

        return response(['message' => 'Status has been Updated!']);
    }
}
