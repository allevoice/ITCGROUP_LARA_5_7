@extends('template.tmpitcg')

@section('title', 'Login')

@section('bannerview')

@endsection

@section('datacontent')


    <style>
        .logindiv h1{
            font-size: 26px;
            text-align: center;
            font-weight: bold;
            color: #0A0A0A;
            margin: 20px auto;
        }
    </style>


    <div class="main-contentbox">
            <div class="col-md-10 col-md-offset-1">


                <div class="col-md-5 center" >

                    <div class="col-md-12 hidden-xs" style="margin-top: 10%; height:20px; background-color: transparent;"></div>

                    <div class="col-md-12 logindiv">
                        <h1> Connexion </h1>


                        @if(Session::has('activateview') != NULL)
                            <div class="alert alert-danger">{{ Session::get('activateview')}}</div>

                        @endif
                        <form class="form-horizontal" action="{{route('logpersocmd')}}" method="post">
                            @csrf
                            <input type="hidden" name="indice" value="3">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" value="{{old('email')}}" placeholder="Email">
                                    @if(Session::has('alert') != NULL)
                                        <div class="alert alert-danger">{{ Session::get('alert')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    @if(Session::has('pass') != NULL)
                                        <div class="alert alert-danger">{{ Session::get('pass')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="rmb" value="1"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info">Sign in</button>

                                    <a href="{{route('forgetpass')}}" class="text-center pull-right">I forgot my password</a>
                                </div>

                            </div>

                        </form>



                    </div>





                </div>
            </div>
        <!--main-contentbox-->
    </div>

@endsection
