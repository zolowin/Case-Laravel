<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use  App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use function foo\func;


class DatatableController extends Controller
{
    public function trData()
    {
        $new_tr = DB::table('transactions')
            ->where('tr_status', '=', '0')
            ->get();
        return Datatables::of($new_tr)->addColumn('action', function ($new_tr) {
            return '<button type="button" class="btn btn-primary edit-transaction mr-2" data-toggle="modal" data-target="#edit-transaction" data-id ="' . $new_tr->id . '"><i
                    class="fa fa-edit"></i></button>';
        })->editColumn('tr_user_id', function ($new_tr) {
            return User::find($new_tr->tr_user_id)->name;
        })->editColumn('tr_status', 'Shipping')
            ->make(true);
    }

    public function cateData()
    {
        $categories = Category::all();

        return Datatables::of($categories)->addColumn('action', function ($category) {
//            return '<a href="../admin/category/edit-category/' . $categories->category_id . '" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            return '<div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-primary edit-category mr-2" data-toggle="modal" data-target="#add_category" data-id ="' . $category->category_id . '"><i
                    class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger delete-category" data-toggle="modal" data-target="#confirm-modal" data-id ="' . $category->category_id . '"><i
                    class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function proData()
    {
        $products = Product::all();

        return Datatables::of($products)->addColumn('action', function ($product) {
            return '<button id="#edit-' . $product->product_id . '" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button id="#delete-' . $product->product_id . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>';
        })->addColumn('image', function ($product) {
            return "<img src='{{" . "'" . "data:image/jpeg;base64, " . "'$product->product_image}}'>";
        })->make(true);
    }

    public function userData()
    {
        $users = DB::table('users')
            ->where('level', '<>', '2')
            ->get();
        return DataTables::of($users)->addColumn('action', function ($user) {
            return '<button id="#edit-' . $user->id . '" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button id="#delete-' . $user->id . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>';
        })->editColumn('level', function () {
            return 'customer';
        })->make(true);
    }

    public function getDeletedData()
    {
        $deletedCategory = Category::onlyTrashed();

        if (request()->ajax()) {
            return DataTables::of($deletedCategory)
                ->addColumn('action', function ($deletedCategory) {
                    return '<div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-primary restore-category" data-id ="' . $deletedCategory->category_id . '"><i
            class="fa fa-undo"></i></button>' .
                        '<button type="button" class="btn btn-outline-primary force-delete" data-toggle="modal" data-target="#confirm-modal" data-id ="' . $deletedCategory->category_id . '"><i
            class="fa fa-trash"></i></button>
            </div>';
                })
                ->addColumn('Total Products', function ($deletedCategory) {
                    return $deletedCategory->products->count();
                })
                ->make(true);
        }
    }
}
