<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Chapter;

class IndexController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $books = Book::where('status', 0)->orderBy('id', 'desc')->get();
        return view('pages.home', [
            'categories' => $categories,
            'books' => $books
        ]);
    }

    public function category($slug, $id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        return view('pages.category', ['categories' => $categories, 'category' => $category]);
    }

    public function book($slug, $id)
    {
        $book = Book::find($id);
        $chapters = Chapter::where('book_id', $book->id)->orderBy('id', 'desc')->get()->all();
        return view('pages.book_detail', [
            'book' => $book,
            'chapters' => $chapters
        ]);
    }


    public function chapter($slug, $slug_chapter, $id)
    {
        $chapter = Chapter::find($id);
        $allChapters = Chapter::where('book_id', $chapter->book_id)->orderBy('id', 'desc')->get()->all();
        // dd($allChapters);
        return view('pages.chapter_detail', [
            'chapter' => $chapter,
            'book' => $chapter->book,
            'allChapters' => $allChapters,
        ]);
    }
}
