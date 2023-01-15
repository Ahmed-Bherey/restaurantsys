@extends('web.layouts.includes.master')
@section('content')
    <section class="sections d-flex justify-content-around">
        <div class="sections_links">
            <h4>قائمة المنتجات</h4>
            <div class="links mt-3">
                @foreach ($categories as $key => $category)
                    <a href="#{{ $category->name }}" class="text-decoration-none ms-3 fw-bold">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <h4 class="add_new_img">معلومات التواصل</h4>
    </section>
    <section class="sections_info">
        <div class="container">
            <div class="row position-relative">
                @foreach ($categories as $key => $category)
                    <div class="col-12 col-lg-9 products mb-3" id="{{ $category->name }}">
                        <div class="product_box">
                            <div class="cat_title text-center fw-bold">{{ $category->name }}</div>
                            <div class="row">
                                @foreach (\App\Models\Item::where('category_id', $category->id)->latest()->paginate(8) as $item)
                                    <div class="col-12 col-md-6">
                                        <div class="product_content test d-flex justify-content-between">
                                            <div class="product_info">
                                                <div class="product_name fw-bold mb-2">{{ $item->name }}</div>
                                                <div class="product_desc mb-2">{{ $item->desc }}</div>
                                                <div class="product_price fw-bold mb-2 d-inline-block">
                                                    {{ number_format($item->price, 2) }} جـ
                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST"
                                                    enctype="multipart/form-data" class="d-inline-block mb-3">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <input type="hidden" value="{{ $item->name }}" name="name">
                                                    <input type="hidden" value="{{ $item->price }}" name="price">
                                                    <input type="hidden" value="{{ $item->img }}" name="img">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class="text-white" title="اضف الى السلة">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                    </button>
                                                </form>
                                                {{-- <div class="cursor-pointer detailes_show hide">
                                                    <p style="cursor: pointer">عرض التفاصيل</p>
                                                    <div class="extras mb-2">
                                                        <div class="sizes">
                                                            <span>كبير</span>
                                                            <span>وسط</span>
                                                            <span>صغير</span>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="product_img">
                                                <img src="{{ asset('/public/' . Storage::url($item->img)) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ \App\Models\Item::where('category_id', $category->id)->latest()->paginate(8)->links() }}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 col-lg-3 order_info mb-3 position-absolute">
                    <div class="order_box">
                        <div class="cat_title text-center">
                            <p class="fw-bold">طلباتى</p>
                            <p>الحد الأدنى للطلبات 10.00 جـ</p>
                        </div>
                        @if ($cartItems->count() != 0)
                            @foreach ($cartItems as $cartItem)
                                <div class="order_items my-3 px-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="countName d-flex">
                                            <div class="d-flex flex-column">
                                                <div class="name">{{ $cartItem->name }}</div>
                                                <div class="count">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="submit_confirm"><i
                                                                class="fa-solid fa-check"></i></button>
                                                        <input type="hidden" name="id" value="{{ $cartItem->id }}">
                                                        <input type="number" name="quantity"
                                                            value="{{ $cartItem->quantity }}" style="width: 30%" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price">{{ number_format($cartItem->price, 2) }}</div>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $cartItem->id }}" name="id">
                                            <button type="submit" class="romove me-3"><i
                                                    class="fa-solid fa-xmark"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                الاجمالى: {{ Cart::getTotal() }} جـ
                            </div>
                            <div>
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="#" class="btn btn-success ms-2">تأكيد الطلب</a>
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">حذف الكل</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="order_box_info text-center my-3">لا يوجد اى طلبات</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
