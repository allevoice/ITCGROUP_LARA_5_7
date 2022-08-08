<!doctype html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>ITC Group | @yield('title')</title>
        <link rel="icon" href="{{ URL::asset('assets/img/logo/favicon.png') }}" type="image/x-icon"/>
        <style>
            #gtx-trans{
                display: none;
            }

            h1{
                font-size: x-small;
                font-weight: bold;
            }
            #presoh1,#presoh2,#presoh3{
                color:#000000;
                margin-bottom: 2%;
                margin-top: 5%;
            }

            /*ce style est pour les LI de TinyCME */
            .divtextcss .persoimage ul, .divtextcss .persoimage ol, .divtextcss .persoimage li{
                list-style-type: none;
                margin-left: 0;
                margin-top: 0;
                margin-right: 0;
                margin-bottom: 0;
                padding-left: 30px;
                /*padding: 36px 0 36px 84px;*/
                background-image: url('{{asset('assets/img/logo/small-logo.png')}}');
                background-repeat: no-repeat;
                background-position: left center;
                background-size: 20px;
            }
            .persoimage, .persoimage ul, .persoimage ol{
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .divtextcss .monpa, .divtextcss p {
                margin-top: 3px;
                margin-bottom: 0px;
                margin-right: 0px;
                margin-left: 0px;
                padding: 0px 0px 0px 0px;
                text-align: justify;
            }

            /*Code lightboxe image dans services*/

            @font-face {
                font-family: 'lg';
                src: url("{{asset('assets')}}/fonts/lg.ttf?22t19m") format("truetype"), url("{{asset('assets')}}/fonts/lg.woff?22t19m") format("woff"), url("{{asset('assets')}}/fonts/lg.svg?22t19m#lg") format("svg");
                font-weight: normal;
                font-style: normal;
                font-display: block;
            }


            .demo-gallery > ul {
                margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: left;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 200px;
            }
            .demo-gallery > ul > li a {
                border: 3px solid #FFF;
                border-radius: 3px;
                display: block;
                overflow: hidden;
                position: relative;
                float: left;
            }
            .demo-gallery > ul > li a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
                opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.1);
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                -webkit-transition: background-color 0.15s ease 0s;
                -o-transition: background-color 0.15s ease 0s;
                transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
                left: 50%;
                margin-left: -10px;
                margin-top: -10px;
                opacity: 0;
                position: absolute;
                top: 50%;
                -webkit-transition: opacity 0.3s ease 0s;
                -o-transition: opacity 0.3s ease 0s;
                transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
                opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.1);
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                -webkit-transition: background-color 0.15s ease 0s;
                -o-transition: background-color 0.15s ease 0s;
                transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
                left: 50%;
                margin-left: -10px;
                margin-top: -10px;
                opacity: 0;
                position: absolute;
                top: 50%;
                -webkit-transition: opacity 0.3s ease 0s;
                -o-transition: opacity 0.3s ease 0s;
                transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
                height: 48px;
                margin-left: -24px;
                margin-top: -24px;
                opacity: 0.8;
                width: 48px;
            }
            .demo-gallery.dark > ul > li a {
                border: 3px solid #04070a;
            }
            .home .demo-gallery {
                padding-bottom: 80px;
            }
            /*Code lightboxe image dans services*/



        </style>



        <link rel="stylesheet" href="{{asset('assets/css/all-stylesheets.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/moncss.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/headings.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/buttons.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/preloader.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/projects/projects.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/animation.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/custom-layout.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/special-classes.css')}}" type="text/css" />




        <link rel="stylesheet" href="{{asset('assets/css/fonts.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/fonts/font-awesome/css/font-awesome.css')}}" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" type="text/css" />


        <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/owl-carousel/css/owl.carousel.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/owl-carousel/css/owl.theme.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/owl-carousel/css/owl.transitions.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/owl-carousel/css/animate.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/mobile.css')}}" type="text/css" />

        <link href="{{asset('assets')}}/lightgallery.css" rel="stylesheet">


    </head>


    <body class="home-page">



{{--    @section('loadingpage')
        @include('template.loading')
    @show--}}

    @section('bannerview')
        @include('template.bannerview')
    @show


    @section('menubarre')
        @include('template.menup')
    @show



@yield('datacontent')





<!--=====================================-->
<!--============== Footer ===============-->
<!--=====================================-->

@php
$linkffootermedia = linkmedia();
@endphp

<div class="darkBlueBg paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="container">
        <div class="row">
            <div class="footer col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <aside class="newsletter col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <h5>{{languesviewdatafixepage('newsletter')}}</h5>
                    <form action="{{route('addnewsletter')}}" method="post">
                        @csrf
                        <div class="form-group pull-left">
                            <input type="email" class="form-control" placeholder="{{languesviewdatafixepage('enter_your_email')}}" name="newsletter" id="letter-email">
                        </div>
                        <button type="submit" class="btn btn-default pull-left">{{languesviewdatafixepage('go')}}</button>
                    </form>
                    <div class="clearfix"></div>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker"></i> {{$linkffootermedia->adresse}} <br> {{$linkffootermedia->address_2}}<br>
                            {{$linkffootermedia->town}} {{$linkffootermedia->states}} {{$linkffootermedia->zipcode}}
                        </li>
                        <li>
                            <i class="fa fa-phone"></i> {{$linkffootermedia->phone_1}}
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:info@fcgroup.com">{{$linkffootermedia->email}}</a>
                        </li>
                    </ul>
                    <!--newsletter-->
                </aside>
                <aside class="sitemap col-lg-2 col-md-3 col-sm-6 col-xs-12">



                    <h5>{{languesviewdatafixepage('partnership')}}</h5>
                    <ul>
                        @foreach (footerlistpartner() as $show)
                            <li style="background: url({{asset('assets/img/icons/li-icon.png')}}) no-repeat left 7px;">
                                <a href="{{$show->linkpartner}}" target="_blank">{{$show->titlepartner}}</a>
                            </li>
                        @endforeach
                    </ul>



                    <!--sitemap-->
                </aside>
                <aside class="twitter-feeds col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h5>{{languesviewdatafixepage('feedsfacebook')}}</h5>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fm.facebook.com%2F105624488738726%2F&tabs=timeline&width=250&height=250&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="250" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <!--twitter-feeds-->
                </aside>
                <aside class="copyright-section col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="logo pull-left">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets/img/logo/footer-logo.png')}}" alt="logo" />
                        </a>
                    </div>
                    <ul>
                        <li>Copyright © ITCGROUP 2022.</li>
                        <li>All rights reserved.</li>
                        <li>{{languesviewdatafixepage('createdby')}}
                            <a href="#">NTPSAMS</a>
                        </li>
                    </ul>
                    <div class="social-icons">
                        @if($linkffootermedia->facest == 1)
                            <a href="{{$linkffootermedia->facelink}}" class="btn btn-sm" style="color: #ffffff" ><i class="fa fa-facebook" ></i></a>
                        @endif

                        @if($linkffootermedia->tweetst == 1)
                            <a href="{{$linkffootermedia->tweetlink}}" class="btn btn-sm" style="color: #ffffff" ><i class="fa fa-twitter"></i></a>
                        @endif

                        @if($linkffootermedia->inst == 1)
                            <a href="{{$linkffootermedia->inlink}}" class="btn btn-sm" style="color: #ffffff" ><i class="fa fa-linkedin"></i></a>
                        @endif

                        @if($linkffootermedia->gooplusst == 1)
                            <a href="{{$linkffootermedia->goopluslink}}" class="btn btn-sm" style="color: #ffffff" ><i class="fa fa-google-plus"></i></a>
                        @endif

                        @if($linkffootermedia->instast == 1)
                            <a href="{{$linkffootermedia->instalink}}" class="btn btn-sm" style="color: #ffffff" ><i class="fa fa-instagram"></i></a>
                        @endif


                        <a href="{{route('loginpage')}}"><i class="fa fa-lock" style="color: goldenrod;font-size: 20px;"></i></a>

                        <!--social-icons-->
                    </div>
                    <!--copyright-section-->

                </aside>
                <!--footer-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <!--darkBlueBg-->
</div>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/js/jquery-1.12.3.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/js/bootstrap/bootstrap.js')}}"></script>
    <!-- Counter -->
    <script src="{{asset('assets/js/counter/counter.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('assets/owl-carousel/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/projects/isotope.js')}}"></script>
    <!-- LAZY EFFECTS Scripts -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.unveilEffects.js')}}"></script>
    <!-- Custom Scripts -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets')}}/lightgallery_1.js"></script>
<script src="{{asset('assets')}}/lg-zoom.js"></script>
<script>
    lightGallery(document.getElementById('lightgallery'));
</script>






    </body>
</html>
