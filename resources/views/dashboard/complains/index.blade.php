@extends('layouts.master')
@section('title')
    الشكاوي والاقتراحات
@endsection
@section('content')
    <div class="row" style="margin-bottom:20px;">
        <div class="col-xs-6">
            <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-list-numbered"></i> <span> الشكاوي والاقتراحات : {{App\Models\Message::where('type',2)->count()}} </span> </button>
        </div>
    </div>
    <table id="dtable" class="text-center table table-bordered table-lg">
        <thead>
        <tr style="background:#EEE">
            <td>#</td>
            <td>الاسم</td>
            <td>البريد الالكتروني</td>
            <td>المحتوي</td>
            <td>حاله الرد</td>
            <td>الاعدادات</td>
        </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($messages as $m)
            <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->name}}</td>
                <td>{{$m->email}}</td>
                <td>{{$m->content}}</td>
                <td class="changetTitle">
                    <form >
                        <input id="_token" type="hidden" name="_token" value="{{ Session::token() }}" />
                        <button data-id="{{$m->id}}" type="submit" class="changeStatus btn btn-{{$m->replayed == 1?'success':'danger'}}">
                            <i class="fa fa-check"></i>
                        </button>
                    </form>
                </td>
                <td>
                    <ul class="icons-list" >
                        <li class="text-success-600">
                            <a  href="mailto:{{$m->email}}"><i class="fa fa-2x fa-mail-forward" aria-hidden="true"></i></a>
                        </li>
                        <li class="text-danger-600">
                            <a class="openDeletemodal" data-toggle="modal" data-target="#exampleModal" data-id="{{$m->id}}">
                                <i class="fa fa-2x fa-minus-square-o"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>

        @endforeach
        <div class="text-center paginationD">{{ $messages->links() }}</div>
        </tbody>
    </table>

    <!-- Delete model  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> هل أنت متأكد من الحذف <span class="userName"></span> </h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post">

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
@endsection

@section('scripts')

    <!--delete script-->
    <script type="text/javascript">
        $(document).on('click','.openDeletemodal',function(){
            //get valus
            var id = $(this).data('id');

            //set values in modal inputs
            $("input[name='id']").val(id);
        })

    </script>

    <!-- change status -->
    <script>
        $(document).on('click','.changeStatus',function(e){
            e.preventDefault();
            var id   = $(this).data('id')
            var _token = $("#_token").val();
            if($(this).hasClass('btn-danger')){
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-success');
            }else{
                $(this).addClass('btn-danger');
                $(this).removeClass('btn-success');
            }
            $.ajax({
                url:"{{ url('/admin/messages/replayed') }}",
                type:"POST",
                data:{

                    id: id,
                    _token:_token
                },
                dataType:"json",
                success:function(data){
                    console.log(data);
                }
            });
        });

    </script>

@endsection
