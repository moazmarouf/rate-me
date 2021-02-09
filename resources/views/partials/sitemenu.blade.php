<div class="side-menu">
    <div class="head">
        <div class="logo">
            <img src="{{URL::to('assets/uploads/avatars/default.png')}}" alt="img" class="img-fluid">
        </div>
        <div class="info">
            <h3>{{Auth::user()->name}}</h3>
            <p> {{Auth::user()->email}} </p>
        </div>
    </div>
    <div class="list">
        <a class="{{Request::is('home')?'active':''}}" href=""> <span> <img src="{{URL::to('assets/site/images/menu-home.png')}}" alt="img" class="img-fluid"> </span> الرئيسية </a>

        <a class="{{Request::is('profile')?'active':''}}" href="{{route('profile')}}"> <span> <img src="{{URL::to('assets/site/images/menu-profile.png')}}" alt="img" class="img-fluid"> </span> بياناتى </a>

        <a class="{{Request::is('offers')?'active':''}}" href="{{route('offers')}}"> <span> <img src="{{URL::to('assets/site/images/menu-offers.png')}}" alt="img" class="img-fluid"> </span> العروض و الخصومات </a>

        <a class="{{Request::is('likes')?'active':''}}" href="{{route('likes')}}"> <span> <img src="{{URL::to('assets/site/images/menu-fav.png')}}" alt="img" class="img-fluid"> </span> المفضلة </a>

        <a class="{{Request::is('my-orders')?'active':''}}" href="{{route('orders.mine')}}"> <span> <img src="{{URL::to('assets/site/images/menu-orders.png')}}" alt="img" class="img-fluid"> </span> طلباتى </a>

        <a href="{{route('faq')}}"> <span> <img src="{{URL::to('assets/site/images/menu-faq.png')}}" alt="img" class="img-fluid"> </span> اسئلة متكررة </a>

        <a href="{{route('policy')}}"> <span> <img src="{{URL::to('assets/site/images/menu-terms.png')}}" alt="img" class="img-fluid"> </span> الشروط و الاحكام </a>

        <a href="{{route('contactUs')}}"> <span> <img src="{{URL::to('assets/site/images/menu-contact.png')}}" alt="img" class="img-fluid"> </span> تواصل معنا </a>

        <a href="{{route('users.logout')}}"> <span> <img src="{{URL::to('assets/site/images/menu-logout.png')}}" alt="img" class="img-fluid"> </span> تسجيل دخول / تسجيل خروج </a>
    </div>
</div>
