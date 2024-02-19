@extends('layouts.master')
@section('title')
    Danh sách bài viết
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4"><a href="/admin/posts/create">Thêm mới</a></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Excerpt</th>
                                <th>Category</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Excerpt</th>
                                <th>Category</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td> {{ $post['p_id'] }} </td>
                                    <td> {{ $post['p_title'] }} </td>
                                    <td>
                                        <img src="{{ $post['p_image'] }}" alt="" width="100px">
                                    </td>
                                    <td> {{ $post['p_excerpt'] }} </td>
                                    <td> {{ $post['c_name'] }} </td>
                                    <td> {{ $post['p_date'] }} </td>
                                    <td>
                                        <a href="/admin/posts/{{ $post['p_id'] }}/update" class="btn btn-warning">Cập
                                            nhật</a>
                                        <a href="/admin/posts/{{ $post['p_id'] }}/show" class="btn btn-info">Xem chi
                                            tiết</a>
                                        <a href="/admin/posts/{{ $post['p_id'] }}/delete"
                                            onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
