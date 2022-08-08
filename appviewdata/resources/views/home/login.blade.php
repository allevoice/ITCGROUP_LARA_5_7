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
            margin: 30px auto;
        }
    </style>


    <div class="main-contentbox">
            <div class="col-md-10 col-md-offset-1" {{--style="background-color:#5bc0de;--}}">

                <div class="col-md-7 hidden-sm hidden-xs" style="margin-left: -2%">
                    @include('template.imglogin')
                </div>


                <div class="col-md-5" >

                    <div class="col-md-12 hidden-xs" style="margin-top: 10%; height:20px; background-color: transparent;"></div>

                    <div class="col-md-12 logindiv">
                        <h1> Connexion </h1>


                        <form class="form-horizontal" action="{{route('logaccess')}}" method="post">
                            @csrf
                            <input type="hidden" name="indice" value="1">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" value="{{old('email')}}" placeholder="Email">
                                    @if($errors->first('email')!= NULL)
                                        <div class="alert alert-danger">{{ $errors->first('email')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    @if($errors->first('password')!= NULL)
                                        <div class="alert alert-danger">{{ $errors->first('password')}}</div>
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
