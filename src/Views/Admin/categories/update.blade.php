@extends('layouts.master')
@section('title')
    Chỉnh sửa danh mục
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4"><a href="/admin/categories">Danh sách</a></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $category['name'] }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" required
                                value="{{ $category['name'] }}" placeholder="Enter name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="avatar" placeholder="Enter avatar"
                                name="avatar">
                            <img src="{{ $category['avatar'] }}" alt="" width="100px">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>

    </div>
@endsection
