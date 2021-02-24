@extends('layouts.site-master')
@section('title')
    Category
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
                    </div>
                    <div class="add-service">
                        <button type="button" data-toggle="modal" data-target="#add-sub">
                            <i class="fas fa-plus-square"></i>
                        </button>
                    </div>



                </div>
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>رقم</th>
                            <th>أسم المنيو</th>
                            <th>تعديل</th>
                            <th>خذف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td><input class="rocord-check" type="checkbox"></td>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href=""  data-toggle="modal" data-target="#edit-sub" type="button" class="openEditmodal"
                                data-id="{{$category->id}}"
                                data-name="{{$category->name}}"
                                >
                                    تعديل
                                </a>
                            <td>
                                <a href=""  data-toggle="modal" data-target="#delete-sub" type="button" class="openDeletemodal"
                                    data-id="{{$category->id}}"
                                >
                                    حذف
                                </a>
                            </td>
                            <td>
                                <a href=""  data-toggle="modal" data-target="#add-sub">
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
    </div>

    <div class="modal fade add-serv" id="add-sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>اضافة قسم فرعي </p>
                    <form action="{{route('category.create')}}" method="post">
                        @csrf
                        <input name="name" type="text" class="form-control" id="name" placeholder="أسم الخدمة">
                        <input type="submit" class="add-row" value="أضافة">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade  add-serv" id="edit-sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>تعديل القسم الفرعي  </p>
                    <form action="{{route('category.update')}}" method="post">
                        @csrf
                        <input type="hidden" value="" name="id">
                        <input value="" name="name" type="text" class="form-control" placeholder="أسم الخدمة">
                        <input type="submit" class="add-row" value="update">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade  add-serv" id="delete-sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>حذف القسم الفرعي  </p>
                    <form action="{{route('category.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <span>هل انت متاكد من الحذف ؟</span>
                        <input type="submit" class="add-row" value="delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <!--edit store  script-->
    <script type="text/javascript">
        $(document).on('click', '.openEditmodal', function () {
            //get valus
            var id = $(this).data('id');
            var name = $(this).data('name');



            //set values in modal inputs
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
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

