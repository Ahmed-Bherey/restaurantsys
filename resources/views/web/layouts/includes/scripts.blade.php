<script src="{{ asset('public/web/js/all.min.js') }}"></script>
<script src="{{ asset('public/web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/web/js/jQuery.js') }}"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('80d42233109a38cdaf6a', {
        cluster: 'mt1'
    });
</script>
<script src="{{ asset('public/web/js/ordernotify.js') }}"></script>
<script src="{{ asset('public/web/js/custom.js') }}"></script>
