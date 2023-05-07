<footer class="main-footer non-distable text-center">
    <strong>جميع الحقوق محفوظة لدي <a href="#">Ahmed Abdelwahab</a> &copy; 2021-2022</strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</footer>

<a href="{{ route('order.show_detailes', App\Models\OrderTotal::latest()->first()->id+1) }}" class="order_notifaction position-fixed" id="orderNotifaction">
    <div class="order_notifaction_info">
        @if(auth()->guard('client')->check())
        <p>طلب جديد من العميل <span>{{auth()->guard('client')->user()->username}}</span></p>
        @endif
    </div>
</a>




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

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('44a46a8e295dcf13ea53', {
        cluster: 'mt1'
    });

    var channel = pusher.subscribe('resturant-channel');
    var x = document.getElementById("audiotestt");
    var orderNotifaction = document.getElementById('orderNotifaction');
    
    channel.bind('resturant-notifaction', function(data) {
        x.play();
        orderNotifaction.classList.add('show');
    });
</script>
