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
                                <h3 class="card-title header-title">تعديل بيانات المصروف {{ $expense->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('expense.update', $expense->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="date" class="form-control" value="{{ $expense->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="expenseSection_id"
                                                id="expenseSection_id">
                                                <option value="">اختر القسم</option>
                                                @foreach ($expenseSections as $key => $expenseSection)
                                                    <option value="{{ $expenseSection->id }}"
                                                        @if ($expense->expenseSection_id == $expenseSection->id) selected @endif>
                                                        {{ $expenseSection->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="expenseSection_id" class="col-form-label">اختر القسم</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="supplier_id"
                                                id="supplier_id">
                                                <option value="">اختر المورد</option>
                                                @foreach ($suppliers as $key => $supplier)
                                                    <option value="{{ $supplier->id }}"
                                                        @if ($expense->supplier_id == $supplier->id) selected @endif>
                                                        {{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="supplier_id" class="col-form-label">اختر المورد</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" step="0.5" class="form-control"
                                                value="{{ $expense->amount }}" id="amount" name="amount"
                                                placeholder="EGP" required>
                                            <label for="amount" class="col-form-label n_nameLevel">المبلغ</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control " rows="1" id="notes" placeholder="المرجع" name="notes">{{ $expense->notes }}</textarea>
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
            </div>
        </div>
    </div>
@endsection
