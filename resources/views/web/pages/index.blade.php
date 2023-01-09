@extends('web.layouts.includes.master')
@section('content')
    <section class="sections d-flex justify-content-around">
        <h4>قائمة المنتجات</h4>
        <h4>معلومات التواصل</h4>
    </section>
    <section class="sections_info">
        <div class="container">
            <div class="row position-relative">
                @foreach ($categories as $key => $category)
                    <div class="col-12 col-lg-9 products mb-3">
                        <div class="product_box">
                            <div class="cat_title text-center fw-bold">{{ $category->name }}</div>
                            <div class="row">
                                @foreach (\App\Models\Item::where('category_id', $category->id)->latest()->paginate(8) as $item)
                                    <div class="col-12 col-md-6">
                                        <div class="product_content d-flex justify-content-between">
                                            <div class="product_info">
                                                <div class="product_name fw-bold mb-2">{{ $item->name }}</div>
                                                <div class="product_desc mb-2">{{ $item->desc }}</div>
                                                <div class="product_price fw-bold mb-2">{{ $item->price }}</div>
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
                        <div class="order_box_info text-center my-3">لا يوجد اى طلبات</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
