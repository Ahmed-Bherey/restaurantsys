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
                                                        <td>العناصر</td>
                                                        <td>السعر</td>
                                                        <th>عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orderTotals as $key => $orderTotal)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="#" class="btn btn-success">{{ str_pad($orderTotalCount , 7, '0', STR_PAD_LEFT) }}</a></td>
                                                            <td>{{$orderTotal->created_at}}</td>
                                                            <td>
                                                                @if ($orderTotal->receive_way == 1)
                                                                    {{$orderTotal->tables->name}}
                                                                @elseif($orderTotal->receive_way == 2)
                                                                    موعد الاستلام: {{$orderTotal->receive_time}}
                                                                    الهاتف: {{$orderTotal->tel}}
                                                                @else
                                                                العنوان: {{$orderTotal->address}}
                                                                منطقة التوصيل: {{$orderTotal->deliveries->name}}
                                                                @endif
                                                            </td>
                                                            <td>{{$orderTotal->orders->count()}}</td>
                                                            <td>{{$orderTotal->price}}</td>
                                                            <td class="d-flex">
                                                                <form action="{{ route('order.update', $orderTotal->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success">قبول</button>
                                                                </form>
                                                                <a href="{{ route('order.destroy', $orderTotal->id) }}"
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
