@extends('admin.layouts.mater')
@section('title')
    Cập nhật Khuyến Mại
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Cập nhật Khuyến Mại</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <form action="{{ route('admin.promotions.update', $data) }}" method="POST" class="row g-3 p-5">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="fullnameInput" class="form-label">Mã Khuyến Mại</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
            </div>
            <div class="col-md-4">
                <label for="fullnameInput" class="form-label">Giá trị</label>
                <input type="number" class="form-control" name="discount_rate" value="{{$data->discount_rate}}">
            </div>
            <div class="col-md-8">
                <label for="exampleFormControlTextarea5" class="form-label">Mô tả</label>
                <textarea class="form-control" placeholder="Mô tả chi tiết" id="exampleFormControlTextarea5" name="description" rows="1">{{$data->description}}</textarea>
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
