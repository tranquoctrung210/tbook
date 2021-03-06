@extends('layouts.layout')

@section('slide')
    @include('pages.slide')
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <h3>Sách Mới</h3>
            <div class="row">
                <style>
                    .book-title-truncate {
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
                                <div class="text-truncate book-title-truncate">
                                    {{ $book->book_name }}
                                </div>
                                <p class="card-text">
                                <ul class="list-group" style="list-style:none">
                                    @if (!empty($book->chapters->all()))
                                        @php
                                            $bookCount = count($book->chapters->all()) < 3 ? count($books) : 3;
                                        @endphp
                                        @for ($i = 0; $i < $bookCount; $i++)
                                            <li class="d-flex justify-content-between">
                                                <small>
                                                    <a
                                                        href="{{ route('chapter_detail', ['slug' => $book->slug_book, 'slug_chapter' => $book->chapters->all()[$i]->slug_chapter, 'id_chapter' => $book->chapters->all()[$i]->id]) }}">
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
                                        <i class="fas fa-eye"></i> {{ $book->view }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-4">
            <div class="card bg-light mb-3">
                <div class="card-header">
                    <h5 class="mt-0 mb-0">Truyện đang theo dõi</h5>
                </div>
                <ul class="list-group" id="follow-list" style="list-style:none">
                </ul>


            </div>

            @include('includes.tabbox_topview')
        </div>
    </div>

@endsection
