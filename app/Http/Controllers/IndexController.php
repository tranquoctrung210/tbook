<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

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
        // dd($category2->books);
        return view('pages.category', ['categories' => $categories, 'category' => $category]);
    }

    public function book($slug, $id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('pages.book-detail', [
            'categories' => $categories,
            'book' => $book
        ]);
    }
}
