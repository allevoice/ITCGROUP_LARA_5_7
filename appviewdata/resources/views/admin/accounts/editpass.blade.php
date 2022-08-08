@extends('template.thermadmin')

@section('title', 'Account')



@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$data->email}}
            <a href="{{route('lstaccount')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>


        <div class="col-md-3 col-sm-3">
            <div class="col-sm-12">
                @if($data->avatar != NULL)
                    <img src="{{asset('assets/assetsadm/img/avatar')}}/{{$data->avatar}}" class="img-thumbnail" style="width:100">
                @else
                    <img src="{{asset('assets/assetsadm/img/profile/find_user.png')}}" class="img-thumbnail" style="width:100">
                @endif

            </div>
        </div>

        <div class="col-md-9 col-sm-9">
            <form class="form-group" method="post" action="{{route('uppasscmd',$data->id)}}">
                @csrf
                @method('PUT')
                <input type="text" name="id" value="{{$data->id}}" hidden>
                <div class="form-horizontal col-sm-12">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$data->email}}" readonly>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Full name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$data->lastname.' '.$data->firstname}}" readonly>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{levelrolecmd($data->level)}}" readonly>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pwdpass" value="{{old('pwdpass')}}" placeholder="Titre De l'info bulble">
                            @if($errors->first('pwdpass'))
                                <div class="alert alert-danger">{{ $errors->first('pwdpass') }}</div>
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
