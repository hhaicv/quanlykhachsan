@extends('admin.layouts.mater')
@section('title')
    Cập nhật Tài Khoản
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Cập nhật Tài Khoản</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <form action="{{ route('admin.users.update', $data) }}" method="POST" class="row g-3 p-5"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="fullnameInput" class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
            </div>

            <div class="col-md-6">
                <label for="fullnameInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $data->email }}">
            </div>
            <div class="col-md-6">
                <label for="exampleInputdate" class="form-label">PassWord</label>
                <input type="password" class="form-control" name="password" id="exampleInputdate" value="{{ $data->password }}">
            </div>
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Multiple File Upload</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <input type="file" class="filepond filepond-input-multiple" multiple data-allow-reorder="true"
                            name="image" data-max-file-size="3MB" data-max-files="3">
                    </div>
                    <!-- end card body -->
                </div>
                <img src="{{ Storage::url($data->image) }}" width="80px" alt="">

                <!-- end card -->
            </div>
            <div class="col-md-6">
                <label for="exampleInputdate" class="form-label">Type</label>
                <select name="type" id="" class="form-select">
                    <option value="{{ App\Models\User::TYPE_ADMIN }}">{{ App\Models\User::TYPE_ADMIN }}</option>
                    <option value="{{ App\Models\User::TYPE_MEMBER }}">{{ App\Models\User::TYPE_MEMBER }}</option>
                </select>
            </div>
            <div class="col-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
