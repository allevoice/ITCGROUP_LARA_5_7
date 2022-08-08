<div id="carousel-example-generic" class="carousel slide " data-ride="carousel" style="margin-left: -2%;">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">


        @foreach ($slidelogin as $show)
            <div class="item {{$show->level == 1 ? 'active' : ''}}">
                <div  class="pull-right">
                    <img src="{{asset('assets/img/login/')}}/{{$show->backimgview}}" class="img-thumbnail" style="border: 0px solid #ddd;background-color:transparent;"/>
                </div>
            </div>
        @endforeach






    </div>
</div>



