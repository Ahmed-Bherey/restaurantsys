@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- /.row -->
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title">المستخدمين</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.error')
                        <form class="form-horizontal" action="{{ route('user.update' , $users->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row ">
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$users->name_ar}}"
                                            placeholder="الاسم" name="name_ar">
                                        <label for="store" class="col-form-label">الاسم بالعربية</label>
                                    </div>
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$users->name_en}}"
                                            placeholder="الاسم" name="name_en">
                                        <label for="store" class="col-form-label">الاسم بالانجليزية</label>
                                    </div>
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="email" class="form-control" value="{{$users->email}}"
                                            placeholder="الايميل" name="email">
                                        <label for="store" class="col-form-label">الايميل</label>
                                    </div>
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="password" class="form-control" placeholder="كلمة السر"
                                            name="password">
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="password" class="form-control" value="{{$users->password}}"
                                                placeholder="كلمة السر" name="oldPassword" hidden>
                                            <label for="store" class="col-form-label">كلمة السر</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{$users->address}}"
                                                placeholder="العنوان" name="address">
                                            <label for="store" class="col-form-label"> العنوان</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{$users->tel}}"
                                                placeholder="تليفون" name="tel" pattern="[0-9]{11}"
                                                title="لابد من كتابة رقم الهاتف المكون من 11 رقم">
                                            <label for="store" class="col-form-label">تليفون</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="number" class="form-control" value="{{$users->whatsapp}}"
                                                placeholder="واتساب" name="whatsapp" pattern="[0-9]{11}"
                                                title="لابد من كتابة رقم الهاتف المكون من 11 رقم">
                                            <label for="store" class="col-form-label">واتساب</label>
                                        </div>
                                        <div class="form-check col-sm-4">
                                            <input class="form-check-input" type="checkbox" value="1" name="active"
                                                @if($users->active == 1) checked @endif id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                تفعيل
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn bg-secondary"   title="back">
                                        <i class="fa fa-arrow-left"></i> <a href="{{route('treasury.create')}}"></a>
                                    </button>
                                </div>
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
