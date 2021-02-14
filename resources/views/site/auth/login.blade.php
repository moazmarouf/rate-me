@extends('layouts.site-auth')
@section('title')
    Login
@stop
@section('content')
    @include('partials.validation')

    <div class="wrapper">
        <div class="content">
            <div class="container">
                <form class="form" id="loginForm">
                    @csrf
                    <div class="form-group">
                        <label for="">رقم الجوال</label>
                        <input name="phone" class="form-control" type="number" placeholder="الرجاء إدخال رقم الجوال"/>
                    </div>
                    <div class="form-group">
                        <label for="">كلمة المرور</label>
                        <input name="password" class="form-control" type="password"
                               placeholder="الرجاء إدخال كلمة المرور"/>
                    </div>
                    <a class="forget" href="{{route('password.forgot')}}">هل نسيت كلة المرور ؟</a>
                    <button class="loginBtn site-btn brown" type="submit">تسجيل الدخول</button>
                    <a class="d-block text-center sign-link" href="{{route('register')}}">أنشاء حساب</a>
                </form>
            </div>
            <img class="building" src="{{asset('Site/img/Group 3639.png')}}" alt="">
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(".loginBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#loginForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('site.post.login')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.loginBtn').removeAttr("disabled").css({
                        opacity: '1'
                    }).text(oldText);
                    if (data.key == 'success') {
                        location.assign(data.msg);
                    } else {
                        Swal.fire({
                            title: data.msg,
                            position: 'top',
                            timer: 3000,
                            type: 'error',
                            showCloseButton: false,
                            showConfirmButton: false,
                            animation: true
                        })
                    }
                }
            });
        });
    </script>
@stop
