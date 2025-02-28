<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildControllerCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('backend.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.child-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated=$request->validate([
            'category_id'=>'required',
            'sub_category_id'=>'required',
            // 'name'=>'required|max:200|unique:child_categories,name',
            'name' => 'required|max:200|unique:child_categories,name,NULL,id,category_id,' . $request->category_id . ',sub_category_id,' . $request->sub_category_id,
            'status'=>'required',
            ]);
            $childCategory= new ChildCategory();
            $childCategory->category_id=$request->category_id;
            $childCategory->sub_category_id=$request->sub_category_id;
            $childCategory->name=$request->name;
            $childCategory->slug=Str::slug($request->name);
            $childCategory->status=$request->status;
            $childCategory->save();
            toastr('Created Successfully!', 'success');
            return redirect()->route('admin.child-category.index');
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
        $categories=Category::all();
        $childCategory=ChildCategory::findOrFail($id);
        $subCategories=SubCategory::where('category_id', $childCategory->category_id)->get();
        return view('backend.child-category.edit', compact('categories', 'childCategory', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validated=$request->validate([
            'category_id'=>'required',
            'sub_category_id'=>'required',
            // 'name'=>'required|max:200|unique:child_categories,name,' .$id,
            'name' => 'required|max:200|unique:child_categories,name,' . $id . ',id,category_id,' . $request->category_id . ',sub_category_id,' . $request->sub_category_id,

            'status'=>'required',
            ]);
            $childCategory= ChildCategory::findOrFail($id);
            $childCategory->category_id=$request->category_id;
            $childCategory->sub_category_id=$request->sub_category_id;
            $childCategory->name=$request->name;
            $childCategory->slug=Str::slug($request->name);
            $childCategory->status=$request->status;
            $childCategory->save();
            toastr('Update Successfully!', 'success');
            return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategory=ChildCategory::findOrFail($id);
        $childCategory->delete();
        return response(['status'=>'success', 'message'=>"Delete Successfully!"]);
    }
    public function getSubCategories(Request $request){
        $subCategories=SubCategory::where('category_id',$request->id)->where('status', 1)->get();
        return $subCategories;
    }
    public function changeStatus(Request $request){
        $childCategory=ChildCategory::findOrFail($request->id);
        $childCategory->status=$request->status == 'true' ? 1 : 0 ;
        $childCategory->save();

        return response(['message'=>'Status has been Updated!', ]);
    }

}
