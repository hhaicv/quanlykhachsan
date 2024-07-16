@extends('admin.layouts.mater')
@section('title')
    Thêm mới Loại Phòng
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Loại Phòng</h4>
            </div>
        </div>
    </div>
    <div class="card">
    <form action="{{ route('admin.room_types.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 p-5">
        @csrf
        <div class="col-md-12">
            <label for="fullnameInput" class="form-label">Loại Phòng</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập loại phòng">
        </div>
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="card-title mb-0">Multiple File Upload</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <input type="file" class="filepond filepond-input-multiple" multiple data-allow-reorder="true" name="cover" data-max-file-size="3MB" data-max-files="3">
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
        <div class="col-md-6">
            <label for="exampleFormControlTextarea5" class="form-label">Mô tả</label>
            <textarea class="form-control" placeholder="Mô tả chi tiết" id="exampleFormControlTextarea5" name="description" rows="4"></textarea>
        </div>

        <div class="col-md-8">
            <label for="inputState" class="form-label">Số Người</label>
            <select id="inputState" class="form-select" name="maxOccupancy">
                <option selected>Choose...</option>
                <option value="1 người">1 người</option>
                <option value="2 người">2 người</option>
                <option value="3 người">3 người</option>
                <option value="4 người">4 người</option>
                <option value="Từ 5 người">Từ 5 người</option>
            </select>
        </div>
        <div class="col-md-3 pt-5 ms-5">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked name="is_active" value="1">
            <label class="form-check-label" for="exampleCheck1">Is_active</label>
        </div>

        <div class="col-12">
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>
@endsection
