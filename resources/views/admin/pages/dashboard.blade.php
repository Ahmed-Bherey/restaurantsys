@extends('admin.layouts.includes.master')

@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    <div class="content-wrapper">
        <audio id="audiotestt">
            <source src="{{asset('public/web/img/ordernotififaction.mp3')}}" type="audio/ogg">
            <source src="{{asset('public/web/img/ordernotififaction.mp3')}}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <section class="content card pt-3  pb-3 m-2">
                        <div class="container-fluid counter_section">
                            <div class="row justify-content-center">
                                <!-- small box -->
                                <!-- ./col -->
                            </div>
                            <h3 class="m-0 mb-3 text-info "></h3>
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <!-- ./col -->
                                <div class="col-6 col-lg-3">
                                    <!-- small box -->
                                    <div class="small-box bg-orange">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="#">
                                                {{ \App\Models\Order::count() }}
                                            </h3>
                                            <p>الطلبات</p>
                                        </div>
                                        <div class="icon">
                                            <i
                                                class="ion ion-stats-bars">{{ \App\Models\Order::count() }}</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <!-- ./col -->
                                <div class="col-6 col-lg-3">
                                    <!-- small box -->
                                    <div class="small-box bg-blue">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="#">
                                                {{\App\Models\Order::WhereHas('order_totals',function($x){
                                                    $x->where('finished',0)
                                                    ->where('received',0)
                                                    ->where('prepared',0);
                                                })
                                                ->sum('price')}} جـ
                                            </h3>
                                            <p>حجم المبيعات جـ</p>
                                        </div>
                                        <div class="icon">
                                            <i
                                                class="ion ion-stats-bars">{{\App\Models\Order::WhereHas('order_totals',function($x){
                                                    $x->where('finished',0)
                                                    ->where('received',0)
                                                    ->where('prepared',0);
                                                })
                                                ->sum('price')}}</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <!-- ./col -->
                                <div class="col-6 col-lg-3">
                                    <!-- small box -->
                                    <div class="small-box bg-cyan">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="#">
                                                
                                            </h3>
                                            <p>المصروفات</p>
                                        </div>
                                        <div class="icon">
                                            <i
                                                class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <!-- ./col -->
                                <div class="col-6 col-lg-3">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="#">
                                                
                                            </h3>
                                            <p>الزيارات</p>
                                        </div>
                                        <div class="icon">
                                            <i
                                                class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        </div>
                    </section>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
