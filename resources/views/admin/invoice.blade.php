<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from html.laralink.com/invoma/general_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Aug 2024 16:23:26 GMT -->

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>Hóa Đơn #{{ $pay->transaction_id }}</title>

    <link rel="stylesheet" href="{{ asset('theme/invoma/assets/css/style.css') }}">
</head>

<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style2" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_top_head tm_mb20">
                        <div class="tm_invoice_left">
                            <div class="tm_logo"><img src="{{ asset('theme/invoma/assets/img/logo.svg') }}"
                                    alt="Logo"></div>
                        </div>
                        <div class="tm_invoice_right">
                            <div class="tm_grid_row tm_col_3">
                                <div>
                                    <b class="tm_primary_color">Email</b> <br>
                                    skybooking@gmail.com <br>
                                    support_sky@gmail.com
                                </div>
                                <div>
                                    <b class="tm_primary_color">SĐT</b> <br>
                                    0917 555 305 <br>
                                </div>
                                <div>
                                    <b class="tm_primary_color">Địa Chỉ</b> <br>
                                    94 Hồ Tùng Mậu<br>
                                    Cầu Giấy
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_invoice_info tm_mb10">
                        <div class="tm_invoice_info_left">
                            <p class="tm_mb2"><b>Gửi Đến:</b></p>
                            <p>
                                <b class="tm_f16 tm_primary_color">{{ $order->name }}</b> <br>
                                {{ $order->address }} <br>
                                {{ $order->email }} <br>
                                {{ $order->phone }}
                            </p>
                        </div>
                        <div class="tm_invoice_info_right">
                            <div
                                class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide">
                                Hóa Đơn</div>
                            <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_accent_bg">
                                <div>
                                    <span class="tm_white_color_60">Số tiền:</span> <br>
                                    <b
                                        class="tm_f16 tm_white_color">{{ number_format($pay->amount, 0, ',', '.') }}VNĐ</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Ngày tạo:</span> <br>
                                    <b class="tm_f16 tm_white_color">{{ $pay->created_at->format('d-m-Y') }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Mã Hóa Đơn:</span> <br>
                                    <b class="tm_f16 tm_white_color">#{{ $pay->transaction_id }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_table tm_style1">
                        <div class="tm_round_border">
                            <div class="tm_table_responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="tm_width_7 tm_semi_bold tm_accent_color">Phòng</th>
                                            <th class="tm_width_3 tm_semi_bold tm_accent_color">Giá</th>
                                            <th class="tm_width_2 tm_semi_bold tm_accent_color">Số Ngày</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tm_gray_bg">
                                            <td class="tm_width_7">
                                                <p class="tm_m0 tm_f16 tm_primary_color">{{ $room->name }}</p>
                                                {{ \Str::limit($room->content, 40) }}
                                            </td>
                                            <td class="tm_width_3">
                                                {{ number_format($room->price, 0, ',', '.') }}VNĐ/Đêm</td>
                                            @php
                                                $checkInDate = new \DateTime($order->check_in_date);
                                                $checkOutDate = new \DateTime($order->check_out_date);
                                                $interval = $checkOutDate->diff($checkInDate);
                                                $dayCount = $interval->days;

                                            @endphp
                                            <td class="tm_width_2">{{ $dayCount }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer tm_mb15 tm_m0_md">
                            <div class="tm_left_footer">
                                <div class="tm_card_note tm_ternary_bg tm_white_color"><b>Thanh toán qua: </b>{{ $pay->payment_method }}</div>
                                <p class="tm_mb2"><b class="tm_primary_color">Ghi chú:</b></p>
                                <p class="tm_m0">{{ $order->note }}</p>
                            </div>
                            <div class="tm_right_footer">
                                <table class="tm_mb15">
                                    <tbody>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Tạm tính</td>
                                            <td
                                            @php
                                                $provisional= $room->price * $dayCount;
                                                // dd($provisional)
                                            @endphp
                                                class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold"> {{ number_format($provisional, 0, ',', '.') }}VNĐ</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_danger_color tm_border_none tm_pt0">{{ $sale->description }}
                                            </td>
                                            @php
                                            $free= ($provisional * $sale->discount_rate)/ 100;
                                        @endphp
                                            <td class="tm_width_3 tm_danger_color tm_text_right tm_border_none tm_pt0">
                                                - {{ number_format($free, 0, ',', '.') }}VNĐ</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Thuế 0%</td>
                                            <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">
                                                </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_accent_bg tm_radius_6_0_0_6">
                                                Tổng Cộng </td>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">
                                                {{ number_format($pay->amount, 0, ',', '.') }}VNĐ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer tm_type1">
                            <div class="tm_left_footer"></div>
                            <div class="tm_right_footer">
                                <div class="tm_sign tm_text_center">
                                    <img src="{{ asset('theme/invoma/assets/img/sign.svg') }}" alt="Sign">
                                    <p class="tm_m0 tm_ternary_color">hoanghai</p>
                                    <p class="tm_m0 tm_f16 tm_primary_color">Quản lý khách sạn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_note tm_font_style_normal tm_text_center">
                        <hr class="tm_mb15">
                        <p class="tm_mb2"><b class="tm_primary_color">Điều khoản và điều kiện:
                        </b></p>
                        <p class="tm_m0">Mọi khiếu nại liên quan đến chất lượng hoặc dịch vụ của khách sạn xin quý khách hãy liên hệ số hotline để được giải quyết. Cảm ơn và hẹn gặp lại!!!
                            </p>
                    </div><!-- .tm_note -->
                </div>
            </div>
            <div class="tm_invoice_btns tm_hide_print">
                <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" fill='currentColor' />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                </a>
                <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32" />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Download</span>
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('theme/invoma/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/invoma/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('theme/invoma/assets/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('theme/invoma/assets/js/main.js') }}"></script>
</body>

<!-- Mirrored from html.laralink.com/invoma/general_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Aug 2024 16:23:28 GMT -->

</html>
