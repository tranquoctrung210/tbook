@extends('layouts.layout')

{{-- @section('slide')
    @include('pages.slide')
@endsection --}}

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home_page')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category_slug', ['slug' => $book->category->slug_category, 'id' => $book->category->id]) }}">{{ $book->category->category_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $book->book_name }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img width="250px" src="{{ asset('uploads/books/imgs/' . $book->image) }}">
                </div>
                <div class="col-md-9">
                    <ul style="list-style:none; margin-left: 50px">
                        <li>
                            <h3>{{ $book->book_name }}</h3>
                        </li>
                        <li>
                            <p>Tác giả : {{ $book->book_name }}</p>
                        </li>
                        <li>
                            <p>Tình trạng : </p>
                        </li>
                        <li>
                            <p>Thể loại : {{ $book->category->category_name }} </p>
                        </li>
                        <li>
                            <p>Lượt xem : </p>
                        </li>
                        <li>
                            <a href="#" class="btn btn-success">Theo dõi</a>
                        </li>
                        <li style="margin-top: 10px">
                            @if (empty($chapters))
                                <a href="#" class="btn btn-primary disabled">Updating</a>
                            @else
                                <a href="{{ route('chapter_detail', ['slug' => $book->slug_book, 'slug_chapter' => end($chapters)->slug_chapter, 'id_chapter' => end($chapters)->id]) }}" class="btn btn-primary">Đọc từ đầu</a>
                                <a href="#" class="btn btn-primary">Đọc tiếp</a>
                                <a href="{{ route('chapter_detail', ['slug' => $book->slug_book, 'slug_chapter' => $chapters[0]->slug_chapter, 'id_chapter' => $chapters[0]->id]) }}" class="btn btn-primary">Đọc mới nhất</a>
                            @endif
                        </li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <hr>
                    <h3>Nội Dung</h3>
                    <p>{{ $book->description }} </p>
                    <hr>
                    <h3>Danh Sách Chương</h3>
                    @if (!empty($chapters))
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Số chương</th>
                                    <th scope="col">Cập nhật</th>
                                    <th scope="col">Lượt xem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapters as $chapter)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('chapter_detail', ['slug' => $book->slug_book, 'slug_chapter' => $chapter->slug_chapter, 'id_chapter' => $chapter->id]) }}">
                                                {{ $chapter->chapter_title }}
                                            </a>
                                        </td>
                                        <td>{{ $chapter->updated_at }}</td>
                                        <td>{{ $chapter->view }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Updating ...
                    @endif
                    <hr>
                    <h3>Bình luận</h3>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            alo 2
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h3>Truyện cùng danh mục</h3>
        </div>
        @foreach ($book->category->books->all() as $bookOfCategory)
            @if ($book->id !== $bookOfCategory->id)
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <a
                            href="{{ route('book_detail', ['slug' => $bookOfCategory->slug_book, 'id' => $bookOfCategory->id]) }}">
                            <img class="card-img-top"
                                src="{{ asset('uploads/books/imgs/' . $bookOfCategory->image) }}">
                        </a>
                        <div class="card-body">
                            <h5>{{ $bookOfCategory->book_name }}</h5>
                            <p class="card-text">
                            <ul>
                                @if (!empty($bookOfCategory->chapters->all()))
                                    @for ($i = 0; $i < count($bookOfCategory->chapters->all()); $i++)
                                        <li class="d-flex justify-content-between">
                                            <small>
                                                <a
                                                    href="{{ route('book_detail', ['slug' => $bookOfCategory->slug_book, 'id' => $bookOfCategory->id]) }}">
                                                    {{ $bookOfCategory->chapters->all()[$i]->chapter_title }}
                                                </a>
                                            </small>
                                            <small>
                                                5 phut truoc
                                            </small>
                                        </li>
                                    @endfor
                                @else
                                    <li><small>Đang cập nhật ...</small></li>
                                @endif
                            </ul>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" href="#" class="btn btn-sm btn-outline-secondary">Save</a>
                                </div>
                                <small class="text-muted">
                                    <i class="fas fa-eye"></i>123233
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach


    </div>
@endsection
