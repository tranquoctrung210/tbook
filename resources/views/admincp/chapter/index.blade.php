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
                                    <th scope="col">Tên chapter</th>
                                    <th scope="col">Thuộc truyện</th>
                                    <th scope="col">Mô tả</th>                                   
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Update at</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapters as $key => $chapter)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $chapter->chapter_title }}</td>
                                        <td>{{ $chapter->book->book_name }}</td>
                                        <td>{{ $chapter->description }}</td>
                                        <td>
                                            @if ($chapter->status == 0)
                                                <span class="text text-success">{{ __('Kích hoạt') }}</span>
                                            @else
                                                <span class="text text-danger">{{ __('Không kích hoạt') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $chapter->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('chapter.edit', ['chapter' => $chapter->id]) }}">
                                                {{ __('Sửa') }}
                                            </a>
                                            <form action="{{ route('chapter.destroy', ['chapter' => $chapter->id]) }}"
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
