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
                                <h3 class="card-title header-title">تعديل بيانات {{ $team->job }} {{ $team->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('team.update', $team->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-9 row">
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="file" class="form-control" id="img" name="img">
                                                <label for="img" class="col-form-label">الصورة الشخصية</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="text" class="form-control" value="{{ $team->name }}"
                                                    id="name" name="name" required>
                                                <label for="name" class="col-form-label">الاسم</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="text" class="form-control" value="{{ $team->job }}"
                                                    id="job" name="job" required>
                                                <label for="job" class="col-form-label">الوظيفة</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="email" class="form-control" value="{{ $team->email }}"
                                                    id="email" name="email" required>
                                                <label for="email" class="col-form-label">البريد الالكترونى</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="tel" class="form-control" value="{{ $team->tel }}"
                                                    id="tel" name="tel" required>
                                                <label for="tel" class="col-form-label">تليفون</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            @isset($team->img)
                                                <img src="{{ asset('/public/' . Storage::url($team->img)) }}"
                                                    alt="{{ $team->img }}" style="max-width: 100%;">
                                            @else
                                                <img src="{{ asset('public/admin/assets/dist/img/default_team_img.jpg') }}"
                                                    alt="{{ $team->img }}" style="max-width: 100%;">
                                            @endisset
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
