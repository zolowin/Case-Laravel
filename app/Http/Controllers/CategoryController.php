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
//    public function index()
//    {
//        $categories = Category::paginate(10);
//        return view('admin.manage_category', compact('categories'));
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        $categories = Category::all();
//        return view('admin.create_category', compact('categories'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($this->validateAttribute());

        return redirect()->route('admin.dashboard');
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
//        $categories = Category::all();
//        return view('admin.edit_category', compact('category', 'categories'));
        return response()->json($category, 200);
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

        $category->update($this->validateAttribute());
        $success = "Sửa Danh Mục Thành Công";

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if (\request('delete-action') == 'SoftDelete') {
            Category::destroy($id);
        } else {
            Category::onlyTrashed()->where('category_id', $id)->forceDelete();
        }

        return redirect('admin/dashboard');
    }

    public function restore($id){
        Category::onlyTrashed()->where('category_id','=',$id)->restore();

        return redirect()->route('admin.dashboard');
    }
//
//    public function permanently_remove($id){
//        Category::forceDelete()->where('category_id', '=', $id);
//
//        return redirect()->route('admin.dashboard');
//    }

    public function validateAttribute()
    {
        return request()->validate([
            'category_name' => 'required',
            'category_alias' => 'required',
        ]);
    }
}
