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
                                    ->take(10   )
                                        ->get();

        $orders = Order::orderBy('or_qty', 'desc')
                                    ->take(3)
                                        ->get();

        $topSell_product = [];
        foreach ($orders as $order){
            $product = Product::findOrFail($order->or_product_id);
            array_push($topSell_product, $product);
        }
//        dd($topSell_product);

        return view('page.index', compact('slider_products', 'latest_products', 'topSell_product'));
    }


    public function shop(){
        $products = Product::paginate(12);
        return view('page.shop', compact('products'));
    }

    public function show_product($product_slug){
        $product = Product::where('product_slug',$product_slug)->first();
//        dd($product);
//        $category = Category::find($product->product_category_id);
//        dd($product->category->category_name);
        $category_name = $product->category->category_name;
        $related_products = Product::where('product_category_id', $product->product_category_id)
                                    ->where('product_name','<>', $product->product_name)
                                        ->orderBy('product_price','desc')
                                            ->take(6)->get();
        return view('page.single-product', compact('product', 'category_name', 'related_products'));
    }

    public function category(){

        return view('page.category');
    }

    public function find(Request $request) {
        $products = Prodcut::where('product_name', 'like', '%' . strtolower($request->get('q')) . '%')->get();
        return view('page.search', compact('products'));
    }
}
