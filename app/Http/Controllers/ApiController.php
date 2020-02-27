<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ApiController extends Controller
{
    public function renderProductView(Request $request)
    {
        if ( $request->ajax()){
            $listId = $request->product_id;
            $products = Product::whereIn('product_id', $listId)->get();
            $html = view('page.recent_view', compact('products'))->render();

            return response()->json($html);
        }
    }

    public function renderProductSearch(Request $request) {
        $key_find = \request('key-search');
        $products = Product::where('product_name', 'like', '%' . strtolower($key_find) . '%')->get();
        $html = view('page.search_ajax', compact('products'))->render();
        return response()->json($html);
    }
}
