@extends('layouts.app')

@section('content')

    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cập nhật truyện') }}</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('book.update', ['book' => $book->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()" name="book_name"
                                    value="{{ old('book_name') ?? $book->book_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" class="form-control" id="convert_slug" name="slug_book"
                                    value="{{ old('slug_book') ?? $book->slug_book }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện</label>
                                <textarea name="description" class="form-control" cols="30"
                                    rows="10">{{ old('description') ?? $book->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác giả</label>
                                <input type="text" class="form-control" name="author"
                                    value="{{ old('author') ?? $book->author }}">
                            </div>
                            <div class="form-group">
                                @php
                                    $books_categories = $book->categories->map(function ($cat) {
                                        return $cat->id;
                                    });
                                @endphp
                                <label for="exampleInputEmail1">Danh mục truyện</label> <br>
                                @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="categories[]"
                                            id="category-{{ $category->id }}" value="{{ $category->id }}"
                                            {{ in_array($category->id, $books_categories->all()) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="category-{{ $category->id }}">{{ $category->category_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình minh hoạ</label>
                                <input type="file" class="form-control-file" name="image" value="{{ old('image') }}">
                                <br>
                                <img src="{{ asset('uploads/books/imgs/' . $book->image) }}" width="120" height="156"
                                    alt="{{ $book->book_name }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái truyện</label>
                                <select name="status" class="custom-select">
                                    @if ($book->status == 0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Ẩn</option>
                                    @else
                                        <option value="0">Hiện</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
