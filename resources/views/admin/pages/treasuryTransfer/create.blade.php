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
                            <h3 class="card-title header-title">التحويل من خزينة لاخرى</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.error')
                        <form class="form-horizontal" action="{{ route('treasuryTransfer.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="date" placeholder="التاريخ"
                                            required name="date" readonly>
                                        <label for="date" class="col-form-label n_ro3ya">التاريخ</label>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <select required="required" class="form-control" name="treasuryFrom_id" id="treasuryFrom_id">
                                            <option value="">التحويل من</option>
                                            @foreach ($treasuriesFrom as $key => $treasuryFrom)
                                                <option value="{{ $treasuryFrom->id }}">{{ $treasuryFrom->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="treasuryFrom_id" class="col-form-label n_ro3ya">التحويل من</label>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <select required="required" class="form-control" name="treasuryTo_id" id="treasuryTo_id">
                                            <option value="">التحويل الى</option>
                                            @foreach ($treasuriesTo as $key => $treasuryTo)
                                                <option value="{{ $treasuryTo->id }}">{{ $treasuryTo->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="treasuryTo_id" class="col-form-label n_ro3ya">التحويل الى</label>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form-floating">
                                        <input type="number" class="form-control" step="0.1" id="amount"
                                            placeholder="قيمة الخزينة" name="amount">
                                        <label for="amount" class="col-form-label n_ro3ya">المبلغ</label>
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
            {{-- end card --}}
            {{-- start card table --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float:right; font-weight:bold;"> التحويل من خزينة لاخرى </h3>
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
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        التاريخ </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        التحويل من </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        التحويل الى </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        المبلغ </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($treasuriesTransfer as $treasuryTransfer)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $treasuryTransfer->date }}</td>
                                                    <td>{{ $treasuryTransfer->treasuriesFrom->name }}</td>
                                                    <td>{{ $treasuryTransfer->treasuriesTo->name }}</td>
                                                    <td>{{ $treasuryTransfer->amount }}</td>
                                                    <td>
                                                        <a href="{{ route('treasuryTransfer.edit', $treasuryTransfer->id) }}"
                                                            type="submit" class="btn bg-secondary"><i
                                                                class="far fa-edit" aria-hidden="true"></i></a>
                                                        <a href="{{ route('treasuryTransfer.destroy', $treasuryTransfer->id) }}"
                                                            type="submit" onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
