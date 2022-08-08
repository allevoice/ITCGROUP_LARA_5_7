
<!--=====================================-->
<!--============ Navigation =============-->
<!--=====================================-->
<div class="greyBg header-con col-lg-12 col-md-12 col-sm-12 col-xs-12" id="headerCon">
    <div class="container">
        <div class="row">
            <aside class="header col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo pull-left">

                    <a href="{{route('home')}}">
                        <img src="{{asset('assets/img/logo/logo.png')}}" alt="logo" />
                    </a>
                </div>
                <div class="clearfix showmb"></div>
                <nav class="navbar navbar-default pull-right">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!--navbar-header-->
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="clearfix showmb"></div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="row">
                                    <ul class="nav navbar-nav pull-right" >
                                        {{--<li class="@if (url()->current() == route('home')) active @endif">--}}
                                        <li class="@if (url()->current() == route('home')) active @endif">
                                            <a href="{{route('home')}}">{{languesviewdatafixepage('home')}}</a>
                                        </li>
                                        <li class="@if (url()->current() == route('about')) active @endif">
                                            <a href="{{route('about')}}">{{languesviewdatafixepage('about')}}</a>
                                        </li>
                                        <li class="@if (url()->current() == route('services')) active @endif">
                                            <a href="{{route('services')}}">{{languesviewdatafixepage('service')}}</a>
                                        </li>

                                        <li class="@if (url()->current() == route('projects')) active @endif">
                                            <a href="{{route('projects')}}">{{languesviewdatafixepage('project')}}</a>
                                        </li>

                                        <li class="@if (url()->current() == route('blog')) active @endif">
                                            <a href="{{route('blog')}}">{{languesviewdatafixepage('blog')}}</a>
                                        </li>


                                        <li class="@if (url()->current() == route('contact')) active @endif">
                                            <a href="{{route('contact')}}">{{languesviewdatafixepage('contact')}}</a>
                                        </li>



                                        {{--<li>--}}
                                            {{--<div class="select-style">--}}
                                                {{--<form action="{{route('langchange')}}" method="POST">--}}
                                                    {{--@csrf--}}
                                                    {{--<select name="selectlang"  onchange="this.form.submit()">--}}
                                                        {{--<option value="fr">fr</option>--}}
                                                        {{--<option value="en">en</option>--}}
                                                    {{--</select>--}}
                                                {{--</form>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        <li>
                                            @if(Session::has('paneladmin') != NULL)
                                                <a href="{{route('adminpage')}}" class="btn btn-sm btn-danger square-btn-adjust"><span class="fa fa-eye"></span></a>
                                            @endif
                                        </li>


                                        <style>
                                            .select-style {
                                                padding: 0;
                                                margin: 0;
                                                border: 1px solid #ccc;
                                                width: 90px;
                                                border-radius: 3px;
                                                overflow: hidden;
                                                background-color: #fff;
                                                background: #fff;
                                                position: relative;
                                            }

                                            .select-style select {
                                                padding: 5px 8px;
                                                border: none;
                                                width:100%;
                                                box-shadow: none;
                                                background-color: transparent;
                                                background-image: none;
                                                -webkit-appearance: none;
                                                -moz-appearance: none;
                                                appearance: none;
                                            }

                                            .select-style:after {
                                                top: 50%;
                                                left: 85%;
                                                border: solid transparent;
                                                content: " ";
                                                height: 0;
                                                width: 0;
                                                position: absolute;
                                                pointer-events: none;
                                                border-color: rgba(0, 0, 0, 0);
                                                border-top-color: #000000;
                                                border-width: 5px;
                                                margin-top: -2px;
                                                z-index: 100;
                                            }

                                            .select-style select:focus {
                                                outline: none;
                                            }
                                        </style>



                                    </ul>




                                    <!--row-->
                                </div>
                                <!--collapse-->


                            </div>
                            <!--row-->
                        </div>

                        <!--container-fluid-->
                    </div>
                    <!--navbar-->





                </nav>
                <!--header-->
            </aside>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <!--greyBg-->
</div>


