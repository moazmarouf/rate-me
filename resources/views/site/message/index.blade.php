@extends('layouts.site-master')
@section('title')
    Store
@stop
@section('content')
    <div class="content">
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <img class="logo" src="{{asset('Site/img/logo.png')}}" alt="">
                        <form id="messageForm">
                            @csrf
                            <div class="form-group">
                                <label>الرسالى </label>
                                <div class="select-div">
                                    <textarea name="content" class="form-control" id="" cols="30" rows="4" placeholder="الرسالة"></textarea>
                                </div>
                            </div>
                            <div class="submit-btn">
                                <button type="submit" class="brown messageBtn">ارسال </button>
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
        $(".messageBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#messageForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');
            $.ajax({
                url: "{{route('message.post')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    $('.messageBtn').removeAttr("disabled").css({
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


