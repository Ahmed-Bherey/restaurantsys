@extends('admin.layouts.includes.master')
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
                                <h3 class="card-title header-title">تعديل بيانات منطقة {{ $delivery->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('delivery.update', $delivery->id) }}"
                                method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $delivery->name }}"
                                                id="name" name="name" required>
                                            <label for="name" class="col-form-label">اسم المنطقة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="number" step="0.5" class="form-control"
                                                value="{{ $delivery->cost }}" id="cost" name="cost" required>
                                            <label for="cost" class="col-form-label">سعر التوصيل</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="tel" class="form-control" value="{{ $delivery->tel }}"
                                                id="tel" name="tel">
                                            <label for="tel" class="col-form-label">رقم الهاتف</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn bg-secondary" type="reset">
                                        <i class="fas fa-undo"></i>
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end card --}}
                {{-- start card table --}}
            </div>
        </div>
    </div>
@endsection
