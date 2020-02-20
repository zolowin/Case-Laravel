<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;


class DatatableController extends Controller
{
    public function trData()
    {
        $new_tr = DB::table('transactions')
            ->where('tr_status', '=', '0')
            ->get();

        return Datatables::of($new_tr)->addColumn('action', function ($new_tr) {
            return '<a href="#edit-' . $new_tr->id . '" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>';
        })->make(true);
    }

    public function cateData()
    {
        $categories = Category::all();

        return Datatables::of($categories)->addColumn('action', function ($categories) {
//            return '<a href="../admin/category/edit-category/' . $categories->category_id . '" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            return '<a href="#edit-' . $categories->category_id . '" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#delete-' . $categories->category_id . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>';})
                ->editColum('p_category_id', '{{$categories->category_name}}')
                ->make(true);
    }

    public function proData()
    {
        $products = Product::all();

        return Datatables::of($products)->addColumn('action', function ($products) {
            return '<a href="#edit-' . $products->product_id . '" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#delete-' . $products->product_id . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>';
        })->addColumn('image', function ($products) {
            return  "<img src='{{data:image/jpeg;base64, $products->product_image}}'>";
        })->make(true);
    }
}
