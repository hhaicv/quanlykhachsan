@extends('admin.layouts.mater')

@section('title')
    Danh sách Loại Phòng
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">RoomTypes</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Loại Phòng</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">Danh sách</h5>
                 <a class="btn btn-primary mb-3" href="{{ route('admin.room_types.create') }}">Thêm mới Loại Phòng</a>
            </div>
            <div class="card-body">
                <table id="example"
                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Loại Phòng</th>
                            <th>Hình Ảnh</th>
                            <td>Kích Thước</td>
                            <th>Số Người</th>
                            <th>Mô Tả</th>
                            <th>Dịch Vụ</th>
                            <th>Is_Action</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><img width="80px" src="{{ Storage::url($item->cover) }}" alt=""></td>
                            <td>{{$item->size}}</td>
                            <td>{{$item->maxOccupancy}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                @foreach($item->services as $service)
                                    <span class="badge bg-info">{{ $service->name }}</span>
                                @endforeach
                            </td>
                            <td>{!! $item->is_active ?  '<span class="badge bg-success-subtle text-success">Active</span>'
                            : '<span class="badge bg-danger-subtle text-danger">Disabled</span>' !!}</td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a href="{{ route('admin.room_types.edit', $item->id) }}" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                    <a href="{{ route('admin.room_types.destroy', $item->id) }}" onclick="return confirm('Bạn có muốn xóa không???')" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

@endsection

@section('style-libs')
     <!--datatable css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
     <!--datatable responsive css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
new DataTable("#example", {order: [[0, 'desc']]});
</script>
@endsection
