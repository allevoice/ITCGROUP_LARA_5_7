@extends('template.thermadmin')

@section('title', 'Account')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            New Insert
            <a href="{{route('lstaccount')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>


            <div class="col-md-10 col-sm-8">

                <form method="post" action="{{route('insertnewaccount')}}">
                    @csrf
                        <div class="form-horizontal col-sm-12">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Titre De l'info bulble">
                                    @if($errors->first('email'))
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">First name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}" placeholder="Titre De l'info bulble">
                                    @if($errors->first('firstname'))
                                        <div class="alert alert-danger">{{ $errors->first('firstname') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group @error('post') is-invalid @enderror">
                                <label for="inputEmail3" class="col-sm-3 control-label">Last name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}" placeholder="Titre De l'info bulble">
                                    @if($errors->first('lastname'))
                                        <div class="alert alert-danger">{{ $errors->first('lastname') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group @error('post') is-invalid @enderror">
                                <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pwdpass" value="{{old('pwdpass')}}" placeholder="Titre De l'info bulble">
                                    @if($errors->first('pwdpass'))
                                        <div class="alert alert-danger">{{ $errors->first('pwdpass') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                                <div class="col-sm-9">
                                    <label>
                                        <select class="form-control" name="level">
                                            @foreach (levelrolecmd() as $key=>$liste)
                                                <option value="{{$key}}" {{ $key==old('level') ? "selected" : "" }} >{{$liste}}</option>
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






@endsection
