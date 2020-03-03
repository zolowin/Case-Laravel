<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $slider_products = Product::orderBy('product_price','desc')
                                    ->take(4)
                                        ->get();
        $latest_products = Product::orderBy('created_at', 'desc')
                                    ->take(10)
                                        ->get();

        $orders = Order::orderBy('or_qty', 'desc')
                                    ->take(3)
                                        ->get();

        $topSell_product = [];
        foreach ($orders as $order){
            $product = Product::findOrFail($order->or_product_id);
            array_push($topSell_product, $product);
        }

        $top_new = DB::table('products')
            ->join('orders', 'products.product_id', '=', 'orders.id')
            ->select('products.*')
            ->orderBy('products.created_at', 'desc')
            ->take(3)
            ->get();
        return view('page.index', compact('slider_products', 'latest_products', 'topSell_product', 'top_new'));
    }


    public function shop(){
        $products = Product::paginate(12);
        return view('page.shop', compact('products'));
    }

    public function show_product($product_slug){
        $product = Product::where('product_slug',$product_slug)->first();
        $related_products = Product::where('product_category_id', $product->product_category_id)
                                    ->where('product_name','<>', $product->product_name)
                                        ->orderBy('product_price','desc')
                                            ->take(6)->get();

        $latest_products = Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('page.single-product', compact('product', 'related_products', 'latest_products'));
    }

    public function category($category_alias){
        $category = Category::where('category_alias', $category_alias)->first();
        $products = Product::where('product_category_id', $category->category_id)->paginate(12);
        return view('page.category_page', compact('category', 'products'));
    }

    public function find_product(Request $request) {
        $key_find = $request->input('name');
        $products = Product::where('product_name',  strtolower($key_find))->get();
        return view('page.search_product', compact('products', 'key_find'));
    }
}
