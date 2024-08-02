@extends('layouts.app')
@section('title')
    Thành Công
@endsection
@section('content')
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>Mã phòng: {{ $payment->transaction_id }}</h2>
                <p>Cảm ơn quý khách đã đặt phòng</p>
            </div>
        </div>
    </section>
    <!-- RESERVATION -->
    <section class="section-reservation-page">
        <div class="container">
            <div class="reservation-page">

                <div class="row">
                    <!--  SIDEBAR -->
                    <div class="col-md-4 col-lg-3">
                        <div class="reservation-sidebar">
                            <div class="reservation-date">
                                <h2 class="reservation-heading">Dates</h2>
                                <ul>

                                    <li>
                                        <span>Check-In</span>
                                        <span>{{ $order->check_in_date }}</span>
                                    </li>
                                    <li>
                                        <span>Check-Out</span>
                                        <span>{{ $order->check_out_date }}</span>
                                    </li>
                                    <li>
                                        <span>Total Guests</span>
                                        <span> Người Lớn {{ $order->adults }} Trẻ Con {{ $order->children }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="reservation-room-selected selected-4">
                                <h2 class="reservation-heading">Rooms</h2>
                                <div class="reservation-room-seleted_item">
                                    <div class="reservation-room-seleted_package">
                                        <ul>
                                            <li>
                                                <span>Giá:</span>
                                                <span>{{ number_format($room->price, 0, ',', '.') }}VNĐ/Đêm</span>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <span>Dịch Vụ</span>
                                                <span>Free</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="reservation-room-seleted_total-room">
                                        Tổng Tiền
                                        <span id="total-price"
                                            class="reservation-amout">{{ number_format($payment->amount, 0, ',', '.') }}VND</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--  END/SIDEBAR -->
                    <!-- CONTENT -->
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <div class="reservation_content">
                            <!-- RESERVATION ROOM -->
                            <div class="reservation-room">
                                <!-- ITEM -->
                                <div class="reservation-room_item">
                                    <h2 class="reservation-room_name"><a href="#">{{ $room->name }}</a></h2>
                                    <div class="reservation-room_img">
                                        <a href="#"><img src="{{ Storage::url($room->cover) }}" alt="#"
                                                class="img-responsive"></a>
                                    </div>
                                    <div class="reservation-room_text">
                                        <div class="reservation-room_desc">
                                            <p>{{ $room->content }}</p>
                                            <ul>
                                                <li>Tối đa: {{ $room->max_people }}</li>
                                                <li>Diện tích: {{ $room->size }}</li>
                                                <li>View: {{ $room->view }}</li>
                                                <li>Giường: {{ $room->bed }}</li>
                                            </ul>
                                        </div>
                                        <a href="#" class="reservation-room_view-more">View More Infomation</a>
                                        <div class="clear"></div>
                                        <p class="reservation-room_price">
                                            <span
                                                class="reservation-room_amout">{{ number_format($room->price, 0, ',', '.') }}</span>VNĐ/Đêm
                                        </p>
                                    </div>

                                </div>

                            </div>
                            <!-- END / RESERVATION ROOM -->
                        </div>
                    </div>
                    <!-- END / CONTENT -->
                </div>
            </div>
        </div>
    </section>
@endsection
