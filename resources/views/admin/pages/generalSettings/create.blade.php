@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- Main content -->
                <div class="row">
                    <div class="col-6 col-lg-4 col-xl-3 mb-3 tab_box active_mangment">
                        <div class="tab_content">
                            <i class="fa-solid fa-briefcase"></i>
                            <span>ادارة النشاط</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-xl-3 mb-3 tab_box">
                        <div class="tab_content extras">
                            <i class="fa-solid fa-location-arrow"></i>
                            <span>الاضافات</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-xl-3 mb-3 tab_box colocks">
                        <div class="tab_content">
                            <i class="fa-regular fa-clock"></i>
                            <span>ساعات العمل</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-xl-3 mb-3 tab_box location">
                        <div class="tab_content">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>الموقع</span>
                        </div>
                    </div>
                </div>

                <div class="row active_mangment_content">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"><i class="fa-solid fa-briefcase"></i> ادارة النشاط</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal " action="{{ route('activeManagement.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row g-4 mb-3">
                                        <div class="col-md-9 row g-3">
                                            <div class="col-md-6 form-floating">
                                                <input type="text" class="form-control"
                                                    @isset($activeManagement->name) value="{{ $activeManagement->name }}" @endisset
                                                    id="name" placeholder="اسم النشاط" name="name">
                                                <label for="name" class="col-sm-4 col-form-label">اسم النشاط
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <textarea class="form-control" rows="3" id="desc" placeholder="وصف النشاط ..." name="desc">
@isset($activeManagement->desc)
{{ $activeManagement->desc }}
@endisset
</textarea>
                                                <label for="desc" class="col-form-label">وصف النشاط</label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text" class="form-control"
                                                    @isset($activeManagement->address) value="{{ $activeManagement->address }}" @endisset
                                                    id="address" placeholder="عنوان النشاط" name="address">
                                                <label for="address" class="col-sm-4 col-form-label">عنوان النشاط
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text" class="form-control"
                                                    @isset($activeManagement->tel) value="{{ $activeManagement->tel }}" @endisset
                                                    id="tel" placeholder="رقم الهاتف" name="tel">
                                                <label for="tel" class="col-sm-4 col-form-label">رقم الهاتف
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text" class="form-control"
                                                    @isset($activeManagement->whatsapp) value="{{ $activeManagement->whatsapp }}" @endisset
                                                    id="whatsapp" placeholder="رقم الواتساب" name="whatsapp">
                                                <label for="whatsapp" class="col-sm-4 col-form-label">رقم الواتساب
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="number" class="form-control" step="5"
                                                    @isset($activeManagement->minimum_order) value="{{ $activeManagement->minimum_order }}" @endisset
                                                    id="minimum_order" placeholder="الحد الأدنى للطلب" name="minimum_order">
                                                <label for="minimum_order" class="col-sm-4 col-form-label">الحد الأدنى للطلب
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="number" class="form-control" step="5"
                                                    @isset($activeManagement->prepar_order_time) value="{{ $activeManagement->prepar_order_time }}" @endisset
                                                    id="prepar_order_time" placeholder="متوسط وقت تحضير الطلب بالدقائق"
                                                    name="prepar_order_time">
                                                <label for="prepar_order_time" class="col-sm-4 col-form-label">متوسط وقت
                                                    تحضير الطلب
                                                    بالدقائق
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="number" class="form-control" step="5"
                                                    @isset($activeManagement->order_time) value="{{ $activeManagement->order_time }}" @endisset
                                                    id="order_time" placeholder="متوسط الوقت بين الاطلب والاخر"
                                                    name="order_time">
                                                <label for="order_time" class="col-sm-4 col-form-label">متوسط الوقت بين
                                                    الاطلب
                                                    والاخر
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="file" class="form-control" id="logo"
                                                    placeholder="لوجو النشاط" name="logo">
                                                <label for="logo" class="col-sm-4 col-form-label">لوجو النشاط
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="file" class="form-control" id="background"
                                                    placeholder="خلفية النشاط" name="background">
                                                <label for="background" class="col-sm-4 col-form-label">خلفية النشاط
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    استلام من المكان
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    value="1"
                                                    @isset($activeManagement->receipt_from_place) @if ($activeManagement->receipt_from_place == 1) checked @endif @endisset
                                                    name="receipt_from_place">
                                            </div>
                                            <div class="col-md-6 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    توصيل
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    value="1"
                                                    @isset($activeManagement->delivery) @if ($activeManagement->delivery == 1) checked @endif @endisset
                                                    name="delivery">
                                            </div>
                                            <div class="col-md-6 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    شحن مجانى
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    value="1"
                                                    @isset($activeManagement->free_delivery) @if ($activeManagement->free_delivery == 1) checked @endif @endisset
                                                    name="free_delivery">
                                            </div>
                                            <div class="col-md-6 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    تعطيل الطلبات
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    value="1"
                                                    @isset($activeManagement->disable_request) @if ($activeManagement->disable_request == 1) checked @endif @endisset
                                                    name="disable_request">
                                            </div>
                                            <div class="col-md-6 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    تعطيل الاتصال بالنادل
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    value="1"
                                                    @isset($activeManagement->disable_connection_to_waiter) @if ($activeManagement->disable_connection_to_waiter == 1) checked @endif @endisset
                                                    name="disable_connection_to_waiter">
                                            </div>
                                            <div class="col-md-6 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    تعطيل أوامر المتابعة
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    value="1"
                                                    @isset($activeManagement->disable_follow_order) @if ($activeManagement->disable_follow_order == 1) checked @endif @endisset
                                                    name="disable_follow_order">
                                            </div>
                                            <div class="col-md-6 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    تناول الطلب فى المكان
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    value="1"
                                                    @isset($activeManagement->eat_on_spot) @if ($activeManagement->eat_on_spot == 1) checked @endif @endisset
                                                    name="eat_on_spot">
                                            </div>
                                        </div>
                                        <div class="col-md-3 flex-column">
                                            <img src=" @isset($activeManagement->logo) {{ asset('/public/' . Storage::url($activeManagement->logo)) }} @endisset"
                                                class="mb-3" style="max-width: 100%;" id="imgshow"
                                                title="لوجو النشاط">
                                            <img src=" @isset($activeManagement->background) {{ asset('/public/' . Storage::url($activeManagement->background)) }} @endisset"
                                                class="mb-3" style="max-width: 100%;" id="imgshow"
                                                title="خلفية النشاط">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </div> <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row extras_content">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"><i class="fa-solid fa-location-arrow"></i> الاضافات
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('extra.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row">
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="number" class="form-control" step=".5"
                                                placeholder="الضريبة بالنسبة المئوية"
                                                @isset($extra->tax) value="{{ $extra->tax }}" @endisset
                                                name="tax" required>
                                            <label for="store" class="col-form-label">الضريبة بالنسبة المئوية</label>
                                        </div>
                                        <div class="col-sm-6 form-check form-switch mb-3">
                                            <input class="form-check-input ms-5" type="checkbox" role="switch"
                                                value="1"
                                                @isset($extra->hide_tax) @if ($extra->hide_tax == 1) checked @endif @endisset
                                                name="hide_tax" id="flexSwitchCheckChecked">
                                            <label class="form-check-label mx-5" for="flexSwitchCheckChecked">اخفاء
                                                الضريبة</label>
                                        </div>
                                    </div>
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


                <div class="row colocks_content">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"><i class="fa-regular fa-clock"></i> ساعات العمل
                                </h3>
                                <span class="add_new_time_btn btn btn-secondary float-left">اضافة فترة عمل الضافية</span>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('workHour.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="add_new_time switch">
                                        <div class="row">
                                            <div class="col-md-4 form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="اليوم"
                                                    name="name" required>
                                                <label for="store" class="col-form-label">اليوم</label>
                                            </div>
                                            <div class="col-md-4 form-floating mb-3">
                                                <input type="time" class="form-control" placeholder="من"
                                                    name="from" min="09:00">
                                                <label for="store" class="col-form-label">من</label>
                                            </div>
                                            <div class="col-md-4 form-floating mb-3">
                                                <input type="time" class="form-control" placeholder="من"
                                                    name="to" min="09:00">
                                                <label for="store" class="col-form-label">من</label>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn bg-success-2 mr-3">
                                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn bg-secondary" type="reset">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    @foreach ($WorkHours as $key => $WorkHour)
                                        <div class="row">
                                            <div class="col-md-4 form-check text-right">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    {{ $WorkHour->name }}
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                    checked>
                                            </div>
                                            <div class="col-md-4 form-floating mb-3">
                                                <input type="time" class="form-control" value="{{ $WorkHour->from }}"
                                                    placeholder="من" name="name">
                                                <label for="store" class="col-form-label">من</label>
                                            </div>
                                            <div class="col-md-4 form-floating mb-3">
                                                <input type="time" class="form-control" value="{{ $WorkHour->to }}"
                                                    placeholder="الى" name="name">
                                                <label for="store" class="col-form-label">الى</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row location_content">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"><i class="fa-solid fa-location-dot"></i> الموقع
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.60389525369!2d31.328505268401834!3d30.05961847053272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1672189965255!5m2!1sar!2seg"
                                            width="600" height="450" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="400"
                                            height="300" frameborder="0" style="border:0;" allowfullscreen=""
                                            aria-hidden="false" tabindex="0">
                                        </iframe>
                                    </div>
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
