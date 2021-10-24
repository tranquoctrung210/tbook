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
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('uploads/books/imgs/' . $book->image) }}">
                </div>
                <div class="col-md-9">
                    <ul style="list-style:none">
                        <li>
                            <h3>{{ $book->book_name }}</h3>
                        </li>
                        <li>
                            <p>Tác giả : </p>
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
                            <a href="#" class="btn btn-primary">Đọc Online</a>
                            <a href="#" class="btn btn-success">Theo dõi</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <hr>
                    <h3>Nội dung</h3>
                    <p>{{ $book->description }} </p>
                    <hr>
                    <h3>Chapter</h3>
                    <ul>
                        <li><a href="#">Chapter 1</a></li>
                        <li><a href="#">Chapter 1</a></li>
                        <li><a href="#">Chapter 1</a></li>
                        <li><a href="#">Chapter 1</a></li>
                        <li><a href="#">Chapter 1</a></li>
                        <li><a href="#">Chapter 1</a></li>
                        <li><a href="#">Chapter 1</a></li>
                    </ul>
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
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                <a href="#">
                    <img class="card-img-top" src="{{ asset('uploads/books/imgs/iroha-ni-hoero-1634732831-85.jpg') }}">
                </a>
                <div class="card-body">
                    <h5>Title</h5>
                    <p class="card-text">
                    <ul>
                        <li>test 1</li>
                        <li>test 1</li>
                        <li>test 1</li>
                    </ul>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">View</a>
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">Save</a>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-eye"></i>123233
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                <a href="#">
                    <img class="card-img-top" src="{{ asset('uploads/books/imgs/iroha-ni-hoero-1634732831-85.jpg') }}">
                </a>
                <div class="card-body">
                    <h5>Title</h5>
                    <p class="card-text">
                    <ul>
                        <li>test 1</li>
                        <li>test 1</li>
                        <li>test 1</li>
                    </ul>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">View</a>
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">Save</a>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-eye"></i>123233
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                <a href="#">
                    <img class="card-img-top" src="{{ asset('uploads/books/imgs/iroha-ni-hoero-1634732831-85.jpg') }}">
                </a>
                <div class="card-body">
                    <h5>Title</h5>
                    <p class="card-text">
                    <ul>
                        <li>test 1</li>
                        <li>test 1</li>
                        <li>test 1</li>
                    </ul>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">View</a>
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">Save</a>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-eye"></i>123233
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                <a href="#">
                    <img class="card-img-top" src="{{ asset('uploads/books/imgs/iroha-ni-hoero-1634732831-85.jpg') }}">
                </a>
                <div class="card-body">
                    <h5>Title</h5>
                    <p class="card-text">
                    <ul>
                        <li>test 1</li>
                        <li>test 1</li>
                        <li>test 1</li>
                    </ul>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">View</a>
                            <a type="button" href="#" class="btn btn-sm btn-outline-secondary">Save</a>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-eye"></i>123233
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
