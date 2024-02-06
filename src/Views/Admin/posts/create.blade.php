@extends('layouts.master')
@section('title')
Thêm Bài viết mới
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4"><a href="/admin/users">Danh sách</a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example"  
                        id="category_id" required name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category['id']}}">{{ $category['name'] }}</option>
                            @endforeach
                   
                          </select>
                        {{-- 
                        <input type="text" class="form-control" id="category" required
                            placeholder="Enter category" name="category"> --}}
                    </div>
                  
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" required
                            placeholder="Enter title" name="title">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="excerpt" class="form-label">Excerpt:</label>
                        <input type="text" class="form-control" id="excerpt" required
                            placeholder="Enter excerpt" name="excerpt">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea class="form-control" id="content" required
                        placeholder="Enter content" name="content" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" id="image" 
                            placeholder="Enter image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection