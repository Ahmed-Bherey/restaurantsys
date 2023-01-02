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
                                <h3 class="card-title header-title">تعديل التصنيف</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('category.update', $category->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ date('d M Y - H:i:s', $category->created_at->timestamp) }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input required type="text" class="form-control"
                                                value="{{ $category->name }}" id="name" placeholder="اسم التصنيف"
                                                name="name">
                                            <label for="name" class="col-form-label">اسم التصنيف</label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="reset" class="btn bg-secondary" onclick="history.back()" type="submit">
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
