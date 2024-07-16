@extends('admin.layouts.mater')

@section('title')
    Danh sách Phòng
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Rooms</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Phòng</li>
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
                 <a class="btn btn-primary mb-3" href="{{ route('admin.rooms.create') }}">Thêm mới Phòng</a>
            </div>
            <div class="card-body">
                <table id="example"
                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Phòng</th>
                            <th>Số Phòng</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Kiểu Phòng</th>
                            <th>Tiện Ích</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->room_number }}</td>
                            <td><img width="80px" src="{{ Storage::url($item->cover) }}" alt=""></td>
                            {{-- <?php
                            // $images = json_decode($item->images);
                            // $image = $images[0];
                            //     ?>
                            <td><img width="80px" src="{{ Storage::url("$image") }}" alt=""></td> --}}
                            <td>{{number_format($item->price, 0, ',', '.')}}VNĐ</td>
                            <td>{{$item->room_type->name}}</td>
                            <td>
                                @foreach($item->tags as $tag)
                                    <span class="badge bg-info">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><span class="badge bg-primary">{{$item->status}}</span></td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown"
                                        type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="{{ route('admin.rooms.show', $item->id) }}" class="dropdown-item"><i
                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                View</a></li>
                                        <li><a href="{{ route('admin.rooms.edit', $item->id) }}" class="dropdown-item edit-item-btn"><i
                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                Edit</a></li>
                                        <li>
                                            <a href="{{ route('admin.rooms.destroy', $item->id) }}" onclick="return confirm('Bạn có muốn xóa không???')" class="dropdown-item remove-item-btn">
                                                <i
                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
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
