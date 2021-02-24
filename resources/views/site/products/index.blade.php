@extends('layouts.site-master')
@section('title')
    Products
@stop

@section('content')
    <div class="content">
        <div class="d-table">
            <div class="container">
                <div class="table-option">
                    <div class="detele-option">
                        <input class="delete-all" type="checkbox" name="" id="">
                        <label>
                            تحديد الكل
                        </label>
                        <button class="btn-all">حذف</button>
                    </div>
                    <div class="add-service">
                        <button type="button" data-toggle="modal" data-target="#add-sub">
                            <i class="fas fa-plus-square"></i>
                        </button>

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>رقم</th>
                            <th>الصورة</th>
                            <th>الصورة 2</th>
                            <th>أسم المنتج</th>
                            <th>التصنيف</th>
                            <th>السعر</th>
                            <th>السعر قبل الخصم</th>
                            <th>تعديل</th>
                            <th>خذف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img style="width:100px;height:100px"
                                         src="{{URL::to('assets/uploads/stores/'.$product->image)}}"></td>

                                <td><img style="width:100px;height:100px"
                                         src="{{$product->image2 ? URL::to('assets/uploads/stores/'.$product->image2 ):URL::to('assets/uploads/stores/default.png') }}"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->offer}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#productEditModal"
                                       class="openEditmodal"
                                       data-id="{{$product->id}}"
                                       data-image="{{$product->image}}"
                                       data-name="{{$product->name}}"
                                       data-category_id="{{$product->category->id}}"
                                       data-price="{{$product->price}}"
                                       data-offer="{{$product->offer}}"
                                       data-meal_details="{{$product->meal_details}}"
                                       data-minimum="{{$product->minimum}}"
                                    >تعديل</a>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#productDeleteModal"
                                       type="button" class="openDeleteModal"
                                       data-id="{{$product->id}}"
                                       data-name="{{$product->name}}"
                                    >حذف</a>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#add-sup">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade  custom-imodal" id="add-sub" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة منتج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-addpro">
                        <div class="addProduct">
                            <div class="contact-page">
                                <form id="addForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="">
                                    <div class="form-group">
                                        <label for="">صورة الوجبه</label>

                                        <div class="d-flex justify-content-around align-items-center">
                                            <div class="img-block">
                                                <div class="upload-img">
                                                    <i class="fas fa-camera text-white brown"></i>
                                                    <input type="file" name="image">
                                                </div>
                                                <div class="image-company">
                                                    <img src="{{asset('Site/img/user-img.png')}}" alt="">
                                                </div>
                                                <div class="gallery">
                                                </div>
                                            </div>
                                            <div class="img-block">
                                                <div class="upload-img">
                                                    <i class="fas fa-camera text-white brown"></i>
                                                    <input type="file" name="image2">
                                                </div>
                                                <div class="image-company">
                                                    <img src="{{asset('Site/img/user-img.png')}}" alt="">
                                                </div>
                                                <div class="gallery">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">صورة الوجبه</label>--}}
{{--                                        <div class="img-block">--}}
{{--                                            <div class="upload-img">--}}
{{--                                                <i class="fas fa-camera text-white brown"></i>--}}
{{--                                                <input type="file" name="image2">--}}
{{--                                            </div>--}}
{{--                                            <div class="image-company">--}}
{{--                                                <img src="{{asset('Site/img/user-img.png')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="gallery">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> أسم الوجبه </label>
                                                <div class="select-div">
                                                    <input name="name" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> اختر التصنيف </label>
                                                <div class="select-div">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> السعر</label>
                                                <div class="select-div">
                                                    <input name="price" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> الخصم </label>
                                                <div class="select-div">
                                                    <input name="offer" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> الحد الادني</label>
                                        <div class="select-div">
                                            <input name="minimum" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>الوصف</label>
                                        <div class="select-div">
                                            <textarea name="meal_details" cols="30" rows="4"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="addation">
                                        <h3>اضافات</h3>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_name[]" type="text" class="form-control"
                                                           placeholder="اسم الاضافة">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_price[]" type="number" class="form-control"
                                                           placeholder="سعر الاضافة">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_name[]" type="text" class="form-control"
                                                           placeholder="اسم الاضافة">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_price[]" type="number" class="form-control"
                                                           placeholder="سعر الاضافة">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_name[]" type="text" class="form-control"
                                                           placeholder="اسم الاضافة">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_price[]" type="number" class="form-control"
                                                           placeholder="سعر الاضافة">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit-btn">
                                        <button class="addProductBtn" type="submit" class="brown">اضافى</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade  custom-imodal" id="productEditModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل المنتج </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-addpro">
                        <div class="addProduct">
                            <div class="contact-page">
                                <form id="editProductForm" enctype="multipart/form-data">
                                    @csrf
                                    <input required="" type="hidden" name="id" value="">
                                    <div class="form-group">
                                        <label for="">صورة الوجبه</label>
                                        <div class="img-block">
                                            <div class="upload-img">
                                                <i class="fas fa-camera text-white brown"></i>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="image-company">
                                                <img src="{{asset('Site/img/user-img.png')}}" alt="">
                                            </div>
                                            <div class="gallery">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> أسم الوجبه </label>
                                                <div class="select-div">
                                                    <input name="name" required="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> اختر التصنيف </label>
                                                <div class="select-div">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> السعر</label>
                                                <div class="select-div">
                                                    <input name="price" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label> الخصم </label>
                                                <div class="select-div">
                                                    <input name="offer" type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> الحد الادني</label>
                                        <div class="select-div">
                                            <input name="minimum" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> تفاصيل الوجبة</label>
                                        <div class="select-div">
                                            <textarea name="meal_details" cols="30" rows="4"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="addation">
                                        <h3>اضافات</h3>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_name[]" type="text" class="form-control"
                                                           placeholder="اسم الاضافة">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_price[]" type="number" class="form-control"
                                                           placeholder="سعر الاضافة">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_name[]" type="text" class="form-control"
                                                           placeholder="اسم الاضافة">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_price[]" type="number" class="form-control"
                                                           placeholder="سعر الاضافة">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_name[]" type="text" class="form-control"
                                                           placeholder="اسم الاضافة">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="addition_price[]" type="number" class="form-control"
                                                           placeholder="سعر الاضافة">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="submit-btn">
                                        <button class="editProductBtn" type="submit" class="brown">تعديل</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade  custom-imodal" id="productDeleteModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من حدف هذا المنتج ؟</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-addpro">
                        <div class="addProduct">
                            <div class="contact-page">
                                <form id="deleteProductForm" enctype="multipart/form-data">
                                    @csrf
                                    <input required="" type="hidden" name="id" value="">
                                    <div class="submit-btn">
                                        <button class="deleteProductBtn brown" type="submit">حذف</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(".addProductBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#addForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $.ajax({
                url: "{{route('product.create')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    console.log(data);
                    $('.editProductBtn').removeAttr("disabled").css({
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

    <!--edit product  script-->
    <script type="text/javascript">
        $(document).on('click', '.openEditmodal', function () {
            //get valus
            var id = $(this).data('id');
            var name = $(this).data('name');
            var category_id = $(this).data('category_id');
            var price = $(this).data('price');
            var offer = $(this).data('offer');
            var meal_details = $(this).data('meal_details');
            var minimum = $(this).data('minimum');

            //set values in modal inputs
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("select[name='category_id']").val(category_id);

            $("input[name='price']").val(price);
            $("input[name='offer']").val(offer);
            $("input[name='meal_details']").val(meal_details);
            $("input[name='minimum']").val(minimum);
        })
        $(".editProductBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#editProductForm').get(0);
            var formData = new FormData(form);

            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');

            $.ajax({
                url: "{{route('product.update')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.editProductBtn').removeAttr("disabled").css({
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

    <!-- end edit product  script-->

    <!--delete Product script-->
    <script>
        $(document).on('click','.openDeleteModal',function(){
            var id = $(this).data('id');
            $("input[name='id']").val(id);
        });
        $(".deleteProductBtn").on('click', function (e) {
            e.preventDefault();
            var form = $('#deleteProductForm').get(0);
            var formData = new FormData(form);

            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity: '0.5'
            }).text('جار التحميل ...');

            $.ajax({
                url: "{{route('product.delete')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.editProductBtn').removeAttr("disabled").css({
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
    <!-- end delete Product script-->

@stop

