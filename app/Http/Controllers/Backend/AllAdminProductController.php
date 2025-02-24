<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AllAdminProductsListDataTable;
use App\DataTables\AllAdminProductsPendingDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AllAdminProductController extends Controller
{

    public function index(AllAdminProductsListDataTable $dataTable)
    {
        return $dataTable->render('backend.product.all-product-list.index');
    }
    public function productPending(AllAdminProductsPendingDataTable $dataTable)
    {
        return $dataTable->render('backend.product.all-product-pending.index');
    }
    public function changeApproveStatus(Request $request){
        $product = Product::findOrFail($request->id);
        $product->is_approved=$request->value;
        $product->save();
        return response(['message' => 'Product Approved Status Has Been Changed!']);
    }
}
