@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('service'))

@section('bannerview')

@endsection

@section('datacontent')

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
                        @foreach (dataviewhead('3','b') as $show)
                            <h2 class="black-font">{{$show->title}}</h2>
                            <p class="regular-font">{{$show->description}}</p>
                        @endforeach
                        <div class="spacer visible-lg"></div>
                    </div>



                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                            <aside class="sidebar col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <h3 class="visible-xs">{{$service->title}}</h3>
                                    <div class="col-sm-12 col-xs-5">
                                        @if($service->img1 !=NULL)
                                            <img class="img-responsive" src="{{asset('assets/img/services')}}/{{$service->img1}}" alt="Thumb-1">
                                        @else
                                            <img class="img-responsive" src="{{asset('assets/img/services/default/services-img1.jpg')}}" alt="Thumb-1">
                                        @endif
                                    </div>
                                    <div class="spacer visible-lg"></div>
                                    <div class="col-sm-12 col-xs-7">
                                        {{$service->titleinfo}}
                                    </div>
                                    <div class="spacer visible-lg"></div>


                                    <!--row-->
                                </div>
                                <!--sidebar-->
                            </aside>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                        <aside class="blog-post-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                    <div class="blog-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="visible-lg visible-sm visible-md">{{$service->title}}</h3>
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
