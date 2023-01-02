<!DOCTYPE html>
<html lang="en">

<head>
    <title>BookGalary</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('public/admin/assets/dist/img/logo.png')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/admin/assets/dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/admin/assets/dist/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/dist/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/dist/css/login.css')}}">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.error')
                <form action="#" method="post" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        تسجيل الدخول للوحة التحكم
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100" data-placeholder="البريد الالكترونى"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="كلمة المرور"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
