@extends('layouts.app')
@section('title')
    Đặt phòng
@endsection
@section('content')
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>RESERVATION</h2>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
            </div>
        </div>
    </section>
    <!-- RESERVATION -->
    <section class="section-reservation-page ">
        <div class="container">
            <div class="reservation-page">
                <!-- STEP -->
                <div class="reservation_step">
                    <ul>
                        <li><a href="#"><span>1.</span> Choose Date</a></li>
                        <li><a href="#"><span>2.</span> Choose Room</a></li>
                        <li><a href="#"><span>3.</span> Make a Reservation</a></li>
                        <li class="active"><a href="#"><span>4.</span> Confirmation</a></li>
                    </ul>
                </div>
                <!-- END / STEP -->
                <div class="row">
                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-lg-3">
                        <div class="reservation-sidebar">
                            <!-- RESERVATION DATE -->
                            <div class="reservation-date">
                                <!-- HEADING -->
                                <h2 class="reservation-heading">Dates</h2>
                                <!-- END / HEADING -->
                                <ul>
                                    <li>
                                        <span>Check-In</span>
                                        <span>{{ $check_in_date }}</span>
                                    </li>
                                    <li>
                                        <span>Check-Out</span>
                                        <span>{{ $check_out_date }}</span>
                                    </li>
                                    <li>
                                        <span>Total Guests</span>
                                        <span>{{ $adult }} Người Lớn {{ $children }} Trẻ Con</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- END / RESERVATION DATE -->
                            <!-- ROOM SELECT -->
                            <div class="reservation-room-selected selected-4 ">
                                <!-- HEADING -->
                                <h2 class="reservation-heading">Rooms</h2>
                                <!-- END / HEADING -->
                                <!-- ITEM -->
                                <div class="reservation-room-seleted_item">
                                    <h6>Room</h6> <span class="reservation-option">{{ $room->max_people }}</span>
                                    <div class="reservation-room-seleted_name has-package">
                                        <h2><a href="#">{{ $room->name }}</a></h2>
                                    </div>
                                    <div class="reservation-room-seleted_package">
                                        <h6>Giá Phòng</h6>
                                        <ul>
                                            <li>
                                                <span>Giá:</span>
                                                <span>{{ number_format($room->price, 0, ',', '.') }}VNĐ/Đêm</span>
                                            </li>
                                            <li>
                                                <span>Số Đêm: </span>
                                                <span>{{ $dayCount }}</span>
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
                                        Tạm Tính
                                        @php
                                            $aa = $room->price * $dayCount;
                                        @endphp
                                        <span class="reservation-amout">{{ number_format($aa, 0, ',', '.') }}VND</span>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                                <!-- ITEM -->
                                <div class="reservation-room-seleted_item">
                                    <div class="reservation-room-seleted_package">
                                        <h6>Hình ảnh</h6>
                                        <br>
                                        <a href="#"><img style="height: 215px;object-fit: cover;"
                                                src="{{ Storage::url($room->cover) }}" alt="#"></a>
                                    </div>
                                    <!-- END / ROOM SELECT -->
                                </div>
                                <!-- END / TOTAL -->
                            </div>
                            <!-- END / ROOM SELECT -->
                        </div>
                    </div>
                    <!-- END / SIDEBAR -->
                    <!-- CONTENT -->
                    <div class="col-md-8 col-lg-9">
                        <div class="reservation_content">
                            <div class="reservation-billing-detail">
                                </p>
                                <h4>Thông tin đặt phòng</h4>
                                <label>Tên Khách Hàng<sup> *</sup></label>
                                <input type="text" class="input-text" placeholder="Tên khách hàng">
                                <label>Địa Chỉ<sup> *</sup></label>
                                <input type="text" class="input-text" placeholder="Địa chỉ">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Email<sup> *</sup></label>
                                        <input type="email" class="input-text" placeholder="Email">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Số điện thoại<sup> *</sup></label>
                                        <input type="number" class="input-text" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <label>Mã Khuyến Mại</label>
                                <input type="text" class="input-text" placeholder="Mã Khuyến Mãi">
                                <label>Ghi Chú</label>
                                <textarea class="input-textarea" placeholder="Notes about your order, eg. special notes for delivery"></textarea>

                                <p class="reservation-code">
                                    You have a coupon? <a href="#">Click here to enter your code</a>
                                </p>
                                <ul class="option-bank">
                                    <li>
                                        <label class="label-radio">
                                            <input type="radio" class="input-radio" name="chose-bank"> Direct Bank
                                            Transfer
                                        </label>
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the
                                            payment reference. Your order won’t be shipped until the funds have cleared in
                                            our account.</p>
                                    </li>
                                    <li>
                                        <label class="label-radio">
                                            <input type="radio" class="input-radio" name="chose-bank"> Cheque Payment
                                        </label>
                                    </li>
                                    <li>
                                        <label class="label-radio">
                                            <input type="radio" class="input-radio" name="chose-bank"> Credit Card
                                        </label>
                                        <a href="#" title=""><img src="images/Reservation/american.jpg"
                                                alt="#"></a>
                                        <a href="#" title=""><img src="images/Reservation/mastercard.jpg"
                                                alt="#"> </a>
                                        <a href="#" title=""><img src="images/Reservation/o.jpg"
                                                alt="#"></a>
                                        <a href="#" title=""><img src="images/Reservation/paypal.jpg"
                                                alt="#"></a>
                                        <a href="#" title=""><img src="images/Reservation/visa.jpg"
                                                alt="#"></a>
                                        <a href="#" title=""><img src="images/Reservation/2co.jpg"
                                                alt="#"></a>
                                    </li>
                                </ul>
                                <button class="btn btn-room btn4">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                    <!-- END / CONTENT -->
                </div>
            </div>
        </div>
    </section>
@endsection
