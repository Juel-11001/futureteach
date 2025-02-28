<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;
use Str;

use function Termwind\render;

class BrandController extends Controller
{
    use imageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('backend.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'logo'=>'required|image|max:5120',
            'name' =>'required|unique:brands,name',
            'status' =>'required',
            'is_featured'=>'required'
        ]);
        $logoPath=$this->uploadImageNoResize($request, 'logo','uploads/brands');
        $brand= new Brand();
        $brand->logo=$logoPath;
        $brand->name=$request->name;
        $brand->slug=Str::slug($request->name);
        $brand->is_featured=$request->is_featured;
        $brand->status=$request->status;
        $brand->save();
        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.brand.index');
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
        $brand=Brand::find($id);
        return view('backend.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated=$request->validate([
            'logo'=>'image|max:5120',
            'name' =>'required|unique:brands,name,'.$id,
            'status' =>'required',
            'is_featured'=>'required'
        ]);
        $brand= Brand::findOrFail($id);
        $logoPath=$this->updateImageNoResize($request, 'logo','uploads/brands', $brand->logo);
        $brand->logo=empty(!$logoPath) ? $logoPath : $brand->logo;
        $brand->name=$request->name;
        $brand->slug=Str::slug($request->name);
        $brand->is_featured=$request->is_featured;
        $brand->status=$request->status;
        $brand->save();
        toastr('Update Successfully!', 'success');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        toastr('Deleted Successfully!', 'success');
        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }
    public function changeStatus(Request $request){
        $brand=Brand::findOrFail($request->id);
        $brand->status=$request->status == 'true' ? 1 : 0 ;
        $brand->save();

        return response(['message'=>'Status has been Updated!', ]);
    }
}
