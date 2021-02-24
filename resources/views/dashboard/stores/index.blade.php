@extends('layouts.master')
@section('title')
    الرئيسيه
@endsection
@section('content')
    <div class="row" style="margin-bottom:20px;">
        <div class="col-xs-6">
            <button class="btn bg-blue btn-block btn-float btn-float-lg" type="button" data-toggle="modal"
                    data-target="#exampleModal"><i class="icon-plus3"></i> <span>اضافه</span></button>
        </div>
        <div class="col-xs-6">
            <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i
                    class="icon-list-numbered"></i> <span>المنتجات : {{App\Models\Store::count()}} </span></button>
        </div>
    </div>
    <table id="dtable" class="text-center table table-bordered table-lg">
        <thead>
        <tr style="background:#EEE">
            <td>#</td>
            <td>اسم المتجر</td>
            <td>صوره المتجر</td>
            <td>موقع المتجر</td>
            <td>الفعاليات</td>
            <td>التوصيل</td>
            <td>الاعدادت</td>

        </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($stores as $store)
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->store_name}}</td>
                <td><img style="width:100px;height:100px" src="{{URL::to('assets/uploads/stores/'.$store->image)}}">
                </td>
                <td>{{$store->store_location}}</td>
                <td>{{$store->events}}</td>
                <td>{{$store->conduction}}
                    <sapn> رس</sapn>
                </td>
                <td>
                    <ul class="icons-list">
                        <li class="text-success-600">
                            <a href="#" data-toggle="modal" data-target="#exampleModal2" class="openEditmodal"
                               data-id="{{$store->id}}"
                               data-id="{{$store->image}}"
                               data-name="{{$store->store_name}}"
                               data-user_id="{{$store->User->id}}"
                               data-location="{{$store->store_location}}"
                               data-events="{{$store->events}}"
                               data-conduction="{{$store->conduction}}"
                            >
                                <i class="fa fa-2x fa-edit"></i>
                            </a>
                        </li>
                        <li class="text-danger-600">
                            <a href="#" data-toggle="modal" data-target="#exampleModal3" class="openDeletemodal"
                               data-id="{{$store->id}}"
                               data-name="{{$store->store_name}}"
                            >
                                <i class="fa fa-2x fa-minus-square-o"></i>
                            </a>

                        </li>
                    </ul>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Add model  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> اضافه جديد : <span class="userName"></span></h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('store.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>اسم المتجر </label>
                                <input placeholder="اسم المتجر" type="text" name="store_name" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>الصوره </label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>صاحب المتجر</label>
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>موقع المتجر </label>
                                <input placeholder="موقع المتجر" type="text" name="store_location" class="form-control">
                            </div>

                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>الفاعليات</label>
                                <input placeholder="الفاعليات" type="text" name="events" class="form-control">
                            </div>

                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>التوصيل</label>
                                <input placeholder="سعر التوصيل" type="text" name="conduction" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>الرقم السري </label>
                                <input placeholder="الرقم السري" type="password" name="password" class="form-control">
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary">اضافه</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add model  -->

    <!-- Edit model  -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> تعديل المتجر: <span class="userName"></span></h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('store.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>اسم المتجر </label>
                                <input placeholder="اسم المتجر" type="text" name="store_name" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>اختر صوره المتجر </label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>صاحب المتجر</label>
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>موقع المتجر </label>
                                <input placeholder="موقع المتجر" type="text" name="store_location" class="form-control">
                            </div>

                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>الفاعليات</label>
                                <input placeholder="الفاعليات" type="text" name="events" class="form-control">
                            </div>

                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>التوصيل</label>
                                <input placeholder="سعر التوصيل" type="text" name="conduction" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>الرقم السري </label>
                                <input placeholder="الرقم السري" type="password" name="password" class="form-control">
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary">تعديل</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit model  -->
    <!-- Delete model  -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> حذف المتجر: <span class="userName"></span></h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('store.delete')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-sm-9" style="margin-top: 10px">
                                <span>هل انت متاكد من الحذف </span>
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-danger">حذف</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete model  -->


@endsection
@section('scripts')
    <!--edit store  script-->
    <script type="text/javascript">
        $(document).on('click', '.openEditmodal', function () {
            //get valus
            var id = $(this).data('id');
            var name = $(this).data('name');
            var user_id = $(this).data('user_id');
            var location = $(this).data('location');
            var events = $(this).data('events');
            var conduction = $(this).data('conduction');


            //set values in modal inputs
            $("input[name='id']").val(id);
            $("input[name='store_name']").val(name);
            $("select[name='user_id']").val(user_id);
            $("input[name='store_location']").val(location);
            $("input[name='events']").val(events);
            $("input[name='conduction']").val(conduction);
        })

    </script>

    <!-- end edit store  script-->
    <!--  delete store  script-->
    <script type="text/javascript">
        $(document).on('click', '.openDeletemodal', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');

            $("input[name='id']").val(id);
            $("input[name='store_name']").val(name);
        });
    </script>
    <!-- end  delete store  script-->

@stop
