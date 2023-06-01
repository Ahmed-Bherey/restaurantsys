@extends('admin.layouts.includes.master')
@section('title') اضافة خزينة @endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title">الخزائن</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.error')
                        <form class="form-horizontal" action="{{ route('treasury.update',$treasury->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <input type="date" class="form-control" value="{{$treasury->date}}" id="date" placeholder="التاريخ"
                                            required name="date" readonly>
                                        <label for="date" class="col-form-label n_ro3ya">التاريخ</label>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <input type="text" class="form-control" value="{{$treasury->name}}" id="name" placeholder="اسم الخزينة"
                                            required name="name">
                                        <label for="name" class="col-form-label n_ro3ya">اسم الخزينة</label>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <input type="text" class="form-control" value="{{$treasury->treasury_secretary}}" id="treasury_secretary" placeholder="امين الخزينة"
                                            required name="treasury_secretary">
                                        <label for="treasury_secretary" class="col-form-label n_ro3ya">امين الخزينة</label>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <input type="number" class="form-control" value="{{$treasury->balance}}" step="0.1" id="balance"
                                            placeholder="قيمة الخزينة" name="balance" readonly>
                                        <label for="balance" class="col-form-label n_ro3ya">قيمة الخزينة</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button type="reset" class="btn bg-secondary">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
