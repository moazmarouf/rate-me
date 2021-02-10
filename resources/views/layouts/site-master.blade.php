<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="Site/img/logo.png" />
    <link rel="stylesheet" href="Site/css/font-awesome-5all.css" />
    <link rel="stylesheet" href="Site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Site/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="Site/css/owl.carousel.css" />
    <link rel="stylesheet" href="Site/css/animate.css" />
    <link rel="stylesheet" href="Site/css/style.css" />
</head>

<body>
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- header -->
<header class="home-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div class="side">
                <svg class="aside" xmlns="http://www.w3.org/2000/svg" width="28.044" height="23.801"
                     viewBox="0 0 28.044 23.801">
                    <g id="noun_menu_340674" transform="translate(-20.579 -23.608)">
                        <g id="Group_39" data-name="Group 39" transform="translate(20.579 23.609)">
                            <line id="Line_1" data-name="Line 1" x2="12.873" transform="translate(2.699 2.79)" />
                            <g id="Group_38" data-name="Group 38" transform="translate(0)">
                                <path id="Path_220" data-name="Path 220"
                                      d="M23.259,29.19H36.132c3.6,0,3.635-5.581.041-5.581H23.3c-3.6,0-3.636,5.581-.041,5.581Z"
                                      transform="translate(-20.579 -23.609)" fill="#fff" />
                            </g>
                        </g>
                        <g id="Group_41" data-name="Group 41" transform="translate(20.73 32.823)">
                            <line id="Line_2" data-name="Line 2" x2="12.873" transform="translate(2.549 2.636)" />
                            <g id="Group_40" data-name="Group 40" transform="translate(0 0)">
                                <path id="Path_221" data-name="Path 221"
                                      d="M23.473,48.38H36.346c3.4,0,3.433-5.271.038-5.271H23.511c-3.4,0-3.433,5.271-.038,5.271Z"
                                      transform="translate(-20.943 -43.109)" fill="#fff" />
                            </g>
                        </g>
                        <g id="Group_43" data-name="Group 43" transform="translate(20.579 41.829)">
                            <line id="Line_3" data-name="Line 3" x2="12.873" transform="translate(2.699 2.791)" />
                            <g id="Group_42" data-name="Group 42" transform="translate(0)">
                                <path id="Path_222" data-name="Path 222"
                                      d="M23.259,67.689H36.132c3.6,0,3.635-5.582.041-5.582H23.3c-3.6,0-3.636,5.582-.041,5.582Z"
                                      transform="translate(-20.579 -62.107)" fill="#fff" />
                            </g>
                        </g>
                        <g id="Group_45" data-name="Group 45" transform="translate(42.983 32.152)">
                            <path id="Path_223" data-name="Path 223" d="M77.406,44.17v4.395l3.482-2.2Z"
                                  transform="translate(-76.321 -43.06)" fill="#fff" />
                            <g id="Group_44" data-name="Group 44" transform="translate(0)">
                                <path id="Path_224" data-name="Path 224"
                                      d="M74.781,42.6V46.99a1.094,1.094,0,0,0,1.633.937l3.482-2.2a1.1,1.1,0,0,0,0-1.874l-3.482-2.2c-1.188-.749-2.275,1.129-1.1,1.874l3.482,2.2V43.856l-3.482,2.2,1.633.937V42.6A1.086,1.086,0,0,0,74.781,42.6Z"
                                      transform="translate(-74.781 -41.486)" fill="#fff" />
                            </g>
                        </g>
                    </g>
                </svg>
                <svg class="mobile-aside" xmlns="http://www.w3.org/2000/svg" width="28.044" height="23.801"
                     viewBox="0 0 28.044 23.801">
                    <g id="noun_menu_340674" transform="translate(-20.579 -23.608)">
                        <g id="Group_39" data-name="Group 39" transform="translate(20.579 23.609)">
                            <line id="Line_1" data-name="Line 1" x2="12.873" transform="translate(2.699 2.79)" />
                            <g id="Group_38" data-name="Group 38" transform="translate(0)">
                                <path id="Path_220" data-name="Path 220"
                                      d="M23.259,29.19H36.132c3.6,0,3.635-5.581.041-5.581H23.3c-3.6,0-3.636,5.581-.041,5.581Z"
                                      transform="translate(-20.579 -23.609)" fill="#fff" />
                            </g>
                        </g>
                        <g id="Group_41" data-name="Group 41" transform="translate(20.73 32.823)">
                            <line id="Line_2" data-name="Line 2" x2="12.873" transform="translate(2.549 2.636)" />
                            <g id="Group_40" data-name="Group 40" transform="translate(0 0)">
                                <path id="Path_221" data-name="Path 221"
                                      d="M23.473,48.38H36.346c3.4,0,3.433-5.271.038-5.271H23.511c-3.4,0-3.433,5.271-.038,5.271Z"
                                      transform="translate(-20.943 -43.109)" fill="#fff" />
                            </g>
                        </g>
                        <g id="Group_43" data-name="Group 43" transform="translate(20.579 41.829)">
                            <line id="Line_3" data-name="Line 3" x2="12.873" transform="translate(2.699 2.791)" />
                            <g id="Group_42" data-name="Group 42" transform="translate(0)">
                                <path id="Path_222" data-name="Path 222"
                                      d="M23.259,67.689H36.132c3.6,0,3.635-5.582.041-5.582H23.3c-3.6,0-3.636,5.582-.041,5.582Z"
                                      transform="translate(-20.579 -62.107)" fill="#fff" />
                            </g>
                        </g>
                        <g id="Group_45" data-name="Group 45" transform="translate(42.983 32.152)">
                            <path id="Path_223" data-name="Path 223" d="M77.406,44.17v4.395l3.482-2.2Z"
                                  transform="translate(-76.321 -43.06)" fill="#fff" />
                            <g id="Group_44" data-name="Group 44" transform="translate(0)">
                                <path id="Path_224" data-name="Path 224"
                                      d="M74.781,42.6V46.99a1.094,1.094,0,0,0,1.633.937l3.482-2.2a1.1,1.1,0,0,0,0-1.874l-3.482-2.2c-1.188-.749-2.275,1.129-1.1,1.874l3.482,2.2V43.856l-3.482,2.2,1.633.937V42.6A1.086,1.086,0,0,0,74.781,42.6Z"
                                      transform="translate(-74.781 -41.486)" fill="#fff" />
                            </g>
                        </g>
                    </g>
                </svg>
                <img src="Site/img/logo.png" alt="">
            </div>

            <div class="user">
                <div class="notification">
                    <a href="noti.html">
                        <i class="fas fa-bell"></i>
                        <sup>20</sup>
                    </a>
                </div>
                <div class="user-img user-drop">

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <img src="Site/img/user-img.png" alt="porfile">
                            <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('logout')}}">تسجيل خروج</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
<div class="home-page">
    <aside>
        <div class="user-side">
            <div class="user-img">
                <img src="img/user-img.png" alt="porfile">
            </div>
            <p>أحمد صالح</p>
        </div>
        <ul>
            <li>
                <a href="home.html">
                    <i class="fas fa-home"></i>
                    <span>الرئيسية</span>
                </a>
            </li>
            <li>
                <a href="service.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23.446" height="24.184"
                         viewBox="0 0 23.446 24.184">
                        <g id="service" transform="translate(-3.39 -1.93)">
                            <path id="Path_212" data-name="Path 212"
                                  d="M3.39,24.81V3.233A1.3,1.3,0,0,1,4.7,1.93h6.288a3.919,3.919,0,0,0-.5,1.934v.674H6V22.71l9.508-4.7a1.3,1.3,0,0,1,1.871,1.167,1.892,1.892,0,1,0,3.773,0V15.707h2.631v3.466A4.508,4.508,0,0,1,20.1,23.6L4.7,26.113a1.3,1.3,0,0,1-1.3-1.3Zm9.1-13.052V3.864A1.934,1.934,0,0,1,14.427,1.93H24.9a1.934,1.934,0,0,1,1.934,1.934v7.893A1.934,1.934,0,0,1,24.9,13.692H19.574l-.013.018-2.5,2.493a.392.392,0,0,1-.672-.277V13.694H14.427a1.934,1.934,0,0,1-1.934-1.937Zm5.318-6.51a.687.687,0,0,0,.687.687h4.5a.687.687,0,1,0,0-1.373H18.5A.687.687,0,0,0,17.811,5.248Zm0,2.46a.687.687,0,0,0,.687.687h4.5a.687.687,0,1,0,0-1.373H18.5A.687.687,0,0,0,17.811,7.708Zm0,2.46a.687.687,0,0,0,.687.687h4.5a.687.687,0,1,0,0-1.373H18.5A.687.687,0,0,0,17.811,10.168ZM15.65,5.248a.687.687,0,1,0,.687-.687.687.687,0,0,0-.687.687Zm0,2.46a.687.687,0,1,0,.687-.687.687.687,0,0,0-.687.687Zm0,2.46a.687.687,0,1,0,.687-.687.687.687,0,0,0-.687.687Z"
                                  transform="translate(0 0)" fill="#fff" />
                        </g>
                    </svg>
                    <span>التصنيفات</span>
                </a>
            </li>
            <li>
                <a href="offers.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.444" height="17.625"
                         viewBox="0 0 21.444 17.625">
                        <g id="Offers" transform="translate(-2.492 -10.999)">
                            <g id="Group_36" data-name="Group 36" transform="translate(2.492 11)">
                                <path id="Path_213" data-name="Path 213"
                                      d="M62.957,30.608a17.517,17.517,0,0,1-.767,1.873,2.263,2.263,0,0,1-.181,1.873,3.558,3.558,0,0,1-.339.542c-.339.451-.79.948-1.286,1.49-.023.045-.068.068-.113.113a.35.35,0,0,1-.474.068.355.355,0,0,1-.068-.542c.045-.045.068-.09.113-.135a11.41,11.41,0,0,0,1.512-1.873c.474-.948.158-1.557-.293-1.828a.867.867,0,0,0-1.2.2,16,16,0,0,1-1.535,1.873,17.766,17.766,0,0,0-1.625,2.076A9.754,9.754,0,0,0,55.69,40.29c-.045.812-.068,1.76-.09,2.325a.511.511,0,0,0,.519.519h3.318a.511.511,0,0,0,.519-.519v-.948a.706.706,0,0,1,.293-.564,14.423,14.423,0,0,0,2.889-2.46c1.354-1.58,1.851-6.229,1.918-7.628A1.07,1.07,0,0,0,62.957,30.608Z"
                                      transform="translate(-43.614 -25.553)" fill="#fff" />
                                <path id="Path_214" data-name="Path 214"
                                      d="M10.844,36.44a16.064,16.064,0,0,0-1.625-2.076,21.607,21.607,0,0,1-1.535-1.873.867.867,0,0,0-1.2-.2c-.451.271-.79.9-.293,1.828a10.114,10.114,0,0,0,1.512,1.873c.045.045.068.09.113.135a.355.355,0,0,1-.068.542.407.407,0,0,1-.474-.068l-.113-.113c-.5-.542-.948-1.038-1.286-1.49a3.557,3.557,0,0,1-.339-.542,2.181,2.181,0,0,1-.181-1.873,17.516,17.516,0,0,1-.767-1.873,1.07,1.07,0,0,0-2.1.406c.068,1.377.564,6.026,1.918,7.606a16.322,16.322,0,0,0,2.911,2.505.706.706,0,0,1,.293.564v.948a.511.511,0,0,0,.519.519h3.318a.511.511,0,0,0,.519-.519c-.023-.564-.045-1.512-.09-2.325A11.084,11.084,0,0,0,10.844,36.44Z"
                                      transform="translate(-2.492 -25.63)" fill="#fff" />
                                <path id="Path_215" data-name="Path 215"
                                      d="M35,18.374a.83.83,0,0,0,1.422.587l5.1-5.1a.818.818,0,0,0,0-1.174.845.845,0,0,0-1.174,0l-5.1,5.1A.82.82,0,0,0,35,18.374Z"
                                      transform="translate(-27.663 -12.123)" fill="#fff" />
                                <circle id="Ellipse_5" data-name="Ellipse 5" cx="1.332" cy="1.332" r="1.332"
                                        transform="translate(7.021 0)" fill="#fff" />
                                <circle id="Ellipse_6" data-name="Ellipse 6" cx="1.332" cy="1.332" r="1.332"
                                        transform="translate(11.76 4.739)" fill="#fff" />
                            </g>
                        </g>
                    </svg>
                    <span>المنتجات</span>
                </a>
            </li>
            <li>
                <a href="joins.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23.472" height="20.551"
                         viewBox="0 0 23.472 20.551">
                        <g id="order" transform="translate(-3.7 -9.525)">
                            <path id="Path_216" data-name="Path 216"
                                  d="M4.46,12.434l.862-.253h0L7.4,11.547v5.12l2.383-.456V10.837l2.129-.634,2.155-.634c.025,0,.051,0,.051-.025h.051a.96.96,0,0,1,.38,0H14.6c.025,0,.051,0,.051.025l4,1.191a6.384,6.384,0,0,0-1.217,1.825l-2.053-.608v15.64l7.528-2.256V20.8h.025a6.176,6.176,0,0,0,2.079-.38v5.7a1.08,1.08,0,0,1-.76,1.014l-9.582,2.89a.938.938,0,0,1-.608,0L4.46,27.136a1.035,1.035,0,0,1-.76-1.014V13.448A1.035,1.035,0,0,1,4.46,12.434Zm18.479-1.8a4.233,4.233,0,1,1-4.233,4.233A4.241,4.241,0,0,1,22.939,10.634Zm-2.129,4.36.786.786.811.811.811-.811,1.85-1.85-.811-.811-1.85,1.85-.786-.786Z"
                                  transform="translate(0)" fill="#fff" />
                        </g>
                    </svg>
                    <span>الاشتراك</span>
                </a>
            </li>
            <li>
                <a href="#" class="dorpdown-list">
                    <i class="fas fa-cog"></i>
                    <span>الاعدادت</span>
                </a>
                <ul class="dropdown-aside">
                    <li>
                        <a href="personal.html"> الملف الشخصي</a>
                    </li>
                    <li>
                        <a href="company-info.html">معلومات المتجر</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="contact.html">
                    <i class="fas fa-phone-volume"></i>
                    <span>أتصل بنا</span>
                </a>
            </li>
        </ul>
    </aside>
    <div class="content">
    </div>
</div>
<!-- notification -->
<div class="notification-list">
    <div class="notification-item">
        <div class="not-img">
            <img src="Site/img/user-img.png" alt="">
        </div>
        <div class="not-text text-white">
            <a href="#">
                <p>أوامر الشبكة</p>
                <span>منذ 2 د</span>
                <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>
            </a>
        </div>
    </div>
    <div class="notification-item">
        <div class="not-img">
            <img src="Site/img/user-img.png" alt="">
        </div>
        <div class="not-text text-white">
            <a href="#">
                <p>أوامر الشبكة</p>
                <span>منذ 2 د</span>
                <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>
            </a>
        </div>
    </div>
    <div class="notification-item">
        <div class="not-img">
            <img src="Site/img/user-img.png" alt="">
        </div>
        <div class="not-text text-white">
            <a href="#">
                <p>أوامر الشبكة</p>
                <span>منذ 2 د</span>
                <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>
            </a>
        </div>
    </div>
    <div class="notification-item">
        <div class="not-img">
            <img src="Site/img/user-img.png" alt="">
        </div>
        <div class="not-text text-white">
            <a href="#">
                <p>أوامر الشبكة</p>
                <span>منذ 2 د</span>
                <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>
            </a>
        </div>
    </div>
    <div class="notification-item">
        <div class="not-img">
            <img src="Site/img/user-img.png" alt="">
        </div>
        <div class="not-text text-white">
            <a href="#">
                <p>أوامر الشبكة</p>
                <span>منذ 2 د</span>
                <p>dasdasdasdasdasdasd sadas dasd asd asd asd asda</p>
            </a>
        </div>
    </div>
    <div class="notification-item">
        <div class="not-img">
            <img src="Site/img/user-img.png" alt="">
        </div>
        <div class="not-text text-white">
            <a href="#">
                <p>أوامر الشبكة</p>
                <span>منذ 2 د</span>
                <p></p>
            </a>
        </div>
    </div>
</div>
<script src="Site/js/jquery-3.2.1.min.js"></script>
<script src="Site/js/popper.min.js"></script>
<script src="Site/js/bootstrap.min.js"></script>
<script src="Site/js/dataTables.bootstrap4.min.js"></script>
<script src="Site/js/scripts.js"></script>
</body>
@yield('scripts')
</html>
