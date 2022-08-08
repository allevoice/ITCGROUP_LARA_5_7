@extends('template.tmpitcg')

@section('title', languesviewdatafixepage('contact'))

@section('bannerview')

@endsection

@section('datacontent')


    @php
        $linkffootermedia = linkmedia();
    @endphp

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
                                @foreach (dataviewhead('6','a') as $show)
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





        <!--===========================================-->
        <!--============== Get in Touch ===============-->
        <!--===========================================-->
        <div class="paddingBox col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row text-center">
                    @foreach (dataviewhead('6','b') as $show)
                        <h2 class="black-font">{{$show->title}}</h2>
                        <p class="regular-font">{{$show->description}}</p>
                    @endforeach

                    <div class="spacer"></div>
                    <div class="border-top col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <aside class="contact-info">
                                    <figure class="fa fa-envelope pull-left"></figure>
                                    <div class="contact-links regular-font pull-left">
                                        <div> <a href="mailto:{{$linkffootermedia->email}}">{{$linkffootermedia->email}}</a><br>
                                            <a href="mailto:{{$linkffootermedia->email_2}}"> {{$linkffootermedia->email_2}}</a> </div>
                                        <!--contact-links-->
                                    </div>
                                    <!--contact-info-->
                                </aside>
                                <!--col-lg-4-->
                            </div>
                            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <aside class="contact-info">
                                    <figure class="fa fa-phone pull-left"></figure>
                                    <div class="contact-links regular-font pull-left">
                                        <div> {{$linkffootermedia->phone_1}} <br> {{$linkffootermedia->phone_2}} <br> {{$linkffootermedia->phone_3}} </div>
                                        <!--contact-links-->
                                    </div>
                                    <!--contact-info-->
                                </aside>
                                <!--col-lg-4-->
                            </aside>
                            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <aside class="contact-info">
                                    <figure class="fa  fa-map-marker pull-left"></figure>
                                    <div class="contact-links regular-font pull-left">
                                        <div>


                                            <p> {{$linkffootermedia->adresse}} <br> {{$linkffootermedia->address_2}} <br>
                                                {{$linkffootermedia->town}} {{$linkffootermedia->states}} {{$linkffootermedia->zipcode}}</p>
                                        </div>
                                        <!--contact-links-->
                                    </div>
                                    <!--contact-info-->
                                </aside>
                                <!--col-lg-4-->
                            </aside>
                            <!--row-->
                        </div>
                        <!--col-lg-12-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>

        <!--==============================================-->
        <!--============== Leave a Comment ===============-->
        <!--==============================================-->
        <div class="paddingBox greyBg col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="row text-center">
                    @foreach (dataviewhead('6','c') as $show)
                        <h2 class="black-font">{{$show->title}}</h2>
                        <p class="regular-font">{{$show->description}}</p>
                    @endforeach

                    <div class="spacer"></div>
                    <div class="contact-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="form_result"></div>
                        <div class="clear"></div>

                        <form method="post" id="contactpage" action="{{route('smssend')}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <input name="namesms" type="text" class="form-control" placeholder="Your name..." value="{{old('namesms')}}"/>
                                    @if($errors->first('namesms')!= NULL)
										<div class="alert alert-danger">{{ $errors->first('namesms')}}</div>
									@endif
                                </div>
                                <div class="col-md-4">
                                    <input name="email" class="form-control" value="{{old('email')}}" type="text" placeholder="Email address..." />
                                    @if($errors->first('email')!= NULL)
										<div class="alert alert-danger">{{ $errors->first('email')}}</div>
									@endif
                                </div>
                                <div class="col-md-4">
                                    <input name="subjet" class="form-control" value="{{old('subjet')}}" type="text" placeholder="Subject" />
                                    @if($errors->first('subjet')!= NULL)
										<div class="alert alert-danger">{{ $errors->first('subjet')}}</div>
									@endif									
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea rows="10" name="description" class="form-control" cols="10" placeholder="Enter your message here...">{{old('description')}}</textarea>
                                @if($errors->first('description')!= NULL)
										<div class="alert alert-danger">{{ $errors->first('description')}}</div>
								@endif								
                                <!--comments-->
                            </div>
                            <input name="submit" type="submit" class="submit" value="Submit Now!">
                    </div>
                        </form>
                        <!--contact-form-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <!--paddingBox-->
        </div>

        <div class="location-map col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                {!! $linkffootermedia->maplink !!}
                <!--row-->
            </div>
            <!--location-map-->
        </div>

        <!--main-contentbox-->

    </div>

@endsection
