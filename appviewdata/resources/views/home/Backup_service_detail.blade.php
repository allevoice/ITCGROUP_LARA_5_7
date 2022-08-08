@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('service'))


@section('bannerpage')

@show


@section('datacontent')

    <style>
        .row > .column {
            padding: 0 8px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Create four equal columns that floats next to eachother */
        .column {
            float: left;
            width: 25%;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
        }

        /* The Close Button */
        .close {
            color: white;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #999;
            text-decoration: none;
            cursor: pointer;
        }

        /* Hide the slides by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Caption text */
        .caption-container {
            text-align: center;
            background-color: black;
            padding: 2px 16px;
            color: white;
        }

        img.demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        img.hover-shadow {
            transition: 0.3s;
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>

    <script>
        // Open the Modal
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        // Close the Modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>

    <div class="main-contentbox">




        {{--<!--=====================================-->--}}
        {{--<!--============== Banner ===============-->--}}
        {{--<!--=====================================-->--}}
        {{--<div class="sub-banner-con darkBlueBg col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
            {{--<div class="row">--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="row">--}}
                        {{--<div class="sub-banner-text darkBlueBg regular-font col-lg-6 col-md-5 col-sm-12 col-xs-12" >--}}
                            {{--<div style="padding-left:10%;">--}}
                                {{--<h1>services</h1>--}}
                                {{--<p>We offer quality service, tailored to your needs. Join us.</p>--}}
                            {{--</div>--}}
                            {{--<!--sub-banner-text-->--}}
                        {{--</div>--}}
                        {{--<!--row-->--}}
                    {{--</div>--}}
                    {{--<!--container-->--}}
                {{--</div>--}}
                {{--<div class="sub-banner-img col-lg-6 col-md-7 col-sm-12 col-xs-12">--}}
                   {{--@include('template.bannerpage')--}}
                {{--</div>--}}
                {{--<!--row-->--}}
            {{--</div>--}}
            {{--<!--col-lg-12-->--}}
        {{--</div>--}}









        <div class="greyBg col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">

                    <div class="text-center">
                        <h2 class="black-font">We offer Different Services</h2>
                        <p class="regular-font">We have a wide range of quality services at the best price </p>
                        <div class="spacer"></div>
                    </div>












                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                            <aside class="sidebar tags col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">


                                    <div class="col-lg col-md hidden-sm hidden-xs">
                                        <h3>Galleries</h3>
                                        {{--<div class="demo-gallery">--}}
                                            <ul id="lightgallery" class="list-unstyled row">
                                                {{----}}
                                                {{----}}
                                                {{--<li class="col-xs-6 col-sm-4 col-md-3"  data-src="{{asset('assets/img/services/services-img1.jpg')}}" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">--}}
                                                    {{--<a href="">--}}
                                                        {{--<img class="img-responsive" src="{{asset('assets/img/services/services-img1.jpg')}}" alt="Thumb-1">--}}
                                                    {{--</a>--}}
                                                {{--</li>--}}

                                                @if($service->img1)
                                                <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img1}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                    <a href="#">
                                                        <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img1}}" alt="Thumb-1">
                                                    </a>
                                                </li>
                                                @endif


                                                @if($service->img2)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img2}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img2}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif

                                                @if($service->img3)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img3}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img3}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif

                                                @if($service->img4)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img4}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img4}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif

                                                @if($service->img5)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img5}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img5}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif

                                                @if($service->img6)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img6}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img6}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($service->img7)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img7}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img7}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($service->img8)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img8}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img8}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($service->img9)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img9}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img9}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($service->img10)
                                                    <li class="col-md-5"  data-src="{{asset('assets/img/services')}}/{{$service->img10}}" data-sub-html="<h4>{{$service->title}}</h4><p>{{$service->titleinfo}}</p>">
                                                        <a href="#">
                                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img10}}" alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endif



                                            </ul>
                                        {{--</div>--}}

                                    </div>





                                    <div class="hidden-lg hidden-md col-sm col-xs">

                                        <!-- Images used to open the lightbox -->
                                        <div class="row">
                                            <div class="column">
                                                <button type="button" onclick="openModal();currentSlide(1)" class="hover-shadow">Gallery</button>
                                            </div>
                                        </div>

                                        <!-- The Modal/Lightbox -->
                                        <div id="myModal" class="modal">
                                            <span class="close cursor" onclick="closeModal()">&times;</span>
                                            <div class="modal-content">

                                                @if($service->img1)
                                                    <div class="mySlides">
                                                        <img src="{{asset('assets/img/services')}}/{{$service->img1}}" style="width:100%">
                                                    </div>
                                                @endif

                                                    @if($service->img2)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img2}}" style="width:100%">
                                                        </div>
                                                    @endif

                                                    @if($service->img3)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img3}}" style="width:100%">
                                                        </div>
                                                    @endif

                                                    @if($service->img4)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img4}}" style="width:100%">
                                                        </div>
                                                    @endif

                                                    @if($service->img5)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img5}}" style="width:100%">
                                                        </div>
                                                    @endif

                                                    @if($service->img6)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img6}}" style="width:100%">
                                                        </div>
                                                    @endif
                                                    @if($service->img7)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img7}}" style="width:100%">
                                                        </div>
                                                    @endif
                                                    @if($service->img8)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img8}}" style="width:100%">
                                                        </div>
                                                    @endif
                                                    @if($service->img9)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img9}}" style="width:100%">
                                                        </div>
                                                    @endif
                                                    @if($service->img10)
                                                        <div class="mySlides">
                                                            <img src="{{asset('assets/img/services')}}/{{$service->img10}}" style="width:100%">
                                                        </div>
                                                @endif



                                                <!-- Next/previous controls -->
                                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                            </div>
                                        </div>





                                    </div>



                                    <div>
                                        {{$service->titleinfo}}
                                    </div>


                                    <!--row-->
                                </div>
                                <!--sidebar-->
                            </aside>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <aside class="blog-post-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">

                                    <div class="blog-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3>{{$service->title}}</h3>
                                        <div class="divtextcss">
                                            {!! $service->description !!}
                                        </div>
                                        <!--blog-text-->
                                    </div>

                            </div>
                        </aside>

                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>
        <!--main-contentbox-->





    </div>

@endsection
