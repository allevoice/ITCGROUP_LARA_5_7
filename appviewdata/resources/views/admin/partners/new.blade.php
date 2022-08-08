@extends('template.thermadmin')

@section('title', 'Partner')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            New Partner
            <a href="{{route('listpartner')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>




            <div class="col-md-10 col-sm-8">

                <form method="post" action="{{route('insertpartner')}}">
                    @csrf
                    <div class="form-horizontal col-sm-12">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="titlepartner" value="{{old('titlepartner')}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('titlepartner'))
                                <div class="alert alert-danger">{{ $errors->first('titlepartner') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Service</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="titleservices" value="{{old('titleservices')}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('titleservices'))
                                <div class="alert alert-danger">{{ $errors->first('titleservices') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Contenue</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  rows="3" name="servicepartner" placeholder="Votre contenu" >{{old('servicepartner')}}</textarea>
                                {{--@error('descdetail')--}}
                                {{--<div class="alert alert-danger">{{ $message }}</div>--}}
                                {{--@enderror--}}
                            </div>
                        </div>

                        <div class="form-group @error('linkpartner') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="linkpartner" value="{{old('linkpartner')}}" placeholder="url du site">
                                @if($errors->first('linkpartner'))
                                <div class="alert alert-danger">{{ $errors->first('linkpartner') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('level') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <label>
                                    <select class="form-control" name="level">
                                        @foreach (levelcmd() as $key=>$liste)
                                            {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                            <option value="{{$key}}" {{ $key==old('level') ? "selected" : "" }} >{{$liste}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Langues</label>
                            <div class="col-sm-9">
                                <label>
                                    <span class="btn-info">en</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-6">
                                <a href="{{route('listpartner')}}" class="btn btn-danger" type="button">Retour</a>
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
