@extends('layouts.app')

@section('content')

    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm Chapter') }}</div>
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

                        <form method="post" action="{{ route('chapter.update', ['chapter' => $chapter->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề chapter</label>
                                <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()"
                                    name="chapter_title" value="{{ old('chapter_title') ?? $chapter->chapter_title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug chapter</label>
                                <input type="text" class="form-control" id="convert_slug" name="slug_chapter"
                                    value="{{ old('slug_chapter') ?? $chapter->slug_chapter }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt chapter</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ old('description') ?? $chapter->description }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label>
                                <textarea name="content" class="form-control" cols="30"
                                    rows="5">{{ old('content') ?? $chapter->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thuộc truyện</label>
                                <select name="book_id" class="custom-select">
                                    @foreach ($books as $book)
                                        <option {{ $chapter->book_id == $book->id ? 'selected' : '' }}
                                            value="{{ $book->id }}">{{ $book->book_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái truyện</label>
                                <select name="status" class="custom-select">
                                    @if ($chapter->status == 0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Ẩn</option>
                                    @else
                                        <option value="0">Hiện</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
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
