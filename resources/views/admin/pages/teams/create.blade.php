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
                                <h3 class="card-title header-title">ادارة فريق العمل</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('team.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="file" class="form-control" id="img" name="img">
                                            <label for="img" class="col-form-label">الصورة الشخصية</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                required>
                                            <label for="name" class="col-form-label">الاسم</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" id="job" name="job"
                                                required>
                                            <label for="job" class="col-form-label">الوظيفة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                            <label for="email" class="col-form-label">البريد الالكترونى</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="tel" class="form-control" id="tel" name="tel"
                                                required>
                                            <label for="tel" class="col-form-label">تليفون</label>
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">الطاولات</h3>
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
                                                        <td>الاسم</td>
                                                        <td>الوظيفة</td>
                                                        <td>البريد الالكترونى</td>
                                                        <td>التليفون</td>
                                                        <td>الصورة الشخصية</td>
                                                        <th>عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($teams as $key => $team)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $team->name }}</td>
                                                            <td>{{ $team->job }}</td>
                                                            <td>{{ $team->email }}</td>
                                                            <td>{{ $team->tel }}</td>
                                                            <td>
                                                                @isset($team->img)
                                                                    <img src="{{ asset('/public/' . Storage::url($team->img)) }}"
                                                                        alt="{{ $team->name }}" height="50vh">
                                                                @else
                                                                    <img src="{{ asset('public/admin/assets/dist/img/default_team_img.jpg') }}"
                                                                        alt="{{ $team->name }}" height="50vh">
                                                                @endisset
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('team.edit', $team->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('team.destroy', $team->id) }}"
                                                                    type="submit" onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger"><i
                                                                        class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.content-header -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
