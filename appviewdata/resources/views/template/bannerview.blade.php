<!--=====================================-->
<!--============== Banner ===============-->
<!--=====================================-->



@if(isset($slideview))

    <div id="carousel-example-generic" class="carousel slide colorback" data-ride="carousel" >

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach ($slideview as $lst)
            <div class="item {{$lst->level == 1 ? 'active' : ''}}">
                <div  class="pull-right">
                    @if($lst->backimgview != NULL)
                        <img src="{{asset('assets/img/slideshow/')}}/{{$lst->backimgview}}" class="imgbanner"/>
                    @else
                        <img src="{{asset('assets/img/slideshow/default.jpg')}}" class="imgbanner"/>
                    @endif
                </div>

                <div class="viewlogoimg">
                    @if($lst->logoview != NULL)
                        <img src="{{asset('assets/img/slideshow/')}}/{{$lst->logoview}}" class="pull-left imglogo"  alt="small-logo" />
                    @else
                        <img src="{{asset('assets/img/logo/small-logo.png')}}" class="pull-left imglogo"  alt="small-logo" />
                    @endif
                </div>


                <div class="carousel-caption img_carousel">
                    <h1>{{$lst->title}}</h1>
                    <p>{{$lst->description}}</p>
                    <div class="banner-btn transparent-btn">
                        <a href="{{$lst->link}}" target="_blank">Contact Us Now</a>
                    </div>
                </div>
            </div>
        @endforeach









    </div>

    <div class="explore-services BlueBg semibold-font" id="explore">Explore the
        services
        <figure class="bounce">
            <img src="{{asset('assets/img/logo/arrow-down.png')}}" alt="arrow" />
        </figure>
        <!--explore-services-->
    </div>
</div>

    @endif


