<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use mysql_xdevapi\Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(7);
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
        $data = \request()->validate([
            'category_name' => 'required',
            'category_alias' => 'required',
            'category_status' => 'required',
            'category_enable' => 'required',
            'p_category_id' => 'required'
        ]);

        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_alias = $data['category_alias'];
        $category->category_status = $data['category_status'];
        $category->category_enable = $data['category_enable'];
        $category->p_category_id = $data['p_category_id'];
        $category->save();

        $success = "Thêm Danh Mục Thành Công";

        return redirect('category/create-category')->with('success', $success);
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

        $category->category_name = \request('category_name');
        $category->category_alias = \request('category_alias');
        $category->category_status = \request('category_status');
        $category->category_enable = \request('category_enable');
        $category->p_category_id = \request('p_category_id');
        $category->save();

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

        return redirect('category/manage-category')->with('success', $success);
    }
}
