@extends('home')
@section('title', 'Thêm mới blog')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới Blog</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên blog</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <input type="text" class="form-control" name="content" placeholder="Enter content" required>
                    </div><div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter content" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection