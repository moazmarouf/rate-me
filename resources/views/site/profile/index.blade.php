@extends('layouts.site-master')
@section('title')
    Products
@stop
@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>الملف الشخصي</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form id="editForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input name="image" type="file" multiple="" id="gallery-photo-add">
                                    </div>
                                    <div class="image-company">
                                        <img src="{{asset('Site/img/user-img.png')}}" alt="">
                                    </div>
                                    <div class="gallery">
                                        <div class="images">
                                            <img src="{{asset('Site/img/user-img.png')}}"><input type="hidden">
                                            <button class="close">
                                                <i class="fa fa-times-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> أسم المستخدم </label>
                                <div class="select-div">
                                    <input name="name" type="text" class="form-control" value="{{$user->name}} ">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>رقم الجوال</label>
                                <div class="phone-in">
                                    <div class="select-div">
                                        <input name="phone" type="number" class="form-control" value="{{$user->phone}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <div class="select-div">
                                    <input name="email" type="email" class="form-control" value="{{$user->email}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="submit-btn">
                                <button type="button" class="change-pass" data-toggle="modal"
                                        data-target="#changPass">تغير كلمة المرور
                                </button>
                            </div>
                            <div class="submit-btn">
                                <button type="submit" class="brown editProfile">حفظ التعديلات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                <div class="modal fade add-serv changPass add-form " id="changPass" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="confirmForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">كلمة المرور القديمة</label>
                                        <input name="old_password" class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور"/>
                                        <i class="left-icon fas fa-eye eye"></i>
                                    </div>
                                    <div class="form-group">
                                        <label for="">كلمة المرور الجديدة</label>
                                        <input name="password" class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور"/>
                                        <i class="left-icon fas fa-eye eye"></i>
                                    </div>
                                    <div class="form-group">
                                        <label for="">تأكيد كلمة المرور الجديدة</label>
                                        <input name="password_confirmation" class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور"/>
                                        <i class="left-icon fas fa-eye eye"></i>
                                    </div>
                                    <div class="submit-btn">
                                        <button class="btnConfirm brown" type="submit" data-dismiss="modal">حفظ التعديلات</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
@stop
@section('scripts')
    <script>
        $(".editProfile").on('click', function (e) {
            e.preventDefault();
            var form = $('#editForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('profile.update')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {


                    $('.editProfile').removeAttr("disabled").css({
                        opacity: '1'
                    }).text(oldText);
                    if (data.key == 'success') {
                        console.log(data);
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

        $(".btnConfirm").on('click', function (e) {
            e.preventDefault();
            var form = $('#confirmForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('profile.password')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    $('.btnConfirm').removeAttr("disabled").css({
                        opacity: '1'
                    }).text(oldText);
                    if (data.key == 'success') {
                        console.log(data);
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



