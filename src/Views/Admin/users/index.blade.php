@extends('layouts.master')
@section('title')
    Danh sách slide
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4"><a href="/admin/users/create">Thêm mới</a></p>

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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td> {{ $user['id'] }} </td>
                            <td> {{ $user['name'] }} </td>
                            <td> {{ $user['username'] }} </td>
                            <td> {{ $user['email'] }} </td>
                            <td> {{ $user['password'] }} </td>
                            <td> <img src="{{ $user['avatar'] }}"  alt="" width="100px"> </td>
                            <td>
                                <a class = "btn btn-warning" href="/admin/users/{{ $user['id']}}/update">Update</a>
                                <a class = "btn btn-info" href="/admin/users/{{ $user['id']}}/show">Show</a>
                                <a class = "btn btn-danger" 
                                onclick="return confirm('Bajn cos chawsc chawsn khoong')"
                                href="/admin/users/{{ $user['id']}}/delete">Delete</a>
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