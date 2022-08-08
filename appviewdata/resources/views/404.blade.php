@extends('template.tmpitcg')

@section('title', 'Erreur 404')


@section('datacontent')


    <div class="main-contentbox" style="height: 10cm">

        <H1>Erreur 404</H1>

        <a href="{{route('home')}}" class="btn btn-lg btn-info center">Retour</a>

        <span>
            Une Erreur se produit lors de la demande de votre page...Veuillez réessayer
        </span>
    </div>

@endsection
