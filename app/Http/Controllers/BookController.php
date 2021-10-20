<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();
        return view('admincp.book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admincp.book.create', ['categories' => $categories]);
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
                'book_name' => "required|unique:books|max:255",
                'slug_book' => "required|unique:books|max:255",
                'description' => "required",
                'status' => 'required',
                'image' => "required|image|max:2048|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000",
            ],
            [
                'book_name.required' => 'Tên truyện không được để trống.',
                'book_name.unique' => 'Tên truyện đã bị trùng.',
                'slug_book.required' => 'Slug truyện không được để trống.',
                'slug_book.unique' => 'Slug truyện đã bị trùng.',
                'description.required' => 'Mô tả không được để trống.',
                'image.required' => 'Phải có hình ảnh',
            ]
        );
        $data = $request;
        $image = $request->image;
        $get_name_img = $image->getClientOriginalName();
        $name_img = current(explode(".", $get_name_img));
        $new_image = $name_img . '-' . time() . '-' . rand(0, 99) . '.' . $image->getClientOriginalExtension();

        $path_upload = 'uploads/books/imgs/';
        $image->move($path_upload, $new_image);

        $book = new Book();
        $book->book_name = $data['book_name'];
        $book->slug_book = $data['slug_book'];
        $book->description = $data['description'];
        $book->category_id = $data['category_id'];
        $book->status = $data['status'];
        $book->image = $new_image;
        $book->save();
        return redirect()->back()->with('status', "Đã thêm thành công!");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
