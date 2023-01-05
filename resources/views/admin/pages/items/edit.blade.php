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
                                <h3 class="card-title header-title">تعديل طبق</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('items.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-9 row">
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="date" class="form-control" value="{{ $item->date }}"
                                                    id="date" placeholder="التاريخ" name="date">
                                                <label for="date" class="col-form-label">التاريخ
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="category_id"
                                                    id="category_id">
                                                    <option value="">اختر التصنيف</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($item->category_id == $category->id) selected @endif>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="category_id" class="col-form-label">اختر التصنيف</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input required type="text" class="form-control"
                                                    value="{{ $item->name }}" id="name" placeholder="اسم الطبق"
                                                    name="name">
                                                <label for="name" class="col-form-label">اسم الطبق</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="number" step="0.5" class="form-control"
                                                    value="{{ $item->price }}" id="price" placeholder="السعر"
                                                    name="price">
                                                <label for="price" class="col-form-label">السعر
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <textarea class="form-control" rows="1" placeholder="الوصف ..." name="desc" id="desc">{{ $item->desc }}</textarea>
                                                <label for="desc" class="col-form-label">الوصف
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="file" class="form-control" id="img"
                                                    placeholder="اضف الصورة" name="img">
                                                <label for="img" class="col-form-label">اضف الصورة
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-check form-switch mb-3">
                                                <input class="form-check-input ms-5" type="checkbox" role="switch"
                                                    value="1" id="flexSwitchCheckChecked" name="active"
                                                    @if ($item->active == 1) checked @endif>
                                                <label class="form-check-label mx-5" for="flexSwitchCheckChecked">
                                                    متاح</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <img src="{{ asset('/public/' . Storage::url($item->img)) }}"
                                                alt="{{ $item->img }}" style="max-width: 100%;">
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
