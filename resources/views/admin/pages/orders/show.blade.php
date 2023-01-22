@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.error')
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">الطلبات</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>رقم الطلب</td>
                                                        <td>تاريخ الطلب</td>
                                                        <td>طريقة الطلب</td>
                                                        <td>التفاصيل</td>
                                                        <td>العناصر</td>
                                                        <td>السعر</td>
                                                        <th>عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orderTotals as $key => $orderTotal)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="{{ route('order.show_detailes', $orderTotal->id) }}"
                                                                    class="btn btn-success">#{{ str_pad($orderTotal->id, 5, '0', STR_PAD_LEFT) }}</a>
                                                            </td>
                                                            <td>{{ $orderTotal->created_at }}</td>
                                                            <td>
                                                                @if ($orderTotal->receive_way == 1)
                                                                    تناول الطلب فى المكان
                                                                @elseif($orderTotal->receive_way == 2)
                                                                    استلام الطلب من المكان
                                                                @else
                                                                    توصيل
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($orderTotal->receive_way == 1)
                                                                    {{ $orderTotal->tables->areas->name }} -
                                                                    {{ $orderTotal->tables->name }}
                                                                @elseif($orderTotal->receive_way == 2)
                                                                    موعد الاستلام: {{ $orderTotal->receive_time }}
                                                                    الهاتف: {{ $orderTotal->tel }}
                                                                @else
                                                                    العنوان: {{ $orderTotal->address }}
                                                                    منطقة التوصيل: {{ $orderTotal->deliveries->name }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $orderTotal->orders->count() }}</td>
                                                            <td>{{ number_format($orderTotal->orders->sum('price'), 2) }}
                                                                جـ
                                                            </td>
                                                            <td class="d-flex">
                                                                @if ($orderTotal->prepared == 1 && $orderTotal->received == 0)
                                                                    <form
                                                                        action="{{ route('order.update', $orderTotal->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" value="1"
                                                                            name="prepared">
                                                                        <input type="hidden" value="1"
                                                                            name="received">
                                                                        <button type="submit" class="btn btn-primary">تم
                                                                            الاستلام</button>
                                                                    </form>
                                                                @elseif($orderTotal->prepared == 1 && $orderTotal->received == 1 && $orderTotal->finished == 0)
                                                                    <form
                                                                        action="{{ route('order.update', $orderTotal->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" value="1"
                                                                            name="prepared">
                                                                        <input type="hidden" value="1"
                                                                            name="received">
                                                                        <input type="hidden" value="1"
                                                                            name="finished">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">منتهى</button>
                                                                    </form>
                                                                @elseif($orderTotal->prepared == 1 && $orderTotal->received == 1 && $orderTotal->received == 1)
                                                                    <p class="text-center text-gray">لا توجد اجراءات لك الان!</p>
                                                                @else
                                                                    <form
                                                                        action="{{ route('order.update', $orderTotal->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-success">قبول</button>
                                                                    </form>
                                                                    <a href="{{ route('order.destroy', $orderTotal->id) }}"
                                                                        type="submit"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        class="btn btn-danger">رفض</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.content-header -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
