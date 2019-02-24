@extends('home')
@section('title', 'Danh sách blog')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>BLOG MANAGER</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>

                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($blog) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($blog as $key => $blog)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $blog->name }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->content }}</td>
                            <td><img src="{{asset("storage/$blog->image")}}" alt="" width="150px" height="150px"></td>
                            <td><a href="{{ route('blog.edit', $blog->id) }}">sửa</a></td>
                            <td><a href="{{ route('blog.destroy', $blog->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                            <td><a href="{{ route('blog.detail', $blog->id) }}">Xem nội dung chi tiết</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('blog.create') }}">Thêm mới</a>
        </div>
    </div>
@endsection