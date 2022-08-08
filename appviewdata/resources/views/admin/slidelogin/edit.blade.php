@extends('template.thermadmin')

@section('title', 'SlideLogin')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$data->title}}
            <a href="{{route('listsldlogin')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>



        <div class="col-md-6 col-md-offset-3">
            <div class="col-sm-12">
                <img src="{{asset('assets/img/login')}}/{{$data->backimgview}}" class="img-thumbnail" style="width:100">
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
            <form method="post" action="{{route('addupdsldlogin',$data->id)}}">
                @csrf
                @method('PUT')
                <input type="text" name="id" value="{{$data->id}}" hidden>
                <input type="text" name="indice" value="3" hidden>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                        <div class="col-sm-9">
                            <label>
                                <select class="form-control" name="level">
                                    @foreach (levelback() as $key=>$liste)
                                        {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                        <option value="{{$key}}" {{ $key==$data->level ? "selected" : "" }} >{{$liste}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>





                    <div class="form-group @error('linkv') is-invalid @enderror">
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
                        <label for="inputEmail3" class="col-sm-3 control-label">Langues</label>
                        <div class="col-sm-9">
                            <label>
                                <span class="btn-info"> EN {{$data->langues}}</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-xs-6">
                            <a href="{{route('listsldlogin')}}" class="btn btn-danger" type="button">Retour</a>
                        </div>
                        <div class="col-xs-6">
                            <label>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </label>
                        </div>
                    </div>



            </form>

        </div>




    </div>
{{--Mise a jours de background--}}


{{--Mise a jours de Logo--}}
<div class="modal fade" id="logo_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="post" action="{{route('addupdsldlogin',$data->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Logo Modification</h4>
            </div>
            <div class="modal-body">
                    <img src="{{asset('assets/img/login')}}/{{$data->backimgview}}" class="img-thumbnail" style="width:100">
                    <div>
                        <input type="text" name="id" value="{{$data->id}}" hidden>
                        <input type="text" name="indice" value="2" hidden>
                        <input type="file" name="backimgview">
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
