<header class="main_header position-relative">
    <div class="btns">
        <a href="{{ route('cart.list') }}" class="btn btn-danger fw-bold">
            ({{ Cart::getTotalQuantity()}})
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
        <a href="#" class="btn btn-danger fw-bold">شاركنا رأيك</a>
        <a href="#" class="btn btn-danger fw-bold waiter_request">طلب الجرسون</a>
        @if(auth()->guard('client')->check())
        <a href="{{route('client.logout')}}" class="btn btn-danger fw-bold">تسجيل الخروج</a>
        @else
        <a href="{{route('client.login.form')}}" class="btn btn-danger fw-bold">تسجيل الدخول</a>
        @endif
    </div>
    <div class="header_msg d-flex align-items-center">
        <div class="logo mx-3">
            <img src="{{ asset('public/web/img/logo.png') }}" alt="">
        </div>
        <div class="msg_para">
            <h3>مطعم بيتزا</h3>
            <div><a href="#" class="text-white text-decoration-none">عرض الخريطة</a></div>
        </div>
    </div>
</header>
<div class="overflew position-fixed"></div>
<main>