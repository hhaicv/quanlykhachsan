@extends('admin.layouts.mater')
@section('title')
    Thêm mới Khuyến Mại
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Khuyến Mại</h4>
            </div>
        </div>
    </div>
    <div class="card">
    <form action="{{ route('admin.promotions.store') }}" method="POST" class="row g-3 p-5">
        @csrf
        <div class="col-md-12">
            <label for="fullnameInput" class="form-label">Mã Khuyến Mại</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập mã khuyến mại">
        </div>
        <div class="col-md-4">
            <label for="fullnameInput" class="form-label">Giá trị</label>
            <input type="number" class="form-control" name="discount_rate" placeholder="Nhập giá trị khuyến mại">
        </div>
        <div class="col-md-8">
            <label for="exampleFormControlTextarea5" class="form-label">Mô tả</label>
            <textarea class="form-control" placeholder="Mô tả chi tiết" id="exampleFormControlTextarea5" name="description" rows="1"></textarea>
        </div>
        <div class="col-md-6">
            <label for="exampleInputdate" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="exampleInputdate">
        </div>
        <div class="col-md-6">
            <label for="exampleInputdate" class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" id="exampleInputdate">
        </div>

        <div class="col-12">
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>
@endsection
