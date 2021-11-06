@extends('layouts.layout')

{{-- @section('slide')
    @include('pages.slide')
@endsection --}}

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home_page') }}">Trang chủ</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-8">
            <h3><h3>Kết quả cho từ khoá : {{ $keyword }}</h3></h3>
            <div class="row">
                @if (!empty($books->all()))
                    <style>
                        .text-truncate {
                            display: -webkit-box !important;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            white-space: normal;
                        }

                    </style>
                    @foreach ($books as $index => $book)
                        <div class="col-md-3">
                            <div class="card mb-3 box-shadow">
                                <a href="{{ route('book_detail', ['slug' => $book->slug_book, 'id' => $book->id]) }}">
                                    <img class="card-img-top" src="{{ asset('uploads/books/imgs/' . $book->image) }}"
                                        height="235.91px" width="151.66px">
                                </a>
                                <div class="card-body" style="height: 186px">
                                    <div class="text-truncate">
                                        {{ $book->book_name }}
                                    </div>
                                    <p class="card-text">
                                    <ul class="list-group" style="list-style:none">
                                        @if (!empty($book->chapters->all()))
                                            @for ($i = 0; $i < 3; $i++)
                                                <li class="d-flex justify-content-between">
                                                    <small>
                                                        <a
                                                            href="{{ route('book_detail', ['slug' => $book->slug_book, 'id' => $book->id]) }}">
                                                            {{ $book->chapters->all()[$i]->chapter_title }}
                                                        </a>
                                                    </small>
                                                    <small>
                                                        {{ $book->chapters->all()[$i]->updated_at->diffForHumans() }}
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
                                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">Lưu</a>
                                        </div>
                                        <small class="text-muted">
                                            <i class="fas fa-eye"></i>123233
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="card mb-3 box-shadow">
                            <div class="card-body">
                                <div class="text-truncate">
                                    Không tìm thấy truyện
                                </div>
                            </div>

                        </div>

                    </div>
                @endif

            </div>

        </div>

        <div class="col-4">

        </div>
    </div>

@endsection
