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
                        <div>
                            <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#logo_{{$data->id}}">Edit</a>
                        </div>
                        <span id="helpBlock" class="help-block">
                              @if($errors->first('backimg'))
                            <div class="alert alert-danger">{{ $errors->first('backimg') }}</div>
                            @endif
                        <strong>Logo</strong>
                        Accept les format suivant PNG, JPG
                        </span>
                    </div>
            </div>

            <div class="col-md-9 col-sm-9">

                <form method="post" action="{{route('updateaccount',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" value="{{$data->id}}" hidden>
                    <input type="text" name="indice" value="3" hidden>

                    <div class="form-horizontal col-sm-12">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="{{$data->email}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">First name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" value="{{$data->firstname}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('firstname'))
                                    <div class="alert alert-danger">{{ $errors->first('firstname') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group @error('post') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Last name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname" value="{{$data->lastname}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('lastname'))
                                    <div class="alert alert-danger">{{ $errors->first('lastname') }}</div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    @foreach (statuscmd() as $key=>$liste)
                                        {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                        <option value="{{$key}}"  {{ $key==$data->status ? "selected" : "" }} >{{$liste}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>





                        <div class="form-group @error('post') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <a href="{{route('uppassview',$data->id)}}" class="btn btn-xs btn-info">Edit</a>
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <label>
                                    <select class="form-control" name="level">
                                        @foreach (levelrolecmd() as $key=>$liste)
                                            <option value="{{$key}}" {{ $key==$data->level ? "selected" : "" }} >{{$liste}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>



                        <div class="form-group @error('linkv') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Langues</label>
                            <div class="col-sm-9">
                                <label>
                                    <span class="btn-info">en</span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group text-center">
                            <div class="col-xs-6">
                                <a href="{{route('lstaccount')}}" class="btn btn-danger" type="button">Retour</a>
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
    </div>
{{--Mise a jours de background--}}


{{--Mise a jours de Logo--}}
<div class="modal fade" id="logo_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="post" action="{{route('updateaccount',$data->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Logo Modification</h4>
            </div>
            <div class="modal-body">
                    <img src="{{asset('assets/assetsadm/img/profile/find_user.png')}}" class="img-thumbnail" style="width:100">
                    <div>
                        <input type="text" name="id" value="{{$data->id}}" hidden>
                        <input type="text" name="indice" value="2" hidden>
                        <input type="file" name="avatar">
                    </div>
                <span id="helpBlock" class="help-block">
                        Accept les format suivant PNG, JPG
                        </span>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
    </form>
</div>
{{--Mise a jours de Logo--}}

@endsection
