<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admincp.category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
                'slug_category' => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
            ],
            [
                'category_name.required' => 'Tên danh mục không được để trống.',
                'category_name.unique' => 'Tên danh mục đã bị trùng.',
                'slug_category.required' => 'Slug danh mục không được để trống.',
                'slug_category.unique' => 'Slug danh mục đã bị trùng.',
                'description.required' => 'Mô tả không được để trống.',
            ]
        );
        $data = $request;
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->slug_category = $data['slug_category'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back()->with('status', 'Đã Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admincp.category.edit', [
            'category' => $category,
        ]);
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
        $request->validate(
            [
                'category_name' => "required|unique:categories,category_name,{$id},id|max:255",
                'slug_category' => "required|unique:categories,slug_category,{$id},id|max:255",
                'description' => 'required|max:255',
            ],
            [
                'category_name.required' => 'Tên danh mục không được để trống.',
                'category_name.unique' => 'Tên danh mục đã bị trùng.',
                'slug_category.required' => 'Slug danh mục không được để trống.',
                'slug_category.unique' => 'Slug danh mục đã bị trùng.',
                'description.required' => 'Mô tả không được để trống.',
            ]
        );
        $data = $request;
        $category = Category::find($id);
        $category->category_name = $data['category_name'];
        $category->slug_category = $data['slug_category'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back()->with('status', 'Đã sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Đã Xoá thành công!');
    }
}
