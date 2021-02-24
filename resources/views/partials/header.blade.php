<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href=""><img style="height:20px"
                                                                   src="{{URL::to('assets/images/logo2.png')}}" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li>
                <a class="sidebar-control sidebar-main-toggle hidden-xs">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <!--Messages-->
            <li class="dropdown seen">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">الرسائل</span>
                    @if($unseenmessages->count() > 0)
                        <span class="badgeseen badge bg-warning-400">{{$unseenmessages->count() }}</span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-content width-350">

                    <ul class="media-list dropdown-content-body">
                        @foreach($latestmessages as $message)
                            <li class="media">
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">{{$message->name}}</span>
                                        <span
                                            class="media-annotation pull-right">{{$message->created_at->diffForHumans()}}</span>
                                    </a>
                                    <span
                                        class="text-muted">{{ ( strlen($message->content) > 120 ) ? substr($message->content, 0, 119) : $message->content}}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="{{route('message.dashboard')}}" data-popup="tooltip" title="جميع الرسائل"><i
                                class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{URL::to('assets/uploads/avatars/1993_4789319.png')}}" alt="">
                    <span></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href=""><i class="icon-user"></i>حسابي</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('admin.logout')}}"><i class="icon-switch2"></i> تسجيل الخروج</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
@section('script')
    <script>
        $(document).ready(function () {
            $('.seen').click(function () {
                $.ajax({
                    url: "{{ url('/admin/messages/seen') }}",
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('.badgeseen').remove();
                    }
                });
            });
        });
    </script>
@endsection
