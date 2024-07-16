@extends('admin.layouts.mater')

@section('title')
    Chi tiết Phòng {{ $data->name }}
@endsection
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Chi tiết Phòng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Chi tiết Phòng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-lg-5">
                            <div class="col-xl-4 col-md-8 mx-auto">
                                <div class="product-img-slider sticky-side-div">
                                    <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                        <div class="swiper-wrapper">
                                            <?php
                                            $images = json_decode($data->images);
                                            for ($i=0; $i < count($images); $i++) {
                                                $image = $images[$i];
                                                echo '<div class="swiper-slide">';
                                                echo '<img class="img-fluid d-block" src="' . Storage::url($image) . '" alt="">';
                                                echo '</div>';
                                            }
                                            ?>
                                           
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <!-- end swiper thumbnail slide -->
                                    <div class="swiper product-nav-slider mt-2">
                                        <div class="swiper-wrapper">
                                            <?php
                                            for ($i=0; $i < count($images); $i++) {
                                                $image = $images[$i];
                                                echo '<div class="swiper-slide">';
                                                echo '<div class="nav-slide-item">';
                                                echo '<img class="img-fluid d-block" src="' . Storage::url($image) . '" alt="">';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- end swiper nav slide -->
                                </div>
                                
                                
                            </div>
                            <!-- end col -->

                            <div class="col-xl-8">
                                <div class="mt-xl-0 mt-5">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h4>{{ $data->name }}</h4>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <a href="{{ route('admin.rooms.edit', $data->id) }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="p-2 border border-dashed rounded">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-2">
                                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                            <i class="ri-money-dollar-circle-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Giá :</p>
                                                        <h5 class="mb-0">{{ number_format($data->price, 0, ',', '.') }}VND</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="p-2 border border-dashed rounded">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-2">
                                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                            <i class="ri-file-copy-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Số Phòng :</p>
                                                        <h5 class="mb-0">{{ $data->room_number }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="p-2 border border-dashed rounded">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-2">
                                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                            <i class="ri-stack-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Kiểu Phòng :</p>
                                                        <h5 class="mb-0">{{ $data->room_type->name }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                       
                                        <!-- end col -->
                                    </div>

                                 
                                    <!-- end row -->

                                    <div class="mt-4 text-muted">
                                        <h5 class="fs-14">Mô tả :</h5>
                                        <p>{{ $data->content }}</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <h5 class="fs-14">Dịch Vụ :</h5>
                                                <ul class="list-unstyled">
                                                    @foreach($data->tags as $tag)
                                                        <span class="badge bg-info"></span>
                                                        <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> {{ $tag->name }}</li>
                                                    @endforeach
                                                  
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-3">
                                                <h5 class="fs-14">Services :</h5>
                                                <ul class="list-unstyled product-desc-list">
                                                    <li class="py-1">10 Days Replacement</li>
                                                    <li class="py-1">Cash on Delivery available</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    
    <!-- container-fluid -->


@endsection

@section('style-libs')
     <!--datatable css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
     <!--datatable responsive css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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

  
        var thumbnailSlider = new Swiper('.product-thumbnail-slider', {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        var navSlider = new Swiper('.product-nav-slider', {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        thumbnailSlider.controller.control = navSlider;
        navSlider.controller.control = thumbnailSlider;
   
</script>
@endsection
