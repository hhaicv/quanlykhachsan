<header class="header-sky" style="background-color: black">
    <div class="container">
        <!--HEADER-TOP-->
        <div class="header-top">
            <div class="header-top-left">
                <span><i class="ion-android-cloud-outline"></i>30 °C</span>
                <span><i class="ion-ios-location-outline"></i> 94 Hồ Tùng Mậu, Mai Dịch, Cầu Giấy</span>
                <span><i class="fa fa-phone" aria-hidden="true"></i> 0917 555 305</span>
            </div>
            <div class="header-top-right">
                @if (Route::has('login'))
                    <ul>
                        <li class="dropdown"><a href="{{ route('login') }}" title="LOGIN" class="dropdown-toggle">Đăng
                                Nhập</a></li>
                        @if (Route::has('register'))
                            <li class="dropdown"><a href="{{ route('register') }}" title="REGISTER"
                                    class="dropdown-toggle">Đăng Ký</a>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
        </div>
        <!-- END/HEADER-TOP -->
    </div>
    <!-- MENU-HEADER -->
    <div class="menu-header">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                    </button>
                    <a class="navbar-brand" href="file:///E:/Xampp/htdocs/skyline/index.html" title="Skyline"><img
                            src="{{ asset('theme/client/images/Home-1/sky-logo-header.png') }}" alt="#"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.html" title="Home" data-toggle="dropdown">Trang chủ</a>
                        </li>
                        <li class="dropdown ">
                            <a href="room_1.html" title="Room & Rate" class="dropdown-toggle"
                                data-toggle="dropdown">Phòng<b class="caret"></b></a>
                            <ul class="dropdown-menu icon-fa-caret-up submenu-hover">
                                <li><a href="room_1.html" title="">Room 1</a></li>
                                <li><a href="room_2.html" title="">Room 2</a></li>
                                <li><a href="room_3.html" title="">Room 3</a></li>
                                <li><a href="room_4.html" title="">Room 4</a></li>
                                <li><a href="room_5.html" title="">Room 5</a></li>
                                <li><a href="room_6.html" title="">Room 6</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html" title="About">Giới Thiệu</a></li>
                        <li><a href="contact.html" title="Contact">Liện Hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- END / MENU-HEADER -->
</header>
