@extends('template.tmpitcg')

@section('title', 'Forget Password')

@section('bannerview')

@endsection

@section('datacontent')




    <div class="main-contentbox">
        <div class="col-md-10 col-md-offset-1" style="background-color:transparent">
            <div class="col-md-7 hidden-sm hidden-xs" style="margin-left: -2%">
                @include('template.imglogin')
            </div>


            <div class="col-md-5" >

                <div class="col-md-12 hidden-xs" style="margin-top: 10%; height:20px; background-color: transparent;"></div>

                <div class="col-md-12" style="background-color:#ffffff">
                    <h2 class="h2 text-center" style="color:black">Probleme Mot de Passe</h2>

                    @if(Session::has('activateview') != NULL)
                        <div class="alert alert-danger">{{ Session::get('activateview')}}</div>

                    @endif
                    <form class="form-horizontal" action="{{route('logpasserror')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Inserer votre mail">
                                @if(Session::has('alert') != NULL)
                                    <div class="alert alert-danger">{{ Session::get('alert')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-info">Send</button>
                                <a href="{{route('loginpage')}}" class="btn btn-danger pull-right">Back</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>


    </div>

@endsection
