@extends('web.layouts.includes.cart')
@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    <div class="orders_page">
        <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="order_items">
                <div class="container">
                    <div class="title fw-bold">العناصر</div>
                    <div class="row">
                        @foreach ($orderHiddens as $orderHidden)
                            <div class="col-12 col-md-6 col-lg-3 order_items_box mb-3">
                                <div class="order_items_box_content">
                                    <div class="order_items_box_img">
                                        <img src="{{ asset('/public/' . Storage::url($orderHidden->img)) }}"
                                            alt="{{ $orderHidden->name }}">
                                    </div>
                                    <div class="order_items_box_info">
                                        <p class="name fw-bold">{{ $orderHidden->name }}</p>
                                        <div class="d-flex">
                                            <p class="quantity">{{ $orderHidden->quantity }}</p>X
                                            <p class="price">{{ number_format($orderHidden->price, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{$orderHidden->id}}" name="data[orderHidden_id][]">
                            <input type="hidden" value="{{$orderHidden->img}}" name="data[img][]">
                            <input type="hidden" value="{{$orderHidden->name}}" name="data[name][]">
                            <input type="hidden" value="{{$orderHidden->quantity}}" name="data[quantity][]">
                            <input type="hidden" value="{{$orderHidden->price}}" name="data[price][]">
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="receive_way">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <select required="required" class="form-control receive_way_opts" name="receive_way" id="receive_way">
                                <option value="1" selected>تناول الطلب فى المكان</option>
                                <option value="2">استلام الطلب من المكان</option>
                                <option value="3">توصيل</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 mb-3 in_rest">
                            <select class="form-control" name="table_id" id="table_id">
                                <option value="">اختر الطاولة</option>
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->areas->name }} - {{ $table->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-4 mb-3 from_rest">
                            <input type="time" class="form-control" placeholder="اختر وقت استقبال الطلب" name="receive_time">
                            اختر موعد استلام الطلب
                        </div>
                        <div class="col-12 col-md-4 mb-3 from_rest">
                            <input type="tel" class="form-control" placeholder="رقم الهاتف" name="tel">
                        </div>

                        <div class="col-12 col-md-4 mb-3 delivery_rest">
                            <textarea class="form-control" rows="1" placeholder="ادخل العنوان بالتفصيل" name="address" id="address"></textarea>
                        </div>
                        <div class="col-12 col-md-4 mb-3 delivery_rest">
                            <select class="form-control" name="delivery_id" id="delivery_id">
                                <option value="">اختر منطقة التوصيل</option>
                                @foreach ($deliveries as $delivery)
                                    <option value="{{ $delivery->id }}">{{ $delivery->name }} -
                                        {{ number_format($delivery->cost, 2) }} جـ
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-4 mb-3">
                            <textarea class="form-control" rows="1" placeholder="ملاحظات مع الطلب ..." name="notes" id="notes"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mb-3">تأكيد الطلب</button>
                </div>
            </section>
        </form>
    </div>
@endsection
