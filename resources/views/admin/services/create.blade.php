@extends('admin.layouts.mater')
@section('title')
    Thêm mới Dịch Vụ
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Dịch Vụ</h4>
            </div>
        </div>
    </div>
    <div class="card">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 p-5">
        @csrf
        <div class="col-md-12">
            <label for="fullnameInput" class="form-label">Dịch Vụ</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập dịch vụ">
        </div>
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="card-title mb-0">Multiple File Upload</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <input type="file" class="filepond filepond-input-multiple" multiple data-allow-reorder="true" name="image" data-max-file-size="3MB" data-max-files="3">
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
        <div class="col-md-6">
            <label for="exampleFormControlTextarea5" class="form-label">Mô tả</label>
            <textarea class="form-control" placeholder="Mô tả chi tiết" id="exampleFormControlTextarea5" name="description" rows="4"></textarea>
        </div>
        <div class="col-12">
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>
@endsection
