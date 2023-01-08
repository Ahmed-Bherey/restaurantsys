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
                                <h3 class="card-title header-title">اضافة مصروفات</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('expense.store') }}" method="POST">
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
                                            <select required="required" class="form-control" name="expenseSection_id"
                                                id="expenseSection_id">
                                                <option value="">اختر القسم</option>
                                                @foreach ($expenseSections as $key => $expenseSection)
                                                    <option value="{{ $expenseSection->id }}">{{ $expenseSection->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="expenseSection_id" class="col-form-label">اختر القسم</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="supplier_id"
                                                id="supplier_id">
                                                <option value="">اختر المورد</option>
                                                @foreach ($suppliers as $key => $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="supplier_id" class="col-form-label">اختر المورد</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" step="0.5" class="form-control" id="amount"
                                                name="amount" placeholder="EGP" required>
                                            <label for="amount" class="col-form-label n_nameLevel">المبلغ</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control " rows="1" id="notes" placeholder="المرجع" name="notes"></textarea>
                                            <label for="notes" class="col-form-label n_ro3ya">المرجع</label>
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
                                <h3 class="card-title fw-bold">المصروفات</h3>
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
                                                        <td>اسم القسم</td>
                                                        <td>اسم المورد</td>
                                                        <td>المبلغ</td>
                                                        <td>المرجع</td>
                                                        <th>عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($expenses as $key => $expense)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $expense->date }}</td>
                                                            <td>
                                                                @isset($expense->expense_sections->name)
                                                                    {{ $expense->expense_sections->name }}
                                                                @endisset
                                                            </td>
                                                            <td>
                                                                @isset($expense->suppliers->name)
                                                                    {{ $expense->suppliers->name }}
                                                                @endisset
                                                            </td>
                                                            <td>{{ $expense->amount }}</td>
                                                            <td>{{ $expense->notes }}</td>
                                                            <td>
                                                                <a href="{{ route('expense.edit', $expense->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('expense.destroy', $expense->id) }}"
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
