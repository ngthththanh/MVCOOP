@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4"><a href="/admin/slides/create">Thêm mới</a></p>

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
                            <th>Text</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($slides as $slide)
                        <tr>
                            <td> {{ $slide['id'] }} </td>
                            <td> {{ $slide['title'] }} </td>
                            <td> {{ $slide['text'] }} </td>
                            <td> <img src="{{ $slide['image'] }}"  alt="" width="100px"> </td>
                            <td>
                                <a class = "btn btn-warning" href="/admin/slides/{{ $slide['id']}}/update">Update</a>
                                <a class = "btn btn-info" href="/admin/slides/{{ $slide['id']}}/show">Show</a>
                                <a class = "btn btn-danger" 
                                onclick="return confirm('Bajn cos chawsc chawsn khoong')"
                                href="/admin/slides/{{ $slide['id']}}/delete">Delete</a>
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