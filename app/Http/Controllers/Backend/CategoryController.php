<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    use imageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon'=>'required|not_in:empty',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'name'=>'required|max:200|unique:categories,name',
            'status'=>'required',
        ]);
        $imagePath=null;

        if($request->has('image')){
            $imagePath = $this->uploadImageCategory($request, 'image', 'uploads/category' );
        }
        $category= new Category();
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->icon=$request->icon;
        $category->image=$imagePath;
        $category->status=$request->status;
        $category->save();
        toastr('Category Create Successfully!', 'success');
        return redirect()->route('admin.category.index');
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
        $category=Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all);
        $request->validate([
            'icon'=>'required|not_in:empty',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'name'=>'unique:categories,name,'.$id,
            'status'=>'required',
        ]);
        $category=Category::findOrFail($id);
        $imagePath=$category->image;

        if($request->hasFile('image')){
            if ($category->image) {
                $this->deleteImage($category->image);
            }
            $imagePath = $this->uploadImageCategory($request, 'image', 'uploads/category' );
        }
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->icon=$request->icon;
        $category->image=$imagePath;
        $category->status=$request->status;
        $category->save();
        toastr('Category Update Successfully!', 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrFail($id);
        // dd($category);
        $subCategory=SubCategory::where('category_id', $category->id)->count();
        if($subCategory > 0){
            return response(['status'=>'error', 'message'=> 'You can not delete this category because it has sub category!']);
        }
        if($category->image){
            $this->deleteImage($category->image);
        }
        $category->delete();

        return response(['status'=>'success', 'Delete Successfully!']);
        // $category->delete();
    //    return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }
    /** Status */
    public function changeStatus(Request $request){
        $category=Category::findOrFail($request->id);
        $category->status=$request->status == 'true' ? 1 : 0 ;
        $category->save();

        return response(['message'=>'Status has been Updated!', ]);
    }
}
