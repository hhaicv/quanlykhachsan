@extends('layouts.app')
@section('title')
    Các loại phòng
@endsection
@section('content')
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>Phòng và Giá</h2>
            </div>
        </div>
    </section>

    <section class="body-room-1 ">
        <div class="container">
            <div class="room-wrap-1">
                <div class="row">
                    @foreach ($rooms as $item)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="room-item-1">
                            <h2><a href="#">{{ $item->name }}</a></h2>
                            <div class="img">
                                <a href="#"><img style="height: 400px;object-fit: cover;" src="{{ Storage::url($item->cover) }}" alt="#"></a>
                            </div>
                            <div class="content">
                                <p>{{ $item->content }}</p>
                                <ul>
                                    <li>Max: {{ $item->max_people }}</li>
                                    <li>View: {{ $item->view }}</li>
                                    <li>Size: {{ $item->size }}</li>
                                    <li>Bed: {{ $item->bed }}</li>
                                </ul>
                            </div>
                            <div class="bottom">
                                <span class="price">Starting <span class="amout">{{ number_format($item->price, 0, ',', '.') }}</span> VNĐ/Đêm</span>
                                <a href="#" class="btn">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
