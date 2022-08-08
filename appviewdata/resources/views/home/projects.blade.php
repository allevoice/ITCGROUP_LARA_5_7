@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('project'))

@section('bannerview')

@endsection

@section('datacontent')

    <style>
        .imgprojects img{
            width: auto;
            height: 200px;
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
                                @foreach (dataviewhead('4','a') as $show)
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





        <!--=====================================-->
        <!--========== Our Latest Work ==========-->
        <!--=====================================-->
        <div class="paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row text-center">
                    @foreach (dataviewhead('4','b') as $show)
                        <h2 class="black-font">{{$show->title}}</h2>
                        <p>{{$show->description}}</p>
                    @endforeach
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>


    @if (count($projetdata) > 0)

        <!--=====================================-->
        <!--========== Our Latest Work ==========-->
        <!--=====================================-->
        <div class="paddingBox greyBg col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row text-center">
                    <div id="project-filter-box" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        @foreach (projetlisteswitch() as $key=>$liste)
                            <div class="project-filter-links {{ $key=='0'  ? "current" : "" }}" id="{{$key}}">{{$liste}}</div>
                        @endforeach


                        {{--<div class="project-filter-links current" id="0">All</div>--}}
                        {{--<div class="project-filter-links" id="insurance">Installation</div>--}}
                        {{--<div class="project-filter-links" id="debit">Web development</div>--}}
                        {{--<div class="project-filter-links" id="invoice">Security</div>--}}
                        {{--<div class="project-filter-links" id="report">Data management</div>--}}

                        <!--project-filter-box-->
                    </div>
                    <div id="gallery-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="gallery-content-center">
                            <ul>

                                @foreach ($projetdata as $liste)
                                <li class="0 {{$liste->level}} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="project-details text-left col-lg-12 col-md-12 co-sm-12 col-xs-12">

                                            @if ($liste->backimg == NULL)
                                                <figure class="imgprojects"><img src="{{asset('assets/img/projects/default/blog-banner.jpg')}}" alt="project-img1" />
                                            @else
                                                <figure class="imgprojects"><img src="{{asset('assets/img/projects/')}}/{{$liste->backimg}}" alt="project-img1" />
                                            @endif
                                        </figure>
                                        <div>
                                            <h3 class="black-color">{{$liste->title}}</h3>
                                            <p>{{$liste->description}}</p>
                                        </div>
                                        <!--project-details-->
                                    </div>
                                    <!--all-->
                                </li>
                                @endforeach



                            </ul>
                            <!--gallery-content-center-->
                        </div>
                        <!--gallery-content-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>
        <!--main-contentbox-->


    @endif

    </div>


@endsection
