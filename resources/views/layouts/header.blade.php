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
                @guest
                    <ul>
                        <li class="dropdown"><a href="{{ route('login') }}" title="LOGIN" class="dropdown-toggle">Đăng
                                Nhập</a></li>
                        @if (Route::has('register'))
                            <li class="dropdown"><a href="{{ route('register') }}" title="REGISTER"
                                    class="dropdown-toggle">Đăng Ký</a>
                            </li>
                        @endif
                    </ul>
                @else
                    <li class="dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu icon-fa-caret-up submenu-hover">
                            @if (Auth::user()->type==App\Models\User::TYPE_ADMIN)
                            <li><a href="{{ route('admin.dashboard') }}" title="">Admin</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            {{-- {{-- <li><a href="room_2.html" title="">Room 2</a></li> --}}
                        </ul>
                    </li>
                @endguest

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
                    <a class="navbar-brand" href="{{ route('/') }}" title="Skyline"><img
                            src="{{ asset('theme/client/images/Home-1/sky-logo-header.png') }}" alt="#"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('/') }}" title="Home">Trang chủ</a>
                        </li>
                        <li class="dropdown ">
                            <a href="#" title="Room & Rate" class="dropdown-toggle"
                                data-toggle="dropdown">Phòng<b class="caret"></b></a>
                            <ul class="dropdown-menu icon-fa-caret-up submenu-hover">
                                @foreach (App\Models\room::query()->get() as $item)
                                <li><a href="{{ route('show', $item->id) }}" title="">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#" title="About">Giới Thiệu</a></li>
                        <li><a href="#" title="Contact">Liện Hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- END / MENU-HEADER -->
</header>
