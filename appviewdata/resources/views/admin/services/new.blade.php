@extends('template.thermadmin')

@section('title', 'Services')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Nouveau Service
            <a href="{{route('listserve')}}" class="btn btn-md btn-danger"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>

        <form method="post" action="{{route('insertserve')}}">
            @csrf
        <div class="col-md-12">

                <div class="form-horizontal">




                    <div class="form-horizontal col-sm-12">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('title'))
                                <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-horizontal col-sm-12">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Titre info</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control myTextEditor"  rows="3" name="titleinfo" placeholder="Votre contenu" >{{old('titleinfo')}}</textarea>
                                    @if($errors->first('titleinfo'))
                                        <div class="alert alert-danger">{{ $errors->first('titleinfo') }}</div>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control"  rows="3" name="description" placeholder="Votre contenu" >{{old('description')}}</textarea>
                        </div>




                        <div class="form-group">
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



                        <div class="form-group @error('linkv') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Langues</label>
                            <div class="col-sm-9">
                                <label>
                                    <span class="btn-info">en</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="form-group text-center">
                <div class="col-xs-6">
                    <a href="{{route('listserve')}}" class="btn btn-danger" type="button">Retour</a>
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




@endsection
