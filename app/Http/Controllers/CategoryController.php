<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use mysql_xdevapi\Session;


class   CategoryController extends Controller
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
        $categories = Category::paginate(10);
        return view('admin.manage_category', compact('categories'));
    }

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_category', compact('categories'));
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
//            'category_name' => 'required',
//            'category_alias' => 'required',
//            'category_status' => 'required',
//            'category_enable' => 'required',
//            'p_category_id' => 'required'
//        ]);

        Category::create($request->all());
        $success = "Thêm Danh Mục Thành Công";

        return redirect('admin/category/create-category')->with('success', $success);
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
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_category', compact('category', 'categories'));
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
        $category = Category::findOrFail($id);

        $category->update($request->all());
        $success = "Sửa Danh Mục Thành Công";

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

        return redirect('admin/category/')->with('success', $success);
    }
}
