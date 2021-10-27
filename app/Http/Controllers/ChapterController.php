<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::orderBy('id', 'DESC')->get();
        return view('admincp.chapter.index', ['chapters' => $chapters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('admincp.chapter.create', ['books' => $books]);
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
                'chapter_title' => "required|max:255",
                'slug_chapter' => "required|max:255",
                'status' => 'required',
                'content' => 'required'
            ],
            [
                'chapter_title.required' => 'Tên chapter không được để trống.',
                'chapter_title.unique' => 'Tên chapter đã bị trùng.',
                'slug_chapter.required' => 'Slug chapter không được để trống.',
                'slug_chapter.unique' => 'Slug chapter đã bị trùng.',
                'content.required' => 'Nội không được để trống.',
            ]
        );
        $data = $request;
        $chapter = new Chapter();
        $chapter->chapter_title = $data['chapter_title'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $data['description'] ? $chapter->description = $data['description'] : null;
        $chapter->content = $data['content'];
        $chapter->book_id = $data['book_id'];
        $chapter->status = $data['status'];
        $chapter->save();
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
        $books = Book::all();
        $chapter = Chapter::find($id);

        return view('admincp.chapter.edit', [
            'books' => $books,
            'chapter' => $chapter
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
                'chapter_title' => "required|max:255",
                'slug_chapter' => "required|max:255",
                'status' => 'required',
                'content' => 'required'
            ],
            [
                'chapter_title.required' => 'Tên chapter không được để trống.',
                'chapter_title.unique' => 'Tên chapter đã bị trùng.',
                'slug_chapter.required' => 'Slug chapter không được để trống.',
                'slug_chapter.unique' => 'Slug chapter đã bị trùng.',
                'content.required' => 'Nội không được để trống.',
            ]
        );
        $data = $request;
        $chapter = Chapter::find($id);
        $chapter->chapter_title = $data['chapter_title'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $data['description'] ? $chapter->description = $data['description'] : null;
        $chapter->content = $data['content'];
        $chapter->book_id = $data['book_id'];
        $chapter->status = $data['status'];
        $chapter->save();

        return redirect()->back()->with('status', "Chỉnh sửa thành công.");
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
