<section class="cart_header position-relative">
    <div class="container">
        <div class="btns position-absolute">
            <a href="{{route('web.index')}}" class="btn btn-success fw-bold">الرئيسية</a>
            <a href="{{ route('cart.list') }}" class="btn btn-danger fw-bold">
                ({{ Cart::getTotalQuantity()}})
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <a href="#" class="btn btn-danger fw-bold">شاركنا رأيك</a>
            <a href="#" class="btn btn-danger fw-bold waiter_reques">طلب الجرسون</a>
            @if(auth()->guard('client')->check())
        <a href="{{route('client.logout')}}" class="btn btn-danger fw-bold">تسجيل الخروج</a>
        @else
        <a href="{{route('client.login.form')}}" class="btn btn-danger fw-bold">تسجيل الدخول</a>
        @endif
        </div>
    </div>
</section>
<div class="overflew position-absolute"></div>
<main>