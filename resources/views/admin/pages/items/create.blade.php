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
                                <h3 class="card-title header-title">اضافة طبق</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('items.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="category_id"
                                                id="category_id">
                                                <option value="">اختر التصنيف</option>
                                                @foreach ($categories as $key => $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="category_id" class="col-form-label">اختر التصنيف</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input required type="text" class="form-control" id="name"
                                                placeholder="اسم الطبق" name="name">
                                            <label for="name" class="col-form-label">اسم الطبق</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="number" step="0.5" class="form-control" id="price"
                                                placeholder="السعر" name="price">
                                            <label for="price" class="col-form-label">السعر
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <textarea class="form-control" rows="1" placeholder="الوصف ..." name="desc" id="desc"></textarea>
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
                                                value="1" id="flexSwitchCheckChecked" name="active" checked>
                                            <label class="form-check-label mx-5" for="flexSwitchCheckChecked">
                                                متاح</label>
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;">الاطباق
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>التاريخ</td>
                                                        <td>اسم التصنيف</td>
                                                        <td>اسم المنتج</td>
                                                        <td>السعر</td>
                                                        <td>الوصف</td>
                                                        <td>الصورة</td>
                                                        <td>الحالة</td>
                                                        <td>عمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($items as $key => $item)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->date }}</td>
                                                            <td>{{ $item->categories->name }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->price }}</td>
                                                            <td>{{ $item->desc }}</td>
                                                            <td>
                                                                <img src="{{ asset('/public/' . Storage::url($item->img)) }}"
                                                                    alt="{{ $item->name }}" height="50vh">
                                                            </td>
                                                            <td>
                                                                @if ($item->active == 1)
                                                                    <p class="text-success">متاح</p>
                                                                @else
                                                                    <p class="text-danger">غير متاح</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="#" type="submit"
                                                                    class="btn bg-secondary"><i class="far fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                                <a href="#" type="submit"
                                                                    onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger"><i
                                                                        class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{-- end table --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
