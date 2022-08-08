<style>
    /* Small devices (landscape phones, 576px and up) */
    @media screen and (max-width:300px) {
        /*.bannerpage{margin-right: -1.5%;}*/
    }


    /* Medium devices (tablets, 768px and up) */
    @media (max-width: 764px) {
        .bannerpage{margin-right: -1%;}
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .bannerpage{margin-right: -1%;}
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .bannerpage{margin-right: -1.5%;}
    }

    /* Large devices (desktops, 992px and up) */
    @media screen and (min-width: 1024px) {
        .bannerpage{margin-right: -1.5%;}
    }

    /* Large devices (desktops, 992px and up) */
    @media screen and (min-width: 1440px) {
        .bannerpage{margin-right: -1%;}
    }

</style>

<div id="carousel-example-generic" class="carousel slide bannerpage" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="width:100%; height:100%;">

        @foreach ($slide as $show)
            <div class="item {{$show->level == 1 ? 'active' : ''}}">
                <div  class="pull-right">
                    <img src="{{asset('assets/img/banners/')}}/{{$show->backimgview}}"/>
                </div>
            </div>
        @endforeach

    </div>
</div>
