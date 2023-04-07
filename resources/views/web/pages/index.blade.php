@extends('web.layouts.includes.master')
@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
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
                                        <div class="product_content hide_model test d-flex justify-content-between">
                                            <div class="product_info">
                                                <div class="product_name fw-bold mb-2">{{ $item->name }}</div>
                                                <div class="product_desc mb-2">{{ $item->desc }}</div>
                                                <div class="product_price fw-bold mb-2 d-inline-block">
                                                    {{ number_format($item->price, 2) }} جـ
                                                </div>
                                                {{-- <form action="{{ route('cart.store') }}" method="POST"
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
                                                </form> --}}
                                            </div>
                                            <div class="product_img">
                                                <img src="{{ asset('/public/' . Storage::url($item->img)) }}"
                                                    alt="">
                                            </div>

                                            <div class="product_model">
                                                <div class="title d-flex justify-content-between">
                                                    <h4>أضف الى الطلبات</h4>
                                                    <div class="icon">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </div>
                                                </div>
                                                <div class="product_model_img text-center">
                                                    <img src="{{ asset('/public/' . Storage::url($item->img)) }}"
                                                        alt="">
                                                </div>
                                                <h5 class="item_name mb-3 fw-bold">{{ $item->name }}</h5>
                                                <p class="item_desc mb-3">{{ $item->desc }}</p>
                                                <form action="{{ route('orderHidden.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="item_id">
                                                    <input type="hidden" value="{{ $item->img }}" name="img">
                                                    <input type="hidden" value="{{ $item->name }}" name="name">
                                                    <input type="hidden" value="{{ $item->desc }}" name="desc">
                                                    <input type="hidden" value="{{ $item->price }}" name="price">
                                                    <div class="extras">
                                                        <p class="btn btn-light mb-2 quantity">الاضافات</p>
                                                        <div class="radios d-flex justify-content-between mx-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    جبنة اضافية
                                                                </label>
                                                            </div>
                                                            <p class="price">10.00 جـ</p>
                                                        </div>
                                                        <div class="radios d-flex justify-content-between mx-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    جبنة اضافية
                                                                </label>
                                                            </div>
                                                            <p class="price">10.00 جـ</p>
                                                        </div>
                                                        <div class="radios d-flex justify-content-between mx-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    جبنة اضافية
                                                                </label>
                                                            </div>
                                                            <p class="price">10.00 جـ</p>
                                                        </div>
                                                    </div>
                                                    <p class="btn btn-light mb-2 quantity">الكمية</p>
                                                    <input type="number" name="quantity" value="1"
                                                        class="w-100 mb-2 px-2">
                                                    <div class="total_price">11.00 جـ</div>
                                                    <button type="submit" class="btn btn-primary w-100 my-2">أضف الى
                                                        الطلبات</button>
                                                </form>
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
                        @if (auth()->guard('client')->check() && $orderHiddens->count() != 0)
                            @foreach ($orderHiddens as $orderHidden)
                                <div class="order_items my-3 px-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="countName d-flex">
                                            <div class="d-flex">
                                                <div class="count">{{ $orderHidden->quantity }}</div>X
                                                <div class="name">{{ $orderHidden->name }}</div>
                                            </div>
                                        </div>
                                        <div class="price ms-2">{{ number_format($orderHidden->price, 2) }}</div>
                                        <a href="{{ route('orderHidden.destroy', $orderHidden->id) }}" class="romove"><i
                                                class="fa-solid fa-xmark"></i></a>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                الاجمالى: {{ $orderHiddens->sum('price') }} جـ
                            </div>
                            <div>
                                <div class="text-center mt-3">
                                    <a href="{{ route('web.order') }}" class="btn btn-success ms-2">استكمال الطلب</a>
                                    <a href="#" class="btn btn-danger">حذف الكل</a>
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
