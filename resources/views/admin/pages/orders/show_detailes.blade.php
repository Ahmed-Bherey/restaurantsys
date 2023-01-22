@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.error')
                <div class="orders_page">
                    @csrf
                    <section class="order_items">
                        <div class="container">
                            <div class="title fw-bold">العناصر</div>
                            <div class="row">
                                @foreach ($orders as $order)
                                    <div class="col-12 col-md-6 col-lg-4 order_items_box mb-3">
                                        <div class="order_items_box_content">
                                            <div class="order_items_box_img">
                                                <img src="{{ asset('/public/' . Storage::url($order->img)) }}"
                                                    alt="{{ $order->name }}">
                                            </div>
                                            <div class="order_items_box_info">
                                                <p class="name fw-bold">{{ $order->name }}</p>
                                                <div class="d-flex">
                                                    <p class="quantity">{{ $order->quantity }}</p>X
                                                    <p class="price">
                                                        {{ number_format($order->quantity * $order->price, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section class="receive_way">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <select required="required" class="form-control receive_way_opts" name="receive_way"
                                        id="receive_way">
                                        <option value="1" @if ($orderTotal->receive_way == 1) selected @endif>تناول الطلب
                                            فى المكان</option>
                                        <option value="2" @if ($orderTotal->receive_way == 2) selected @endif>استلام
                                            الطلب من المكان</option>
                                        <option value="3" @if ($orderTotal->receive_way == 3) selected @endif>توصيل
                                        </option>
                                    </select>
                                </div>
                                @if ($orderTotal->receive_way == 1)
                                    <div class="col-12 col-md-4 mb-3 in_rest">
                                        <select class="form-control" name="table_id" id="table_id">
                                            @if ($orderTotal->table_id != '')
                                                <option value="{{ $orderTotal->table_id }}">
                                                    {{ $orderTotal->tables->areas->name }} - {{ $orderTotal->tables->name }}
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                @elseif($orderTotal->receive_way == 2)
                                    <div class="col-12 col-md-4 mb-3 from_rest">
                                        <input type="time" class="form-control" value="{{ $orderTotal->receive_time }}"
                                            readonly placeholder="اختر وقت استقبال الطلب" name="receive_time">
                                    </div>
                                    <div class="col-12 col-md-4 mb-3 from_rest">
                                        <input type="tel" class="form-control" value="{{ $orderTotal->tel }}" readonly
                                            placeholder="رقم الهاتف" name="tel">
                                    </div>
                                @else
                                    <div class="col-12 col-md-4 mb-3 delivery_rest">
                                        <textarea class="form-control" readonly rows="1" placeholder="ادخل العنوان بالتفصيل" name="address"
                                            id="address">{{ $orderTotal->address }}</textarea>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3 delivery_rest">
                                        <select class="form-control" name="delivery_id" id="delivery_id">
                                            @if ($orderTotal->delivery_id != '')
                                                <option value="{{ $orderTotal->delivery_id }}">
                                                    {{ $orderTotal->deliveries->name }} -
                                                    {{ number_format($orderTotal->deliveries->cost, 2) }} جـ</option>
                                            @endif
                                        </select>
                                    </div>
                                @endif
                                <div class="col-12 col-md-4 mb-3">
                                    <textarea class="form-control" readonly rows="1" placeholder="ملاحظات مع الطلب ..." name="notes" id="notes">{{ $orderTotal->notes }}</textarea>
                                </div>
                            </div>
                            <form action="{{ route('order.update', $orderTotal->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="0" name="received">
                                <input type="hidden" value="0" name="finished">
                                <input type="hidden" value="1" name="prepared">
                                <button type="submit" class="btn btn-primary">تم التجهيز</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
