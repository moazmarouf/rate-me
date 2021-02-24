@extends('layouts.site-master')
@section('style')
    <style>
        .container {
            margin-right: 200px;
        }
    </style>
@stop
@section('title')
    Store
@stop
@section('content')

    <div class="container">
        <div class="add-form">
            <div class="contact-page">
                <form id="confirmForm">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->Store->id}}">
                    <div class="form-group">
                        <div class="img-block">
                            <div class="upload-img">
                                <i class="fas fa-camera text-white brown"></i>
                                <input type="file" multiple="" id="gallery-photo-add" name="image">
                            </div>
                            <div class="image-company">
                                <img src="{{asset('Site/img/user-img.png')}}" alt="">
                            </div>
                            <div class="gallery">
                                <div class="images">
                                    <img src="{{asset('Site/img/user-img.png')}}"><input name="images" type="hidden">
                                    <button class="close">
                                        <i class="fa fa-times-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> أسم المتجر </label>
                        <div class="select-div">
                            <input type="text" name="store_name" class="form-control"
                                   value="{{$user->Store->store_name}}">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>موقع المتجر</label>
                        <div class="select-div">
                            <input type="text" name="store_location" class="form-control"
                                   value="{{$user->Store->store_location}}">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>الفعليات </label>
                        <div class="select-div">
                            <input type="text" name="events" class="form-control" value="{{$user->Store->events}}">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>التوصيل</label>
                        <div class="phone-in">
                            <div class="select-div">
                                <input name="conduction" type="text" class="form-control"
                                       value="{{$user->Store->conduction}}">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn">
                        <button type="button" class="changPass" data-toggle="modal"
                                data-target="#changPass">تغير كلمة المرور
                        </button>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" class="brown">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade add-serv changPass add-form " id="changPass" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="confirmFormStore">
                        @csrf
                        <input type="hidden" value="{{$user->Store->id}}" name="id">
                        <div class="form-group">
                            <label for="">كلمة المرور القديمة</label>
                            <input name="old_password" class="form-control" type="password"
                                   placeholder="االرجاء إدخال كلمة المرور القديمه"/>
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="form-group">
                            <label for="">كلمة المرور الجديدة</label>
                            <input name="password" class="form-control" type="password"
                                   placeholder="الرجاء إدخال كلمة المرور الحاليه"/>
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="form-group">
                            <label for="">تأكيد كلمة المرور الجديدة</label>
                            <input name="password_confirmation" class="form-control" type="password"
                                   placeholder="الرجاء تاكيد كلمه المرور "/>
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="submit-btn">
                            <button type="submit" class="brown btnConfirmPassword" data-dismiss="modal">حفظ التعديلات</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@stop
@section('scripts')
    <script>
        $(".btnConfirmPassword").on('click', function (e) {
            e.preventDefault();
            var form = $('#confirmFormStore').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('store_password')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    $('.btnConfirmPassword').removeAttr("disabled").css({
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
