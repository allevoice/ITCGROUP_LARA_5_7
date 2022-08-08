@extends('template.thermadmin')

@section('title', 'Skill')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$data->title}}
            <a href="{{route('listskill')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>


            <div class="col-md-12 col-sm-12">

                <form method="post" action="{{route('addupdskill',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-horizontal col-sm-12">

                        <div class="form-group @error('title') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Placer le titre Ici">
                                @if($errors->first('title'))
                                <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="numberskill" value="{{$data->numberskill}}" placeholder="Votre Nombre Ici">
                                @if($errors->first('numberskill'))
                                <div class="alert alert-danger">{{ $errors->first('numberskill') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="linkskill" value="{{$data->linkskill}}" placeholder="url du site">
                                @if($errors->first('linkskill'))
                                <div class="alert alert-danger">{{ $errors->first('linkskill') }}</div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                            <div class="col-sm-9">
                                {{--{{print_r(statuscmd())}}--}}
                                {{--{{$data->status}}--}}
                                <label>
                                    <select class="form-control" name="status">
                                        @foreach (statuscmd() as $key=>$liste)
                                            {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                            <option value="{{$key}}"  {{ $key==$data->status ? "selected" : "" }} >{{$liste}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-group @error('linkv') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <label>
                                    <select class="form-control" name="level">
                                        @foreach (levelcmd() as $key=>$liste)
                                            {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
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
                                    <span class="btn-info"> EN {{$data->langues}}</span>
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
