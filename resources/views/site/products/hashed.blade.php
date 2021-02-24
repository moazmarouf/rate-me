{{--                            <div class="modal fade  custom-imodal" id="edit-sub-{{$product->id}}" tabindex="-1" role="dialog"--}}
{{--                                 aria-labelledby="exampleModalLabel"--}}
{{--                                 aria-hidden="true">--}}
{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title" id="exampleModalLabel">تعديل المنتج</h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body custom-addpro">--}}
{{--                                            <div class="addProduct">--}}
{{--                                                <div class="contact-page">--}}
{{--                                                    <form id="editForm" enctype="multipart/form-data">--}}
{{--                                                        @csrf--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="">صورة الوجبه</label>--}}
{{--                                                            <div class="img-block">--}}
{{--                                                                <div class="upload-img">--}}
{{--                                                                    <i class="fas fa-camera text-white brown"></i>--}}
{{--                                                                    <input type="file" name="image">--}}
{{--                                                                </div>--}}
{{--                                                                <div class="image-company">--}}
{{--                                                                    <img src="{{asset('Site/img/user-img.png')}}" alt="">--}}
{{--                                                                </div>--}}
{{--                                                                <div class="gallery">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6 col-12">--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <label> أسم الوجبه </label>--}}
{{--                                                                    <div class="select-div">--}}
{{--                                                                        <input value="{{$product->name}}" name="name" type="text" class="form-control" >--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6 col-12">--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <label> اختر التصنيف </label>--}}
{{--                                                                    <div class="select-div">--}}
{{--                                                                        <select name="category_id" class="form-control">--}}
{{--                                                                            @foreach($categories as $category)--}}
{{--                                                                                <option--}}
{{--                                                                                    value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                                                                            @endforeach--}}
{{--                                                                        </select>--}}
{{--                                                                        <i class="fas fa-angle-down"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6 col-12">--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <label> السعر</label>--}}
{{--                                                                    <div class="select-div">--}}
{{--                                                                        <input value="{{$product->price}}" name="price" type="number" class="form-control">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6 col-12">--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <label> الخصم </label>--}}
{{--                                                                    <div class="select-div">--}}
{{--                                                                        <input value="{{$product->offer}}" name="offer" type="number" class="form-control">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label> الحد الادني</label>--}}
{{--                                                            <div class="select-div">--}}
{{--                                                                <input value="{{$product->minimum}}" name="minimum" type="number" class="form-control">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label> تفاصيل الوجبة</label>--}}
{{--                                                            <div class="select-div">--}}
{{--                                            <textarea name="meal_details" cols="30" rows="4"--}}
{{--                                                      class="form-control">{{$product->meal_details}}</textarea>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="addation">--}}
{{--                                                            <h3>اضافات</h3>--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-md-6 col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input name="addition_name[]" type="text" class="form-control"--}}
{{--                                                                               placeholder="اسم الاضافة">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-6 col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input name="addition_price[]" type="number" class="form-control"--}}
{{--                                                                               placeholder="سعر الاضافة">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-md-6 col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input name="addition_name[]" type="text" class="form-control"--}}
{{--                                                                               placeholder="اسم الاضافة">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-6 col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input name="addition_price[]" type="number" class="form-control"--}}
{{--                                                                               placeholder="سعر الاضافة">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-md-6 col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input name="addition_name[]" type="text" class="form-control"--}}
{{--                                                                               placeholder="اسم الاضافة">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-6 col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input name="addition_price[]" type="number" class="form-control"--}}
{{--                                                                               placeholder="سعر الاضافة">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="submit-btn">--}}
{{--                                                            <button class="editProductBtn brown" type="submit" >تعديل</button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="modal fade  custom-imodal" id="delete-sub-{{$product->id}}" tabindex="-1" role="dialog"--}}
{{--                                 aria-labelledby="exampleModalLabel"--}}
{{--                                 aria-hidden="true">--}}
{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من الحذف ؟</h5>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <form action="{{route('product.delete')}}" method="post">--}}

{{--                                                    <!-- token and user id -->--}}
{{--                                                    {{csrf_field()}}--}}
{{--                                                    <input required="" type="hidden" name="id" value="{{$product->id}}">--}}
{{--                                                    <!-- /token and user id -->--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-sm-12" style="margin-top: 10px">--}}
{{--                                                            <button type="submit" class="btn btn-primary" >تأكيد</button>--}}
{{--                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
