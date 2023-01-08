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
                                <h3 class="card-title header-title">تعديل طاولة {{ $table->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('table.update', $table->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="area_id" id="area_id">
                                                <option value="">اختر المنطقة</option>
                                                @foreach ($areas as $key => $area)
                                                    <option value="{{ $area->id }}"
                                                        @if ($table->area_id == $area->id) selected @endif>
                                                        {{ $area->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="area_id" class="col-form-label">اختر التصنيف</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" value="{{ $table->name }}"
                                                id="name" name="name" required>
                                            <label for="name" class="col-form-label n_nameLevel">اسم الطاولة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $table->customer_num }}"
                                                id="customer_num" name="customer_num">
                                            <label for="customer_num" class="col-form-label n_nameLevel">عدد الأفراد</label>
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
            </div>
        </div>
    </div>
@endsection
