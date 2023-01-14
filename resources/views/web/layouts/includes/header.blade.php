<header class="main_header">
    <div class="btns">
        <a href="{{ route('cart.list') }}" class="btn btn-danger fw-bold">
            ({{ Cart::getTotalQuantity()}})
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
        <a href="#" class="btn btn-danger fw-bold">شاركنا رأيك</a>
        <a href="#" class="btn btn-danger fw-bold">طلب الجرسون</a>
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
<main>