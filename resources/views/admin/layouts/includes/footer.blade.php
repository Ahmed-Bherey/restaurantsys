<footer class="main-footer non-distable text-center">
    <strong>جميع الحقوق محفوظة لدي <a href="#">Ahmed Abdelwahab</a> &copy; 2021-2022</strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</footer>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('admin/js/app.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/admin/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{ asset('public/admin/assets/plugins/all.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@include('admin.layouts.includes.datatable.js')
<!-- overlayScrollbars -->
<script src="{{ asset('public/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin/assets/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/admin/assets/dist/js/demo.js') }}"></script>
<script src="{{ asset('public/admin/assets/dist/js/custom.js') }}"></script>