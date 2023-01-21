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
                                                        <td>العميل</td>
                                                        <td>الاسم</td>
                                                        <td>السعر</td>
                                                        <td>طريقة الاستقبال</td>
                                                        <td colspan="2">تفاصيل الطلب</td>
                                                        <td>ملاحظات</td>
                                                        <th>عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $key => $order)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $order->clients->username }}</td>
                                                            <td>X{{ $order->quantity }}{{ $order->name }}</td>
                                                            <td>{{ $order->price }}</td>
                                                            <td>
                                                                @if ($order->receive_way == 1)
                                                                    تناول الطلب فى المكان
                                                                @elseif($order->receive_way == 2)
                                                                    استلام الطلب من المكان
                                                                @else
                                                                    توصيل
                                                                @endif
                                                            </td>
                                                            <td colspan="2">
                                                                @if ($order->receive_way == 1)
                                                                    الطاولة: {{ $order->tables->name }}
                                                                @elseif($order->receive_way == 2)
                                                                    موعد الاستلام: {{ $order->receive_time }}
                                                                    رقم الهاتف: {{ $order->tel }}
                                                                @else
                                                                    العنوان: {{ $order->address }}
                                                                    العنوان: {{ $order->deliveries->name }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $order->notes }}</td>
                                                            <td class="d-flex">
                                                                <form action="{{ route('order.update', $order->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success">قبول</button>
                                                                </form>
                                                                <a href="{{ route('order.destroy', $order->id) }}"
                                                                    type="submit" onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger">رفض</a>
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
