@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('about'))

@section('bannerview')

@endsection


@section('datacontent')

    <style>
        .advisorpersoccssul a{
            color: #ffffff;
            background-color:#000000;
            border-radius: 20px;
        }
        a:hover {
            background-color: #51c5eb;
            color:#ffffff;
        }
        a:visited {
            background-color: yellow;
        }

        .advisorpersoccssul i {
            color:#ffffff;
        }
    </style>


    <div class="main-contentbox">



        <!--=====================================-->
        <!--============== Banner ===============-->
        <!--=====================================-->
        <div class="sub-banner-con darkBlueBg col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">
                        <div class="sub-banner-text darkBlueBg regular-font col-lg-6 col-md-5 col-sm-12 col-xs-12" >
                            <div style="padding-left:10%;">
                                @foreach (dataviewhead('2','a') as $show)
                                    <h1>{{$show->title}}</h1>
                                    <p>{{$show->description}}</p>
                                @endforeach
                            </div>
                            <!--sub-banner-text-->
                        </div>
                        <!--row-->
                    </div>
                    <!--container-->
                </div>
                <div class="sub-banner-img col-lg-6 col-md-7 col-sm-12 col-xs-12">
                    @include('template.bannerpage')
                </div>
                <!--row-->
            </div>
            <!--col-lg-12-->
        </div>




    @if (count($ourcomapgnie) > 0)
        <!--=====================================-->
        <!--========= Bringing new look =========-->
        <!--=====================================-->
        <div class="paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">

                    @foreach ($ourcomapgnie as $lstview)

                    <div class="text-center col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="logo-background company-graph">
                            <figure><img src="{{asset('assets/img/about/')}}/{{$lstview->backimg}}" alt="company-graph"/></figure>
                            <!--logo-background-->
                        </div>
                        <!--text-center-->
                    </div>

                    <div class="business-box no-margin-top col-lg-6 col-md-6 col-sm-12 col-xs-12 divtextcss">
                        {!! $lstview->description !!}
                        <!--business-box-->
                    </div>

                    @endforeach


                    <!--row-->
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>
        <!--=====================================-->
        <!--============ Who We Are =============-->
        <!--=====================================-->

    @endif




    @if (count($founder) > 0)
        <!--=====================================-->
            <!--============ Who We Are =============-->
            <!--=====================================-->
            <style>
                @media (max-width: 810px) {
                    .container-fluid {
                        padding-left:0px;

                    }
                    .persoviewhowareu{
                        padding-left:2%;
                    }
                }
                .persoviewhowareu{
                    padding-left:3%;
                }
            </style>
            <div class="container-fluid">
                <div class="pattern pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #000000;">
                    <div  style="background-color: #000000;" >

                        @foreach ($founder as $howareuget)
                            <div class="row">
                                <div class="who-we-are pull-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="persoviewhowareu">
                                        <h2>{{$howareuget->title}}</h2>
                                        <p>{{$howareuget->description}} </p>
                                        <div class="transparent-btn pull-left">
                                            <a href="{{$howareuget->link}}" target="_blank">Join Now</a>
                                        </div>
                                    </div>
                                    <!--who-we-are-->
                                </div>
                                <!--row-->
                            </div>

                            <div class="who-we-are-img">
                                <img src="{{asset('assets/img/whoareuimg')}}/{{$howareuget->backimg}}" alt="who-we-are-img"/>
                            </div>
                    @endforeach
                    <!--container-->
                    </div>

                    <!--pattern-->
                </div>
            </div>

        @endif



        <!--=====================================-->
        <!--========= Meet our Advisors =========-->
        <!--=====================================-->
        <div class="greyBg paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        @foreach (dataviewhead('2','b') as $show)
                            <h2>{{$show->title}}</h2>
                            <p class="regular-font">{{$show->description}}</p>
                        @endforeach
                    </div>

                    <div class="spacer"></div>




                    @if (count($advisor) > 0)
                        <div style="">
                            @foreach ($advisor as $show)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <aside class="advisor-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <figure class="advisor-img2" style="height: 100% ;width: 100%">
                                            <img alt="advisor-img2" src="{{asset('assets/img/about/')}}/{{$show->imgprofile}}" style="height: 100% ;width: 100%">
                                        </figure>
                                        <div class="advisor-info text-right" style="width:140px; margin-right: -15px">
                                            <h3>{{$show->title}}<span><hr>{{$show->post}}<br>{{$show->spost}}</span></h3>
                                        </div>
                                        <div class="social-icons">
                                            <ul class="advisorpersoccssul">
                                                @if($show->facest == NULL OR $show->facest == 0)
                                                @else
                                                    <li><a href="{{$show->facelink}}" class="btn btn-sm" ><i class="fa fa-facebook" ></i></a></li>
                                                @endif

                                                 @if($show->tweetst == NULL OR $show->tweetst == 0)
                                                 @else
                                                        <li><a href="{{$show->tweetlink}}" class="btn btn-sm"><i class="fa fa-twitter"></i></a></li>
                                                @endif

                                                 @if($show->inst == NULL OR $show->inst == 0)
                                                 @else
                                                        <li><a href="{{$show->inlink}}" class="btn btn-sm"><i class="fa fa-linkedin"></i></a></li>
                                                @endif

                                                 @if($show->gooplusst == NULL OR $show->gooplusst == 0)
                                                 @else
                                                        <li><a href="{{$show->goopluslink}}" class="btn btn-sm"><i class="fa fa-google-plus"></i></a></li>
                                                @endif

                                            </ul>
                                            <!--social-icons-->
                                        </div>
                                        <!--advisor-box-->
                                    </aside>
                                    <!--col-lg-3-->
                                </div>

                            @endforeach





                        </div>

                    @endif

                </div>
                <!--container-->
            </div>
            <!--greyBg-->
        </div>



@endsection
