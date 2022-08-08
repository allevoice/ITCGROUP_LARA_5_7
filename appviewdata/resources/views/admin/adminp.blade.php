@extends('template.thermadmin')

@section('title', 'Home')

@section('admincontenent')
    <div class="col-md-12">

        <a href="{{route('smsliste')}}">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-envelope"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
                        Messages
                    </p>
                    <p class="text-muted"><span class="badge">{{count($sms)}}</span> Messages</p>
                </div>
            </div>
        </div>
        </a>


        <a href="{{route('lstnewsletter')}}">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Newsletter</p>
                    <p class="text-muted"><span class="badge">{{count($newsletter)}}</span> Newsletter</p>
                </div>
            </div>
        </div>
        </a>




        <a href="{{route('lstaccount')}}">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Utilisateurs</p>
                    <p class="text-muted"><span class="badge">{{count($account)}}</span> Utilisateurs</p>
                </div>
            </div>
        </div>
        </a>





        <br>


    </div>




@endsection
