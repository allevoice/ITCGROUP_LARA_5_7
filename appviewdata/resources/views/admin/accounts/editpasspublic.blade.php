@extends('template.tmpitcg')

@section('title', 'Account')


@section('datacontent')
    <div class="col-md-12">
        <hr>
            <h2 class="text-center">Reinitialisation de Mot de Passe</h2>
        <hr>

        <div class="col-md-9 col-sm-9">
            <form class="form-group" method="post" action="{{route('uppasscmdpublic',$data->id)}}">
                @csrf
                @method('PUT')
                <input type="text" name="id" value="{{$data->id}}" hidden>
                <div class="form-horizontal col-sm-12">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{$data->email}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="pwdpass"  placeholder="Titre De l'info bulble">
                            @if($errors->first('pwdpass'))
                                <div class="alert alert-danger">{{ $errors->first('pwdpass') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Repete Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="pwdpass_confirmation" placeholder="Titre De l'info bulble">
                            @if($errors->first('pwdpass_confirmation'))
                                <div class="alert alert-danger">{{ $errors->first('pwdpass_confirmation') }}</div>
                            @endif
                        </div>
                    </div>


                    <hr>


                    <div class="form-group text-center">
                        <div class="col-xs-6">
                            <a href="{{route('editaccount',$data->id)}}" class="btn btn-danger" type="button">Retour</a>
                        </div>
                        <div class="col-xs-6">
                            <label>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </label>
                        </div>
                    </div>
                </div>






            </form>

        </div>



@endsection
