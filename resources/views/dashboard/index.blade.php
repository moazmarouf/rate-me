@extends('layouts.master')
@section('title')
    الرئيسيه
@endsection
@section('content')
    <div class="row" >
        <div class="col-lg-6">
            <div class="panel" style="background:#ff7043;color:#EEE;position: relative;height:150px;overflow:hidden">
                <div class="panel-body">
                    <div class="heading-elements">
                    </div>
                    <h3 class="no-margin"></h3>
                    <a style="color: #EEE" href=""><h1>المستخدمين</h1></a>
                    <h1></h1>
                    <i style="position:absolute;left:0px;top:50px;font-size:100px;color:#EEE" class="fa fa-user fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel" style="background:#5C6BC0;color:#EEE;position: relative;height:150px;overflow:hidden">
                <div class="panel-body">
                    <div class="heading-elements">
                    </div>
                    <h3 class="no-margin"></h3>
                    <a style="color: #EEE" href=""><h1>المديرين</h1></a>
                    <h1></h1>
                    <i style="position:absolute;left:0px;top:50px;font-size:100px;color:#EEE" class="fa fa-user-secret fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">أخر المستخدمين</h6>
                    <div class="heading-elements">
                        <!-- <span class="label bg-success heading-text">28 active</span> -->

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th>المستخدم</th>
                            <th class="col-md-2">الحاله</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media-left media-middle">
                                        <a href="#"><img src="{{URL::to('assets/uploads/avatars/1993_4789319.png')}}" class="img-circle img-xs" alt=""></a>
                                    </div>
                                    <div class="media-left">
                                        <div class=""><a href="#" class="text-default text-semibold"></a></div>
                                        <div class="text-muted text-size-small">
                                            <span class="status-mark border-blue position-left"></span>

                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i>

								</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">أخر المديرين</h6>
                    <div class="heading-elements">
                        <!-- <span class="label bg-success heading-text">28 active</span> -->

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th>المديرين</th>
                            <th class="col-md-2">الصلاحيه</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media-left media-middle">
                                        <a href="#"><img src="{{URL::to('assets/uploads/avatars/1993_4789319.png')}}" class="img-circle img-xs" alt=""></a>
                                    </div>
                                    <div class="media-left">
                                        <div class=""><a href="#" class="text-default text-semibold"></a></div>
                                        <div class="text-muted text-size-small">
                                            <span class="status-mark border-blue position-left"></span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i>

								</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
