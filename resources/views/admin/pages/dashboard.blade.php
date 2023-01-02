@extends('admin.layouts.includes.master')

@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <section class="content card pt-3  pb-3 m-2">
                        <div class="container-fluid counter_section">
                            <h3 class="m-0 mb-3 text-info">الاختصارات</h3>
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-blue">
                                        <div class="inner nums">
                                            <h3 class="num"
                                                data-goal="#">{{\App\Models\User::where('delete_at',0)->count()}}</h3>
                                            <p>المستخدمين</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag">{{\App\Models\User::where('delete_at',0)->count()}}</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-orange">
                                        <div class="inner nums">
                                            <h3 class="num"
                                                data-goal="#">--</h3>
                                            <p>--</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars">--</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-gray">
                                        <div class="inner nums">
                                            <h3 class="num"
                                                data-goal="#">--</h3>
                                            <p>- -</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add">---</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-success">
                                        <div class="inner nums">
                                            <h3 class="num"
                                                data-goal="">---</h3>
                                            <p>- --
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph">--</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-red">
                                        <div class="inner nums">
                                            <h3 class="num"
                                                data-goal="#">--</h3>
                                            <p>- --</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph">---</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-maroon">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="#">
                                                ---</h3>
                                            <p>- -- </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph">---</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        </div>
                        <div class="container-fluid counter_section">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner nums">
                                            <h3 class="num"
                                                data-goal="#">---</h3>
                                            <p>-- - - -</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag">---</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner nums">
                                            <h3 class="num"
                                                data-goal="#">---</h3>
                                            <p>- - - -</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars">---</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="#">--</h3>
                                            <p>--</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add">--</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="">---</h3>
                                            <p>---</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph">---</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="">---</h3>
                                            <p>---</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph">---</i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-info">
                                        <div class="inner nums">
                                            <h3 class="num" data-goal="">{{date('l')}}</h3>
                                            <p>{{date('Y-m-d')}}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">تاريخ اليوم <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                    </section>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div> --}}
    </div>
@endsection
