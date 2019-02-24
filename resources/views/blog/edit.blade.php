@extends('home')
@section('title', 'Chỉnh sửa blog')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa blog</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('blog.update', $blog->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên Bog</label>
                        <input type="text" class="form-control" name="name" value="{{ $blog->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}" required></div>
                    <div class="form-group">
                        <label>content</label>
                        <input type="text" class="form-control" name="content" value="{{ $blog->content }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection