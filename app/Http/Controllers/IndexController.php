<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Chapter;

use Carbon\Carbon;

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
        $chapters = Chapter::where('status', 0)->where('book_id', $book->id)->orderBy('id', 'desc')->get()->all();
        return view('pages.book_detail', [
            'book' => $book,
            'chapters' => $chapters
        ]);
    }


    public function chapter($slug, $slug_chapter, $id)
    {
        $chapter = Chapter::find($id);
        $allChapters = Chapter::where('book_id', $chapter->book_id)->orderBy('id', 'desc')->get()->all();
        $nextChapter = Chapter::where('book_id', $chapter->book_id)->where('id', '>', $chapter->id)->orderBy('id', 'asc')->first();
        $previousChapter = Chapter::where('book_id', $chapter->book_id)->where('id', '<', $chapter->id)->orderBy('id', 'desc')->first();
        // dd($nextChapter->slug_chapter);
        return view('pages.chapter_detail', [
            'chapter' => $chapter,
            'book' => $chapter->book,
            'allChapters' => $allChapters,
            'previousChapter' => $previousChapter,
            'nextChapter' => $nextChapter
        ]);
    }

    public function search_ajax(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('status', 0)->where('book_name', 'LIKE', "%{$request->keyword_ajax}%")->get();

            if (!empty($books)) {
                $output = '';
                foreach ($books as $key => $book) {
                    $countChapter = $book->chapters->count();
                    $output .= '
                    <a class="book-link" href="' . route('book_detail', ['slug' => $book->slug_book, 'id' => $book->id]) . '">
                        <li class="media item-book-result">
                            <img class="mr-2" width="100px" height="100%"
                                src="' . asset("uploads/books/imgs/" . $book->image) . '"
                                alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1"><strong>' . $book->book_name . '</strong></h5>
                                <p>Tổng cộng có ' . $countChapter  . ' chương</p>
                            </div>
                        </li>
                    </a>
               ';
                }
                return Response($output);
            } else {
                return Response('<li class="media item-book-result"><li>');
            }
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword', null);
        if ($keyword) {
            $books = Book::where('status', 0)->where('book_name', 'LIKE', "%" . $keyword . "%")->orWhere('author',  'LIKE', "%" . $keyword . "%")->get();
            return view('pages.search', [
                'books' => $books,
                'keyword' => $keyword,
            ]);
        } else {
            return redirect()->route('home_page');
        }
    }
}
