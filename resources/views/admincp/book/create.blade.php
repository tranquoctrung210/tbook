@extends('layouts.app')

@section('content')

    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm truyện') }}</div>
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

                        <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()"
                                    name="book_name" value="{{ old('book_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" class="form-control" id="convert_slug" name="slug_book"
                                    value="{{ old('slug_book') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện</label>
                                <textarea name="description" class="form-control" cols="30"
                                    rows="10">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác giả</label>
                                <input type="text" class="form-control" name="author"
                                    value="{{ old('author') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục truyện</label>
                                <select name="category_id" class="custom-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình minh hoạ</label>
                                <input type="file" class="form-control-file" name="image"
                                    value="{{ old('image') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái truyện</label>
                                <select name="status" class="custom-select">
                                    <option selected value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
