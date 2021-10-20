@extends('layouts.app')

@section('content')

    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List danh mục truyện') }}</div>

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
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Slug danh mục</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Quản lý</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->slug_category }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            @if ($category->status == 0)
                                                <span class="text text-success">{{ __('Kích hoạt') }}</span>
                                            @else
                                                <span class="text text-danger">{{ __('Không kích hoạt') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('category.edit', ['category' => $category->id]) }}">
                                                {{ __('Sửa') }}
                                            </a>
                                            <form action="{{ route('category.destroy', ['category' => $category->id]) }}"
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
