@extends('layouts.site-auth')
@section('title')
    Reset Password
@stop
@section('content')
    @include('partials.validation')
    <div class="wrapper">
        <div class="content">
            <div class="container">
                <form class="form" id="resetForm">
                    @csrf
                    <div class="form-title">
                        <h2>إستعادة كلمة المرور</h2>
                        <p>هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس
                            المساحة المساحة </p>
                    </div>
                    <div class="form-group">
                        <label for="">كود التحقق</label>
                        <input name="v_code" class="form-control" type="password" placeholder="الرجاء إدخال الكود المرسل إليك عبر الهاتف" />
                    </div>
                    <div class="form-group">
                        <label for="">كلمة المرور الجديدة</label>
                        <input name="password" class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور" />
                        <i class="left-icon fas fa-eye eye"></i>
                    </div>
                    <div class="form-group">
                        <label for="">تأكيد كلمة المرور الجديدة</label>
                        <input name="password_confirmation" class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور" />
                        <i class="left-icon fas fa-eye eye"></i>
                    </div>
                    <button class="site-btn brown resetBtn" type="submit">تأكيد</button>
                </form>
            </div>
            <img class="building" src="{{asset('Site/img/Group 3639.png')}}" alt="">
        </div>
    </div>

@stop
@section('scripts')
    <script>
        $(".resetBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#resetForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('password.reset.post')}}",
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
