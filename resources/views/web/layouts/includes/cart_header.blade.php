<section class="cart_header position-relative">
    <div class="container">
        <div class="btns position-absolute">
            <a href="{{route('web.index')}}" class="btn btn-success fw-bold">الرئيسية</a>
            <a href="{{ route('cart.list') }}" class="btn btn-danger fw-bold">
                ({{ Cart::getTotalQuantity()}})
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <a href="#" class="btn btn-danger fw-bold">شاركنا رأيك</a>
            <a href="#" class="btn btn-danger fw-bold">طلب الجرسون</a>
        </div>
    </div>
</section>
<main>