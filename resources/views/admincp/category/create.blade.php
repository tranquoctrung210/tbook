@extends('layouts.app')

@section('content')

    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm danh mục truyện') }}</div>
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

                        <form method="post" action="{{ route('category.store') }}">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô Tả Danh Mục</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái Danh Mục</label>
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
