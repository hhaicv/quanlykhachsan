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
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="col-md-4 col-lg-3">
                            <div class="reservation-sidebar">
                                <div class="reservation-date">
                                    <h2 class="reservation-heading">Dates</h2>
                                    <ul>
                                        <input type="hidden" name="check_in_date" value="{{ $check_in_date }}">
                                        <input type="hidden" name="check_out_date" value="{{ $check_out_date }}">
                                        <input type="hidden" name="adult" value="{{ $adult }}">
                                        <input type="hidden" name="children" value="{{ $children }}">
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
                                <div class="reservation-room-selected selected-4">
                                    <h2 class="reservation-heading">Rooms</h2>
                                    <div class="reservation-room-seleted_item">
                                        <h6>Room</h6>
                                        <span class="reservation-option">{{ $room->max_people }}</span>
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
                                                $totalPrice = $room->price * $dayCount;
                                            @endphp
                                            <span
                                                class="reservation-amout">{{ number_format($totalPrice, 0, ',', '.') }}VND</span>
                                        </div>
                                        <div class="reservation-room-seleted_total-room">
                                            Tổng Tiền
                                            <span id="total-price"
                                                class="reservation-amout">{{ number_format($totalPrice, 0, ',', '.') }}VND</span>
                                            <input type="hidden" id="discount-amount" name="discount_amount">
                                            <input type="hidden" id="new-total-price" name="new_total_price" value="{{ $totalPrice }}">

                                        </div>
                                    </div>
                                    <div class="reservation-room-seleted_item">
                                        <div class="reservation-room-seleted_package">
                                            <h6>Hình ảnh</h6>
                                            <br>
                                            <a href="#"><img style="height: 180px;object-fit: cover;"
                                                    src="{{ Storage::url($room->cover) }}" alt="#"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <div class="reservation_content">
                                <div class="reservation-billing-detail">
                                    <h4>Thông tin đặt phòng</h4>
                                    <label>Tên Khách Hàng<sup> *</sup></label>
                                    <input type="text" class="input-text" name="name" placeholder="Tên khách hàng"
                                        value="{{ Auth::user()->name }}">
                                    <label>Địa Chỉ<sup> *</sup></label>
                                    <input type="text" class="input-text" name="address" placeholder="Địa chỉ">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Email<sup> *</sup></label>
                                            <input type="email" class="input-text" name="email" placeholder="Email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Số điện thoại<sup> *</sup></label>
                                            <input type="number" class="input-text" name="phone"
                                                placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <label>Mã Khuyến Mại</label>
                                            <input type="text" class="input-text" name="promotion_id"
                                                id="discount-code" placeholder="Mã Khuyến Mãi">
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-room btn3" onclick="applyDiscount()">Áp
                                                dụng</button>
                                        </div>
                                    </div>
                                    <label>Ghi Chú</label>
                                    <textarea class="input-textarea" name="note" placeholder="Ghi chú về phòng của bạn"></textarea>
                                    <ul class="option-bank">
                                        <li>
                                            <label class="label-radio">
                                                <input type="radio" class="input-radio" name="chose-bank"> Direct Bank
                                                Transfer
                                            </label>
                                            <p>Make your payment directly into our bank account. Please use your Order ID as
                                                the payment reference. Your order won’t be shipped until the funds have
                                                cleared in our account.</p>
                                        </li>
                                        <li>
                                            <label class="label-radio">
                                                <input type="radio" class="input-radio" name="chose-bank"> Cheque
                                                Payment
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
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let totalPrice = {{ $totalPrice }};

        async function applyDiscount() {
            const discountCode = document.getElementById('discount-code').value;

            try {
                const response = await fetch('/apply-discount', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        code: discountCode,
                        total_price: totalPrice
                    })
                });

                if (!response.ok) {
                    throw new Error('Mã giảm giá không hợp lệ hoặc đã hết hạn!');
                }

                const data = await response.json();
                const totalPriceElement = document.getElementById('total-price');
                const newTotalPriceInput = document.getElementById('new-total-price');

                if (totalPriceElement) {
                    const formattedPrice = data.new_total_price.toLocaleString('vi-VN');
                    totalPriceElement.innerText = `${formattedPrice} VND`;
                    newTotalPriceInput.value = data.new_total_price;
                } else {
                    console.error('Không tìm thấy phần tử với ID "total-price"');
                }

            } catch (error) {
                alert(error.message);
            }
        }

        window.applyDiscount = applyDiscount;
    });
</script>
