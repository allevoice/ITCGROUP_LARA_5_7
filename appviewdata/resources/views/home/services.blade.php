@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('service'))

@section('bannerview')

@endsection

@section('datacontent')



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
                                @foreach (dataviewhead('3','a') as $show)
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
                <div class="sub-banner-img col-lg-6 col-md-7 col-sm-12 col-xs-12">
                   @include('template.bannerpage')
                </div>
                <!--row-->
            </div>
            <!--col-lg-12-->
        </div>


        <!--================================================-->
        <!--============== We offer Services ===============-->
        <!--================================================-->
        <div class="paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row text-center">
                    @foreach (dataviewhead('3','b') as $show)
                        <h2 class="black-font">{{$show->title}}</h2>
                        <p class="regular-font">{{$show->description}}</p>
                    @endforeach

                    <div class=" text-center" style="height:auto;padding-top: 2%;padding-bottom: 2%;">
                        {{ $serviceoffert->links('pagination::bootstrap-4') }}
                    </div>
                    <div class="spacer"></div>


                    @if (count($serviceoffert) > 0)
                        @foreach ($serviceoffert as $liste)
                        <aside class="services-plans col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 2%">


                            <figure>
                                @if ($liste->img1 !=Null)
                                    <img src="{{asset('assets/img/services/')}}/{{$liste->img1}}" alt="" height="200"/>
                                @else
                                    <img src="{{asset('assets/img/services/default/services-img1.jpg')}}" alt="" height="200"/>
                                @endif
                            </figure>
                            <div class="service-innerbox greyBg">
                                <div class="icon-holder BlueBg" data-effect="helix">
                                    @if($liste->whiteicone !=NULL)
                                        <span><img src="{{asset('assets/img/services')}}/{{$liste->whiteicone}}" alt="invest-img2" /></span>
                                    @else
                                        <span><img src="{{asset('assets/img/services/defaultlight.png')}}" alt="invest-img2" /></span>
                                    @endif
                                </div>
                                <h4>{{limitemtxt($liste->title,10)}}</h4>
                                <p>{{limitemtxt($liste->titleinfo,25)}}</p>
                                <!--service-innerbox-->
                                <a href="{{route('service_details',$liste->codeservice)}}" class="btn btn-sm btn-primary">More</a>
                            </div>
                            <!--services-plans-->
                        </aside>
                    @endforeach
                    @endif







                    <!--row-->
                </div>
                <div class=" text-center" style="height:auto;padding-top: 2%;padding-bottom: 2%;">
                    {{ $serviceoffert->links('pagination::bootstrap-4') }}
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>





    </div>

@endsection
