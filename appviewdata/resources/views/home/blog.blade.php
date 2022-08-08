@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('blog'))

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
                                @foreach (dataviewhead('5','a') as $show)
                                    <h1>{{$show->title}}</h1>
                                    <p>{{$show->description}} : {{$data->namepost}}</p>
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




        <!--===================================-->
        <!--============== Blog ===============-->
        <!--===================================-->
        <div class="paddingBox greyBg col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                            <aside class="sidebar tags col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               {{-- <div class="row">
                                    <h3>{{languesviewdatafixepage('experience')}}</h3>
                                    <a href="#">Pixel Haïti</a> <a href="#">Atalou Micro System</a> <a href="#">Manutech INC</a> <a href="#">Digicel Haïti</a> <a href="#">Accesshaiti</a> <a href="#">Plaza Hotel</a> <a href="#">NTPSams -Technology & ITC-GROUP</a>
                                    <!--row-->
                                </div>--}}
                                <!--sidebar-->
                                <div class="row">
                                    <h3>{{languesviewdatafixepage('other_post')}}</h3>
                                    @foreach ($dataall as $show)
                                        <a href="{{route('blogid',$show->id)}}">{{$show->namepost}} </a>
                                    @endforeach
                                    <!--row-->
                                </div>
                            </aside>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <aside class="blog-post-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <figure class="post-img">

                                    <img src="{{asset('assets/img/blog')}}/{{$data->backimg}}" alt="post-img1" />

                                    <span class="date-tag semibold-font" style="margin-left: 0px;padding-right: 2%;width: auto">{{date('j \\ F Y', strtotime($data->post_date))}}</span>
                                    <!--post-img-->
                                </figure>
                                <div class="blog-post-info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="meta">

                                    </div>
                                    <div class="social-icons">
                                        <ul>
                                            @if($data->facelink != null)
                                                @if($data->facest != 0)
                                                    <li><a href="{{$show->facelink}}" class="fa fa-facebook"></a></li>
                                                @endif
                                            @else
                                            @endif


                                            @if($data->inlink != null)
                                                @if($data->inst != 0)
                                                        <li><a href="{{$data->inlink}}" class="fa fa-linkedin"></a></li>
                                                @endif
                                            @else
                                            @endif

                                            @if($data->tweetlink != null)
                                                @if($data->tweetst != 0)
                                                        <li><a href="{{$data->tweetlink}}" class="fa fa-twitter"></a></li>
                                                @endif
                                            @else
                                            @endif

                                            @if($data->goopluslink != null)
                                                @if($data->gooplusst != 0)
                                                        <li><a href="{{$data->goopluslink}}" class="fa fa-google-plus"></a></li>
                                                @endif
                                            @else
                                            @endif
                                            <!--// <li><a href="#" class="fa fa-instagram"></a></li> //-->
                                        </ul>
                                        <!--social-icons-->
                                    </div>
                                    <div class="blog-text col-lg-12 col-md-12 col-sm-12 col-xs-12 divtextcss">
                                    {!! $data->description !!}
                                        <!--blog-text-->
                                    </div>
                                    <!--blog-post-info-->
                                </div>
                                <!--row-->
                            </div>
                            <!--blog-post-box-->
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
