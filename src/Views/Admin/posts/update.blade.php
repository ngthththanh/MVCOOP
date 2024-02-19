@extends('layouts.master')
@section('title')
    Chỉnh sửa bài viết
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4"><a href="/admin/posts">Danh sách</a></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cập nhật Bài viết: {{ $post['title'] }} </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Category:</label>
                            <select class="form-control" id="category_id" required name="category_id">
                                @foreach ($categories as $category)
                                    <option @if ($category['id'] == $post['p_category_id']) selected @endif value="{{ $category['id'] }}">
                                        {{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" required placeholder="Enter title"
                                value="{{ $post['p_title'] }}" name="title">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="excerpt" class="form-label">Excerpt:</label>
                            <input type="text" class="form-control" id="excerpt" placeholder="Enter excerpt"
                                value="{{ $post['p_excerpt'] }}" name="excerpt">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" id="content" class="form-control">{{ $post['p_content'] }}</textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="{{ $post['p_image'] }}" alt="" width="100px">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            @php
                                date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ mặc định*
    
                                $currentDateTime = date('y/m/d H:i');
                            @endphp
                            <input type="text" class="form-control" id="date" value="{{ $currentDateTime }}"
                                name="date">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/admin/posts" class="btn btn-success">Danh sách Bài viết</a>
                    </form>

                </div>
            </div>

        </div>
    @endsection
