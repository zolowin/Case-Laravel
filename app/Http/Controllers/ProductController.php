<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
//        $data = \request()->validate([
//            'product_name' => 'required|unique:products',
//            'product_chip' => 'required',
//            'product_ram' => 'required',
//            'product_battery' => 'required',
//            'product_screen' => 'required',
//            'product_camera_resolution' => 'required',
//            'product_price' => 'required',
//            'product_color' => 'required',
//            'product_weight' => 'required',
//            'product_sim_slot' => 'required',
//            'product_guarantee' => 'required',
//            'product_operating_system' => 'required',
//            'product_origin' => 'required',
//            'product_year_made' => 'required',
//            'product_sku' => 'required'
//        ]);

//        $product = new Product();
//        dd($product);
//
//        $product->product_name = $request['product_name'];
//        $product->product_chip = $request['product_chip'];
//        $product->product_ram = $request['product_ram'];
//        $product->product_battery = $request['product_battery'];
//        $product->product_screen = $request['product_screen'];
//        $product->product_camera_resolution = $request['product_camera_resolution'];
//        $product->product_price = $request['product_price'];
//        $product->product_color = $request['product_color'];
//        $product->product_weight = $request['product_weight'];
//        $product->product_sim_slot = $request['product_sim_slot'];
//        $product->product_guarantee = $request['product_guarantee'];
//        $product->product_operating_system = $request['product_operating_system'];
//        $product->product_origin = $request['product_origin'];
//        $product->product_year_made = $request['product_year_made'];
//        $product->product_sku = $request['product_sku'];
//        $product->product_enable = $request['product_enable'];
//        $product->save();
//        dd($request->all());

        $product = Product::create($request->all());
        if ($request->hasFile('product_image')) {
            $image = base64_encode(file_get_contents($request->file('product_image')));
            $product->product_image = $image;
//            dd($product->getAttributes()['product_image']);
        }
        $product->save();
        $success = "Thêm Sản Phẩm Thành Công";

        return redirect('product/manage-product')->with('success', $success);
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
        $products = Product::all();
        $categories = Category::all();
        return view('admin.edit_product', compact('product','products' , 'categories'));
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
        $product = Category::findOrFail($id);
        $categories = Category::all();


        $success = "Sửa Sản Phẩm Thành Công";

        return redirect()->route('category.edit', [$id])->with('success', $success);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete($category->category_id);
        $success = "Xóa Danh Mục $category->category_name Thành Công";

        return redirect('category/manage-category')->with('success', $success);
    }
}
