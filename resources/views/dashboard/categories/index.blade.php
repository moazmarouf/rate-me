@extends('layouts.master')
@section('title')
    الاقسام
@stop
@section('content')
<div class="row" style="margin-bottom:20px;">
    <div class="col-xs-6">
        <button class="btn bg-blue btn-block btn-float btn-float-lg" data-toggle="modal" data-target="#add-category" type="button" data-toggle="modal" data-target="#exampleModal"><i class="icon-plus3"></i> <span>اضافه</span></button>
    </div>
    <div class="col-xs-6">
        <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-list-numbered"></i> <span>المنيوهات : {{App\Models\Category::count()}} </span> </button>
    </div>
</div>
<table id="dtable" class="text-center table table-bordered table-lg">
    <thead>
    <tr style="background:#EEE">
        <td>#</td>
        <td>الاسم</td>
        <td>الاعدادات</td>
    </tr>
    </thead>
    <tbody id="tableBody">
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
                <ul class="icons-list" >
                    <li class="text-success-600">
                        <a href="#" data-toggle="modal" data-target="#edit-category" class="openEditmodal"
                           data-id="{{$category->id}}"
                           data-name="{{$category->name}}"
                        >
                            <i class="fa fa-2x fa-edit"></i>
                        </a>
                    </li>
                    <li class="text-danger-600">
                        <a class="openDeletemodal" data-toggle="modal" data-target="#delete-category" data-id="{{$category->id}}">
                            <i class="fa fa-2x fa-minus-square-o"></i>
                        </a>

                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    <div class="text-center paginationD">{{ $categories->links() }}</div>
    </tbody>
</table>


<!-- Add model  -->
<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  اضافه جديد : <span class="userName"></span> </h5>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.create')}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-9" style="margin-top: 10px">
                            <label>الاسم </label>
                            <input placeholder="اسم القسم" type="text" name="name" class="form-control">
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
<div class="modal fade" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  تعديل   : <span class="userName"></span> </h5>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.update')}}" method="post" enctype="multipart/form-data">

                    <!-- token and user id -->
                    {{csrf_field()}}
                    <input required="" type="hidden" name="id" value="">
                    <!-- /token and user id -->
                    <div class="row">

                        <div class="col-sm-9" style="margin-top: 10px">
                            <label>الاسم </label>
                            <input required="" value="" type="text" name="name" class="form-control">
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
<div class="modal fade" id="delete-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> هل أنت متأكد من الحذف <span class="userName"></span> </h5>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.delete')}}" method="post">

                    <!-- token and user id -->
                    {{csrf_field()}}
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
