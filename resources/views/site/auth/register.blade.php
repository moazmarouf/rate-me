@extends('layouts.site-auth')
@section('title')
    Register
@stop
@section('content')
    @include('partials.validation')
    <div class="wrapper">
        <div class="content">
            <div class="container">
                <form class="form" id="registerForm">
                    @csrf
                    <div class="form-title">
                        <h2>إنشاء حساب </h2>
                        <p>هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس هذا النص هو مثال لنص يمكن ان يستبدل بنص أخر في نفس
                            المساحة المساحة </p>
                    </div>
                    <div class="form-group">
                        <label for="">أسم المستخدم</label>
                        <input name="name" class="form-control" type="text" placeholder="الرجاء إدخال أسم المستخدم" />
                    </div>
                    <div class="form-group">
                        <label for="">رقم الجوال</label>
                        <input name="phone" class="form-control" type="tel" placeholder="الرجاء إدخال رقم الجوال" />
                    </div>
                    <div class="form-group">
                        <label for="">البريد الالكترونى</label>
                        <input name="email" class="form-control" type="email" placeholder="الرجاء ادخال البريد الالكترونى" />
                    </div>
                    <div class="form-group">
                        <label for=""> السجل التجارى</label>
                        <input name="commercial-register" class="form-control" type="number" placeholder="الرجاء ادخال  السجل التجارى" />
                    </div>
                    <div class="form-group">
                        <label for="">كلمة المرور</label>
                        <input name="password" class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور" /><i
                            class="left-icon fas fa-eye eye"></i>
                    </div>
                    <div class="form-group">
                        <label for="">تأكيد كلمة المرور</label>
                        <input name="password_confirmation" class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور" /><i
                            class="left-icon fas fa-eye eye"></i>
                    </div>
                    <div class="form-group">
                        <div class="cust-check">
                            <p class="checkcontainer">
                <span for="confirm">
                  بالتسجيل انت توافق علي
                  <a href="" data-toggle="modal" data-target="#exampleModal"> الشروط والاحكام </a>
                </span>
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </p>
                        </div>
                    </div>
                    <button class="site-btn brown registerBtn" type="submit">إنشاء حساب</button>
                    <p>لديك حساب بالفعل ؟<a href="index.html">إضغط هنا</a></p>
                </form>
            </div>
            <img class="building" src="Site/img/Group 3639.png" alt="">
        </div>
    </div>

    <!-- modal condation -->
    <div class="modal fade  custom-imodal" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">الشروط والاحكام</h5>
                    <button type="button" class="close registerBtn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

@stop
@section('scripts')
    <script>
        $(".registerBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#registerForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('site.post.register')}}",
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
