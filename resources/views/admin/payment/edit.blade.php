@extends('admin.layouts.mater')
@section('title')
    Cập nhật Banners
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Cập nhật Banners</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <form action="{{ route('admin.banners.update', $data) }}" method="POST" class="row g-3 p-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="fullnameInput" class="form-label">Banner</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
            </div>
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Multiple File Upload</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <input type="file" class="filepond filepond-input-multiple" multiple data-allow-reorder="true" name="image_url" data-max-file-size="3MB" data-max-files="3">
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <img src="{{ Storage::url($data->image_url) }}" width="80px" alt="">
            </div> <!-- end col -->
            <div class="col-md-6">
                <label for="fullnameInput" class="form-label">Link</label>
                <input type="text" class="form-control" name="link_url" value="{{$data->link_url}}">
            </div>
            <div class="col-md-6">
                <label for="exampleInputdate" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="{{$data->start_date}}" id="exampleInputdate">
            </div>
            <div class="col-md-6">
                <label for="exampleInputdate" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" value="{{$data->end_date}}" id="exampleInputdate">
            </div>

            <div class="col-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
