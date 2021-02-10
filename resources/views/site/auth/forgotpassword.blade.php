@extends('layouts.site-auth')
@section('title')
    Forgot Password
@stop
@section('content')
    @include('partials.validation')
    <div class="wrapper">
        <div class="content">
            <div class="container">
                <form class="form" id="forgotForm">
                    @csrf
                    <div class="form-title">
                        <h2>إستعادة كلمة المرور</h2>
                        <p>هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس
                            المساحة المساحة </p>
                    </div>
                    <div class="form-group">
                        <label for="">رقم الجوال</label>
                        <input name="phone" class="form-control" type="tel" placeholder="الرجاء إدخال رقم الجوال" />
                    </div>
                    <button class="site-btn brown forgotBtn" type="submit">إرسال</button>
                </form>
            </div>
            <img class="building" src="Site/img/Group 3639.png" alt="">
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(".forgotBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#forgotForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('post.password.forgot')}}",
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
                            animation: true,
                        })
                    }
                }
            });
        });
    </script>
@stop
