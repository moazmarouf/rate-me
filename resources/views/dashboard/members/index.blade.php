@extends('layouts.master')
@section('title')
    الاعضاء
@stop
@section('content')
    <div class="row" style="margin-bottom:20px;">
        <div class="col-xs-6">
            <button class="btn bg-blue btn-block btn-float btn-float-lg" data-toggle="modal" data-target="#exampleModal3" type="button" data-toggle="modal" data-target="#exampleModal"><i class="icon-plus3"></i> <span>اضافه</span></button>
        </div>
        <div class="col-xs-6">
            <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-list-numbered"></i> <span>المستخدمين : {{App\Models\User::where('is_Admin',0)->count()}} </span> </button>
        </div>
    </div>
    <table id="dtable" class="text-center table table-bordered table-lg">
        <thead>
        <tr style="background:#EEE">
            <td>#</td>
            <td>الاسم</td>
            <td>الصوره</td>
            <td>البريد الالكتروني</td>
            <td>رقم الجوال</td>
            <td>الاعدادات</td>
        </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td><img style="width:160px;height:160px" src="{{URL::to('assets/uploads/avatars/default.png')}}"></td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <ul class="icons-list" >
                        <li class="text-success-600">
                            <a href="#" data-toggle="modal" data-target="#exampleModal2" class="openEditmodal"
                               data-id="{{$user->id}}"
                               data-name="{{$user->name}}"
                               data-email="{{$user->email}}"
                               data-phone="{{$user->phone}}"
                            >
                                <i class="fa fa-2x fa-edit"></i>
                            </a>
                        </li>
                        <li class="text-danger-600">
                            <a class="openDeletemodal" data-toggle="modal" data-target="#exampleModal" data-id="{{$user->id}}">
                                <i class="fa fa-2x fa-minus-square-o"></i>
                            </a>

                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
        <div class="text-center paginationD"></div>
        </tbody>
    </table>


    <!-- Add model  -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">  اضافه جديد : <span class="userName"></span> </h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('members.create')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>الاسم </label>
                                <input name="name" placeholder="اسم العضو" type="text"  class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>رقم الجوال</label>
                                <input name="phone" placeholder="رقم الجوال"  class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>البريد الالكتروني</label>
                                <input placeholder="البريد الالكتروني" type="email" name="email" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>كلمه المرور</label>
                                <input placeholder="كلمه المرور" type="password" name="password" class="form-control">
                            </div>
                            <div class="col-sm-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary" >اضافه </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit model  -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">  تعديل   : <span class="userName"></span> </h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('members.update')}}" method="post">
                    @csrf
                    <!-- token and user id -->
                        <input required="" type="hidden" name="id" value="">
                        <!-- /token and user id -->
                        <div class="row">
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>الاسم </label>
                                <input required="" type="text" name="name" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>رقم الجوال</label>
                                <input name="phone" placeholder="رقم الجوال"  class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>البريد الالكتروني</label>
                                <input required="" type="email" name="email" class="form-control">
                            </div>
                            <div class="col-sm-9" style="margin-top: 10px">
                                <label>كلمه المرور</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-sm-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary" >تعديل</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete model  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> هل أنت متأكد من الحذف <span class="userName"></span> </h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('members.delete')}}" method="post">
                        @csrf
                        <input required="" type="hidden" name="id" value="">
                        <!-- /token and user id -->
                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary" >تأكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!--edit store  script-->
    <script type="text/javascript">
        $(document).on('click', '.openEditmodal', function () {
            //get valus
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var phone = $(this).data('phone');



            //set values in modal inputs
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("input[name='email']").val(email);
            $("input[name='phone']").val(phone);
        })

    </script>

    <!-- end edit store  script-->
    <!--  delete store  script-->
    <script type="text/javascript">
        $(document).on('click','.openDeletemodal',function(){
            var id = $(this).data('id');

            $("input[name='id']").val(id);
        });
    </script>
    <!-- end  delete store  script-->

@stop
