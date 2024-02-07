@extends('layouts.master')
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
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" required
                            placeholder="Enter name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="username" required
                            placeholder="Enter name" name="username">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" required
                            placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" required 
                            placeholder="Enter password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar:</label>
                        <input type="file" class="form-control" id="avatar" 
                            placeholder="Enter avatar" name="avatar">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection