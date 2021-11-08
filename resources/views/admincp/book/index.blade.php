@extends('layouts.app')

@section('content')

    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List truyện') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên truyện</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Slug truyện</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $key => $book)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $book->book_name }}</td>
                                        <td><img src="{{ asset('uploads/books/imgs/' . $book->image) }}" width="120"
                                                height="156" alt="{{ $book->book_name }}" /></td>
                                        <td>{{ $book->slug_book }}</td>
                                        <td>{{ $book->description }}</td>
                                        <td>
                                            @foreach ($book->categories as $category)
                                                {{ $category->category_name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($book->status == 0)
                                                <span class="text text-success">{{ __('Kích hoạt') }}</span>
                                            @else
                                                <span class="text text-danger">{{ __('Không kích hoạt') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('book.edit', ['book' => $book->id]) }}">
                                                {{ __('Sửa') }}
                                            </a>
                                            <form action="{{ route('book.destroy', ['book' => $book->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    onclick=" return confirm('Bạn có muốn xoá không ?')">{{ __('Xoá') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
