@extends('layouts.layout')

{{-- @section('slide')
    @include('pages.slide')
@endsection --}}

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <h4>
                <a href="{{ route('book_detail', ['slug' => $book->slug_book, 'id' => $book->id]) }}">{{ $book->book_name }}
                </a> - {{ $chapter->chapter_title }} {{ $chapter->description ? ': ' . $chapter->description : '' }}
            </h4>
            <div class="col-md-5">
                <div class="form-group">
                    <select name="chapter" class="custom-select">
                        @foreach ($allChapters as $chapter_loop)
                            <option {{ $chapter_loop->id == $chapter->id ? 'selected' : '' }}
                                value="{{ $chapter_loop->id }}">{{ $chapter_loop->chapter_title }}
                                {{ $chapter_loop->description ? ': ' . $chapter_loop->description : '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="chapter_content">
                {!! $chapter->content !!}
            </div>
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
                            <img class="card-img-top" src="{{ asset('uploads/books/imgs/' . $bookOfCategory->image) }}">
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
