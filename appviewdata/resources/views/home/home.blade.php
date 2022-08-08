@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('home'))




@section('datacontent')


    <div class="main-contentbox">


    {{--@if (isset($serviv) AND count($serviv) > 0)--}}
    <!--===============================================-->
        <!--========= We offer Different Services =========-->
        <!--===============================================-->
        <div class="paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row text-center">
                    @foreach (dataviewhead('1','b') as $show)
                        <h2 class="black-font">{{$show->title}}</h2>
                        <p class="regular-font">{{$show->description}}</p>
                    @endforeach

                    <div class="spacer"></div>

                    @if (count($serviv) > 0)
                        @foreach ($serviv as $lst)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 imghvr-push-down">
                                <div class="services-box greyBg col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <figure data-effect="pop">
                                            @if($lst->blueicone !=NULL)
                                                <img src="{{asset('assets/img/services')}}/{{$lst->blueicone}}" alt="invest-img" />
                                            @else
                                                <img src="{{asset('assets/img/services/defaultgreen.png')}}" alt="invest-img" />
                                            @endif
                                        </figure>
                                        <h4 class="black-color">{{$lst->title}}</h4>
                                        <div class="services-info-con">
                                            <div class="services-info">
                                                <div class="services-infoBox">
                                                    <div>
                                                        <figure>
                                                            @if($lst->whiteicone !=NULL)
                                                                <img src="{{asset('assets/img/services')}}/{{$lst->whiteicone}}" alt="invest-imgHover" />
                                                            @else
                                                                <img src="{{asset('assets/img/services/defaultlight.png')}}" alt="invest-imgHover" />
                                                            @endif
                                                        </figure>
                                                        <h4 class="white-color">{{$lst->title}}</h4>
                                                        <p class="regular-font">{{limitemtxt($lst->titleinfo,50)}}</p>
                                                        <div class="transparent-btn btn1">
                                                            {{--<a href="{{route('contact')}}">Contact</a>--}}
                                                            <a href="{{route('service_details',$lst->codeservice)}}">Link</a>
                                                        </div>
                                                    </div>
                                                    <!--services-infoBox-->
                                                </div>
                                                <!--services-info-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--services-box-->
                                </div>
                                <!--col-lg-3-->
                            </div>
                    @endforeach
                @endif


                <!--row-->
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>

    {{--@endif--}}




    @if (count($howareu) > 0)
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

                        @foreach ($howareu as $howareuget)
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


    @if (count($bringing) > 0)
        <!--====================================-->
            <!--========= Business Meeting =========-->
            <!--====================================-->
            <div class="paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="z-index: 999;background-color: #ffffff">
                <div class="container">
                    <div class="row">
                        @foreach ($bringing as $bringviwelist)
                            <div class="text-center col-lg-5 col-md-5 col-sm-4 col-xs-3">
                                <div class="logo-background">
                                    <figure class="business-meeting-img">
                                        <img src="{{asset('assets/img/logo')}}/{{$bringviwelist->backimg}}" alt="business-meeting" class="pull-right img-responsive"/>
                                    </figure>
                                    <!--logo-background-->
                                </div>
                                <!--text-center-->
                            </div>
                            <div class="business-box col-lg-7 col-md-7 col-sm-8 col-xs-9 divtextcss" style="margin-top: 0px">
                                <div>
                                    {!! $bringviwelist->description !!}
                                </div>


                                <div class="transparent-btn">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{$bringviwelist->link}}" style="text-align: center"  target="_blank">Contact Us</a>
                                    </div>
                                </div>
                                <!--business-box-->
                            </div>
                            <!--row-->
                        @endforeach


                    </div>
                    <!--container-->
                </div>
                <!--paddingBox-->
            </div>

    @endif

    <!--main-contentbox-->
    </div>



    @if (count($helpingview) > 0)
        <!--=====================================-->
        <!--========= Bringing new look =========-->
        <!--=====================================-->
        <div class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">

                @foreach ($helpingview as $helpingviwelist)

                    <aside class="business-imagebox col-lg-4 col-md-4 col-sm-7 col-xs-12 ">
                        <div class="row">
                            <figure>
                                <img alt="business-quality" src="{{asset('assets/img/logo')}}/{{$helpingviwelist->backimghelp}}">
                            </figure>
                            <h3 class="caption-heading">{{$helpingviwelist->title}}</h3>
                            <div class="caption">
                                <div class="caption-text">
                                    <h3>{{$helpingviwelist->title}}</h3>
                                    <p class="regular-font">{{$helpingviwelist->description}}</p>
                                    <!-- // <div class="transparent-btn"><a href="#">Read More</a></div> //-->
                                    <!-- caption-text-->
                                </div>
                                <!--caption-->
                            </div>
                            <!--row-->
                        </div>
                        <!--business-imagebox-->
                    </aside>




                @endforeach




            </div>
            <!--text-center-->
        </div>
    @endif




    @if (count($skill) > 0)

        <!--=====================================-->
        <!--============= Skill Level ===========-->
        <!--=====================================-->
        <div class="paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">



                    @foreach ($skill as $skilllist)

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <aside class="skill-level col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="col-lg-4 col-md-12 col-sm-12 stat-count text-left bold-font" style="margin-left: -10%">{{$skilllist->numberskill}}</div>
                                <div class="col-lg-4 col-md-12 col-sm-12 text-right" style="margin-left: 10%">
                                    <h4 class="black-color"><span >{{$skilllist->title}}</span></h4>
                                </div>
                                <!--skill-level-->
                            </aside>
                            <!--col-lg-3-->
                        </div>
                    @endforeach

                </div>
                <!--paddingBox-->
            </div>
            <!--main-contentbox-->
        </div>

    @endif





    @if (count($partner) > 0)
        <!--=====================================-->
        <!--============== Partners =============-->
        <!--=====================================-->
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">
                    <aside class="paddingBox border-top col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="partner-heading col-lg-2 col-md-3 col-sm-12 col-xs-12">Our
                            <br>
                            <span class="light-font">Business</span>
                            <br>
                            Partners
                            <!--partner-heading-->
                        </div>

                        <div class="partners col-lg-10 col-md-12 col-sm-12 col-xs-12">



                            @foreach ($partner as $partnerlst)
                                <aside class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="partner-logos col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>
                                    <a href="{{$partnerlst->linkpartner}}" title="{{$partnerlst->titlepartner}}" target="_blank">
                                        <img src="{{asset('assets/img/partners/')}}/{{$partnerlst->imgpartner}}" alt="" class="img-thumbnail" width="100%"/>
                                    </a>
                                </span>
                                        <!--partner-logos-->
                                    </div>
                                    <!--col-lg-3-->
                                </aside>
                        @endforeach

                        <!--partners-->
                        </div>

                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                            <a href="{{route('parnerliste')}}" class="btn btn-sm btn-primary">More Partners</a>
                        </div>
                        <!--paddingBox-->
                    </aside>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <!--col-lg-12-->
        </div>
        <!--main-contentbox-->

        @endif











        </div>

@endsection

