@extends('client.layouts.mater')
@section('title')
    Chi tiết Phòng {{ $data->name }}
@endsection
@section('content')
    <section class="section-product-detail">
        <section class="banner-tems text-center">
            <div class="container">
                <div class="banner-content">
                    <h2>{{ $data->name }}</h2>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="product-detail margin">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="wrapper">
                            <div class="gallery3">
                                <?php
                                $images = json_decode($data->images); ?>
                                @foreach ($images as $item)
                                    <div class="gallery__img-block">
                                        <img src="{{ Storage::url("$item") }}" alt="{{ Storage::url("$item") }}">
                                    </div>
                                @endforeach
                                <div class="gallery__controls">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-detail_book">
                            <div class="product-detail_total">
                                <img src="{{ asset('theme/client/images/Product/icon.png') }}" alt="#"
                                    class="icon-logo">
                                <h6>STARTING ROOM FROM</h6>
                                <p class="price">
                                    <span class="">{{ number_format($data->price, 0, ',', '.') }}VNĐ/Đêm
                                </p>
                            </div>
                            <div class="product-detail_form">
                                <div class="sidebar">
                                    <div class="widget widget_check_availability">
                                        <div class="check_availability">
                                            <div class="check_availability-field">
                                                <label>Arrive</label>
                                                <div class="input-group date" data-date-format="dd-mm-yyyy"
                                                    id="datepicker1">
                                                    <input class="form-control wrap-box" type="text"
                                                        placeholder="Arrival Date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="check_availability-field">
                                                <label>Depature</label>
                                                <div id="datepicker2" class="input-group date"
                                                    data-date-format="dd-mm-yyyy">
                                                    <input class="form-control wrap-box" type="text"
                                                        placeholder="Departure Date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="check_availability-field">
                                                <label>Adult</label>
                                                <select class="awe-select">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                            <div class="check_availability-field">
                                                <label>Chirld</label>
                                                <select class="awe-select">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-room btn-product">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-detail_tab">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="product-detail_tab-header">
                            <li><a href="#overview" data-toggle="tab">Tổng Quan</a></li>
                            <li class="active"><a href="#amenities" data-toggle="tab">Tiện Nghi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="product-detail_tab-content tab-content">

                            <div class="tab-pane fade" id="overview">
                                <div class="product-detail_overview">
                                    <h5 class='text-uppercase'>{{ $data->name }}</h5>
                                    <p>{{ $data->content }}</p>
                                    <div class="row">
                                        <div class="col-xs-6 col-md-4">
                                            <h6>Tổng quan phòng</h6>
                                            <ul>
                                                <li>Tối đa: {{ $data->max_people }}</li>
                                                <li>Diện tích: {{ $data->size }}</li>
                                                <li>View: {{ $data->view }}</li>
                                                <li>Giường: {{ $data->bed }}</li>
                                            </ul>
                                        </div>
                                        <h6>Dịch Vụ Phòng</h6>
                                        @foreach ($data->services as $ser)
                                            <div class="col-xs-6 col-md-4">
                                                <ul>
                                                    <li>{{ $ser->name }}</li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade active in" id="amenities">
                                <div class="product-detail_amenities">
                                    <div class="row">
                                        <h6>Tiện Nghi</h6>
                                        @foreach ($data->tags as $tag)
                                            <div class="col-xs-6 col-lg-4">
                                                <ul>
                                                    <li><i class="{{ $tag->icon }}"></i> {{ $tag->name }}</li>
                                                </ul>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-detail">
                <h2 class="product-detail_title">Các Phòng Khác</h2>
                <div class="product-detail_content">
                    <div class="row">
                       @foreach ($room as $item)
                       <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="product-detail_item">
                            <div class="img">
                                <a href="#"><img style="height: 180px;" src="{{ Storage::url($item->cover) }}" alt="#"></a>
                            </div>
                            <div class="text">
                                <h2><a href="#">{{ $item->name }}</a></h2>
                                <ul>
                                    <li><i class="fa fa-child" aria-hidden="true"></i> Tối đa: {{ $item->max_people }}</li>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i> Giường: {{ $item->bed }}</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i> View: {{ $item->view }}</li>
                                </ul>
                                <a href="{{ route('client.home.show', $item->id) }}" class="btn btn-room">VIEW DETAIL</a>
                            </div>
                        </div>
                    </div>
                       @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
