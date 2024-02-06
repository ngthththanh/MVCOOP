@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4"><a href="/admin/slides">Danh sách</a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" required
                            value="{{ $slide['title'] }}" placeholder="Enter title" name="title">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="text" class="form-label">Text:</label>
                        <input type="text" class="form-control" id="text" required
                            value="{{ $slide['text'] }}" placeholder="Enter text" name="text">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" id="image"
                            placeholder="Enter image" name="image">
                        <img src="{{ $slide['image'] }}" alt="" width="100px">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection