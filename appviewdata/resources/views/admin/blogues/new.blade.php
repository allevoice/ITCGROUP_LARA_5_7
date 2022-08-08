@extends('template.thermadmin')

@section('title', 'Blogues')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            New Insert
            <a href="{{route('listblog')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>




            <div class="col-md-10 col-sm-8">

                <form method="post" action="{{route('insertblog')}}">
                    @csrf
                    <div class="form-horizontal col-sm-12">


                        <div class="form-group @error('namepost') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Poste Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="namepost" value="{{old('namepost')}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('namepost'))
                                <div class="alert alert-danger">{{ $errors->first('namepost') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group @error('myTextEditor') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="myTextEditor"  class="myTextEditor" rows="20" cols="96"   placeholder="Votre contenu" >{{old('description')}}</textarea>
                                @if($errors->first('myTextEditor'))
                                <div class="alert alert-danger">{{ $errors->first('myTextEditor') }}</div>
                                @endif
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
                                <a href="{{route('listblog')}}" class="btn btn-danger" type="button">Retour</a>
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
