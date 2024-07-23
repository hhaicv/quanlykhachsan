@extends('admin.layouts.mater')

@section('title')
    Cập nhật Phòng {{ $data->name }}
@endsection
@section('content')
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cập nhật Phòng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Cập nhật</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate action="{{ route('admin.rooms.update', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Tên Phòng</label>
                                    <input type="text" class="form-control" id="product-title-input" name="name" value="{{ $data->name }}" required>
                                </div>
                                <div class="mt-3">
                                    <label for="content" class="form-label">Mô tả</label>
                                    <textarea name="content" id="content" class="form-control">{{ $data->content }}</textarea>
                                 </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Hình ảnh</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <h5 class="fs-14 mb-1">Ảnh</h5>
                                    <p class="text-muted">Cập nhật hình ảnh chính</p>
                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute top-100 start-100 translate-middle">
                                                <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                            <i class="ri-image-fill"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input class="form-control d-none" name="cover" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                            </div>
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="{{ Storage::url($data->cover) }}" id="product-img" class="avatar-md h-auto" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="fs-14 mb-1">Ảnh phụ</h5>
                                    <p class="text-muted">Cập nhật các hình ảnh phụ</p>

                                    <div class="dropzone text-center">
                                        <div class="fallback mt-3">
                                            <input name="images[]" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h5>Drop files here or click to upload.</h5>
                                        </div>
                                         <?php
                                        $images = json_decode($data->images);?>
                                        @foreach ($images as $item)
                                        <img width="80px" src="{{ Storage::url("$item") }}" alt="">

                                        @endforeach
                                    </div>

                                    <!-- end dropzon-preview -->
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-3">
                                    <label for="content" class="form-label">Mô tả</label>
                                    <textarea name="content" id="content" class="form-control">{{ $data->content }}</textarea>
                                 </div>
                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Submit</button>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Số</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Giá Phòng</label>
                                    <input type="number" name="price" class="form-control" value="{{ $data->price }}">
                                </div>

                                <div class="mb-3">
                                    <label for="choices" class="form-label">Số Phòng</label>
                                    <input type="number" name="quantity" class="form-control" value="{{ $data->quantity }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Số Người</label>
                                    <input type="text" name="max_people" class="form-control" value="{{ $data->max_people }}">
                                </div>

                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Kích Thước</label>
                                    <input type="text" name="size" class="form-control" value="{{ $data->size }}">
                                </div>

                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Giường</label>
                                    <input type="text" name="bed" class="form-control" value="{{ $data->bed }}">
                                </div>

                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">View</label>
                                    <input type="text" name="view" class="form-control" value="{{ $data->view }}">
                                </div>
                            
                            </div>
                          
                            <!-- end card body -->
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Dịch Vụ</h5>
                            </div>
                            <div class="card-body">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <select class="form-control" name="services[]" id="services" multiple="multiple">
                                            @foreach ($allServices as $service)
                                                <option value="{{ $service->id }}"
                                                    @if (in_array($service->id, $services)) selected @endif>
                                                    {{ $service->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Tiện ích</h5>
                            </div>
                            <div class="card-body">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <select class="form-control" name="tags[]" multiple="multiple">
                                            @foreach ($allTags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    @if (in_array($tag->id, $tags)) selected @endif>
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                  

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </form>



    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

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
