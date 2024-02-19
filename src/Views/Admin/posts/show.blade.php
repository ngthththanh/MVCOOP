@extends('layouts.master')
@section('title')
    Chi tiết bài viết 
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4"><a href="/admin/posts">Danh sách</a></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chi tiết Bài viết: {{ $post['p_title'] }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile mb-2" src="{{ $post['p_image'] }}" alt=""
                                    style="width: 100%; padding: 0 10%" class="img-fluid">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <!-- Profile picture upload button-->
                                {{-- <button class="btn btn-primary" type="button">Upload new image</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <form>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputName">Name</label>
                                            <input type="text" class="form-control" id="excerpt" placeholder="Enter excerpt"
                                            value="{{ $post['c_name'] }}" name="excerpt">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputName">Name</label>
                                            <input type="text" class="form-control" id="excerpt" placeholder="Enter excerpt"
                                            value="{{ $post['p_excerpt'] }}" name="excerpt">
                                        </div>
                                     
                                        <div class="col-md-12" style="white-space: break-spaces; border:1px solid #000; border-radius: 10px; margin: 30px 30px 0 0;">
                                            {!! $post['p_content'] !!}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

