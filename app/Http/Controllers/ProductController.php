<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(7);
        return view('admin.manage_product', compact('categories','products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(22);
//        dd($request->all());

        $product = Product::create($request->all());
        $product->product_slug = strtolower(str_replace(' ', '-',$product->product_name));
        if ($request->hasFile('product_image')) {
            $image = base64_encode(file_get_contents($request->file('product_image')));
            $product->product_image = $image;
        }
        $product->save();
        $success = "Thêm Sản Phẩm Thành Công";

        return redirect('admin/product/')->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_product', compact('product' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        if ($request->hasFile('product_image')) {
            $image = base64_encode(file_get_contents($request->file('product_image')));
            $product->product_image = $image;
        }

        $product->save();
        $success = "Sửa Sản Phẩm Thành Công";

        return redirect()->route('product.index')->with('success', $success);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete($product->product_id);
        $success = "Xóa Danh Mục $product->product_name Thành Công";

        return redirect('admin/product/')->with('success', $success);
    }
}
