<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $new_tr = DB::table('transactions')
            ->where('tr_status' , '=', '0')
            ->get();

        $users = DB::table('users')
            ->where('level' , '<>','2')
            ->get();

        $categories = Category::all();

        $products = Product::orderBy('product_id', 'desc')->get();

        return view('admin.dashboard', compact('new_tr', 'users', 'categories', 'products'));
    }

}
