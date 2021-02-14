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
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>رقم</th>
                            <th>أسم المنيو</th>
                            <th>تعديل</th>
                            <th>خذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($categories as $category)
                                <td><input class="rocord-check" type="checkbox"></td>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <button type="submit" data-toggle="modal" data-target="#edit-sub">تعديل</button>
                                </td>
                                <td>
                                    <button type="submit" data-toggle="modal" data-target="#delete-sub">حذف</button>
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
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        <input value="{{$category->name}}" name="name" type="text" class="form-control" placeholder="أسم الخدمة">
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
                    <form action="{{route('category.delete',$category->id)}}" method="post">
                        @csrf
                        <input name="name" type="text" value="{{$category->name}}" class="form-control" id="name" placeholder="أسم الخدمة">
                        <input type="hidden" name="user_id" value="{{$category->id}}">
                        <input type="submit" class="add-row" value="delete">
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
