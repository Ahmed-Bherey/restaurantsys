@extends('web.layouts.includes.master')
@section('content')
<section class="sections d-flex justify-content-around">
    <h4>قائمة المنتجات</h4>
    <h4>معلومات التواصل</h4>
</section>
    <section class="sections_info">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 products mb-3">
                    <div class="product_box">
                        <div class="cat_title text-center fw-bold">السلطات</div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="product_content d-flex justify-content-between">
                                <div class="product_info">
                                    <div class="product_name fw-bold mb-2">سلطة خضراء</div>
                                    <div class="product_desc mb-2">طماطم مقشرة - سلطة</div>
                                    <div class="product_price fw-bold mb-2">9.00 جـ</div>
                                </div>
                                <div class="product_img">
                                    <img src="{{asset('public/admin/assets/dist/img/1.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product_content d-flex justify-content-between">
                                <div class="product_info">
                                    <div class="product_name fw-bold mb-2">سلطة خضراء</div>
                                    <div class="product_desc mb-2">طماطم مقشرة - سلطة</div>
                                    <div class="product_price fw-bold mb-2">9.00 جـ</div>
                                </div>
                                <div class="product_img">
                                    <img src="{{asset('public/admin/assets/dist/img/1.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product_content d-flex justify-content-between">
                                <div class="product_info">
                                    <div class="product_name fw-bold mb-2">سلطة خضراء</div>
                                    <div class="product_desc mb-2">طماطم مقشرة - سلطة</div>
                                    <div class="product_price fw-bold mb-2">9.00 جـ</div>
                                </div>
                                <div class="product_img">
                                    <img src="{{asset('public/admin/assets/dist/img/1.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product_content d-flex justify-content-between">
                                <div class="product_info">
                                    <div class="product_name fw-bold mb-2">سلطة خضراء</div>
                                    <div class="product_desc mb-2">طماطم مقشرة - سلطة</div>
                                    <div class="product_price fw-bold mb-2">9.00 جـ</div>
                                </div>
                                <div class="product_img">
                                    <img src="{{asset('public/admin/assets/dist/img/1.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 order_info mb-3">
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