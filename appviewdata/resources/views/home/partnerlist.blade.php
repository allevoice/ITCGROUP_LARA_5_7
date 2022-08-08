@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('home'))

@section('bannerview')

@endsection

@section('datacontent')


    <!--=====================================-->
    <!--============== Banner ===============-->
    <!--=====================================-->

    <div class="sub-banner-con darkBlueBg col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="sub-banner-text darkBlueBg regular-font col-lg-5 col-md-5 col-sm-12 col-xs-12" >
                        <div style="padding-left:10%;margin-left: -2%">
                            @foreach (dataviewhead('7','a') as $show)
                                <h1>{{$show->title}}</h1>
                                <p class="regular-font">{{$show->description}}</p>
                            @endforeach
                        </div>
                        <!--sub-banner-text-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <div class="sub-banner-img col-lg-7 col-md-7 col-sm-12 col-xs-12">
                @include('template.bannerpage')
            </div>
            <!--row-->
        </div>
        <!--col-lg-12-->
    </div>



    <!--=====================================-->
        <!--============== Partners =============-->
        <!--=====================================-->
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row darkBlueBg">

                        <div class=" text-center" style="height:auto;padding-top: 2%;padding-bottom: 2%;">
                            {{ $partner->links('pagination::bootstrap-4') }}
                        </div>



                    <!--================================================-->
                    <!--============== Partner Services Liste  ===============-->
                    <!--================================================-->
                    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="container">
                            <div class="row" style="margin-right: 1%">

                                @foreach ($partner as $partnerlst)

                                    <aside class="services-plans col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-bottom: 10;padding-top: 10">
                                        <figure>
                                            @if ($partnerlst->backimgpartner !=Null)
                                                <img src="{{asset('assets/img/partners/')}}/{{$partnerlst->backimgpartner}}" alt="" height="200"/>
                                            @else
                                                <img src="{{asset('assets/img/partners/services-default.jpg')}}" alt="" height="200"/>
                                            @endif
                                        </figure>
                                        <style>
                                            @media (min-width: 760px) {
                                                .greyBg {
                                                    width: 100%;
                                                    height: 200px;
                                                    /*background-color: red;*/
                                                }
                                            }
                                        </style>
                                        <div class="service-innerbox greyBg">
                                            <a href="https://{{$partnerlst->linkpartner}}" target="_blank">
                                                <div class="icon-holder darkBlueBg" data-effect="helix">
                                                    <style>
                                                        .monimgback{
                                                            -webkit-filter: drop-shadow(1px 1px 0 #ffffff)
                                                            drop-shadow(-1px -1px 0 #ffffff);
                                                            filter: drop-shadow(1px 1px 0 #ffffff)
                                                            drop-shadow(-1px -1px 0 #ffffff);
                                                            width:100%;
                                                        }
                                                    </style>
                                                    <span><img src="{{asset('assets/img/partners')}}/{{$partnerlst->imgpartner}}" alt="invest-img2" class="monimgback"/></span>
                                                </div>
                                            </a>
                                            <h4 style="font-size:90%">{{limitemtxt($partnerlst->titlepartner, 20)}}</h4>
                                            <a href="https://{{$partnerlst->linkpartner}}" target="_blank">
                                                <span class="btn btn-md btn-primary">{{limitemtxt($partnerlst->titleservices, 18)}}</span>
                                            </a>
                                            <div style="font-size: 100%; margin-bottom: 0;margin-top: 0;">
                                                {{--{{$partnerlst->servicepartner}}--}}
                                                {!! limitemtxt($partnerlst->servicepartner, 50) !!}
                                                {{--<ul class="persoimage">--}}
                                                    {{--<li>Visionner</li>--}}
                                                    {{--<li>Visionner</li>--}}
                                                    {{--<li>Visionner</li>--}}
                                                    {{--<li>Visionner</li>--}}
                                                {{--</ul>--}}

                                            </div>
                                            <!--service-innerbox-->
                                        </div>
                                        <!--services-plans--><br>
                                    </aside>

                                @endforeach
                          </div>
                            <!--container-->
                        </div>
                        <!--paddingBox-->
                    </div>

                    <div class="spacer"></div>



                        <div class="darkBlueBg text-center" style="height:padding-bottom: 2%;">
                            {{ $partner->links('pagination::bootstrap-4') }}
                        </div>


                </div>

                <!--container-->
            </div>
            <!--col-lg-12-->
        </div>
        <!--main-contentbox-->




    </div>

@endsection
