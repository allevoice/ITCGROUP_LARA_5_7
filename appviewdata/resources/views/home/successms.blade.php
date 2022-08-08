@extends('template.tmpitcg')

@section('title', 'Success')

@section('bannerpage')
@show

@section('datacontent')





            <div class="main-contentbox" style="height: 10cm">
                            <div class="container">
                                <div class="row">
                                <H1 style="color:black">Success</H1>
                                    <div class="alert alert-success" role="alert">
                                        Success Messages send
                                    </div>

                                    <a href="{{route('home')}}" class="btn btn-lg btn-info center">Retour</a> <br>

                            </div>

                </div>
                </div>


@endsection
