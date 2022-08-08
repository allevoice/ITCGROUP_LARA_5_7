@extends('template.thermadmin')

@section('title', 'Partner')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$data->titlepartner}}
            <a href="{{route('listpartner')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>


        <div class="col-md-4 col-sm-4">

                    <div class="col-sm-12">
                        @if ($data->backimgpartner == NULL)
                            <img src="{{asset('assets/img/partners/services-img1.jpg')}}" class="img-thumbnail">
                        @else
                            <img src="{{asset('assets/img/partners/')}}/{{$data->backimgpartner}}" class="img-thumbnail">
                        @endif
                        <div>
                            <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#back_{{$data->id}}">Edit</a>
                        </div>
                        <span id="helpBlock" class="help-block">
                             @if($errors->first('backimgpartner'))
                            <div class="alert alert-danger">{{ $errors->first('backimgpartner') }}</div>
                            @endif

                        <strong>Background image</strong>
                        Accept les format suivant PNG, JPG, JPEG...
                        </span>
                    </div>

                    <div class="col-sm-12">
                            <img src="{{asset('assets/img/partners/')}}/{{$data->imgpartner}}" class="img-thumbnail" style="width:80">
                        <div>
                            <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#logo_{{$data->id}}">Edit</a>
                        </div>
                        <span id="helpBlock" class="help-block">
                              @if($errors->first('imgpartner'))
                            <div class="alert alert-danger">{{ $errors->first('imgpartner') }}</div>
                            @endif
                        <strong>Logo</strong>
                        Accept les format suivant PNG, JPG
                        </span>
                    </div>
            </div>

            <div class="col-md-8 col-sm-8">

                <form method="post" action="{{route('addupdpartner',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" value="{{$data->id}}" hidden>
                    <input type="text" name="indice" value="3" hidden>

                    <div class="form-horizontal col-sm-12">

                        <div class="form-group @error('titlev') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="titlepartner" value="{{$data->titlepartner}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('titlepartner'))
                                <div class="alert alert-danger">{{ $errors->first('titlepartner') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group @error('titleservices') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Service</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="titleservices" value="{{$data->titleservices}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('titleservices'))
                                <div class="alert alert-danger">{{ $errors->first('titleservices') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group @error('descdetail') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Contenue</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  rows="3" name="servicepartner" placeholder="Votre contenu" >{{$data->servicepartner}}</textarea>
                                {{--@error('descdetail')--}}
                                {{--<div class="alert alert-danger">{{ $message }}</div>--}}
                                {{--@enderror--}}
                            </div>
                        </div>

                        <div class="form-group @error('linkv') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="linkpartner" value="{{$data->linkpartner}}" placeholder="url du site">
                                @if($errors->first('linkpartner'))
                                <div class="alert alert-danger">{{ $errors->first('linkpartner') }}</div>
                                @endif
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
{{--Mise a jours de background--}}

<div class="modal fade" id="back_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="post" action="{{route('addupdpartner',$data->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Background Modification</h4>
            </div>
            <div class="modal-body">
                @if ($data->backimgpartner == NULL)
                    <img src="{{asset('assets/img/partners/services-img1.jpg')}}" class="img-thumbnail">
                @else
                    <img src="{{asset('assets/img/partners/')}}/{{$data->backimgpartner}}" class="img-thumbnail">
                @endif
                
                <div>
                    <input type="text" name="id" value="{{$data->id}}" hidden>
                    <input type="text" name="indice" value="1" hidden>
                    <input type="file" name="backimgpartner">
                </div>
                <span id="helpBlock" class="help-block">
                Accept les format suivant PNG, JPG, JPEG...
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
{{--Mise a jours de background--}}

{{--Mise a jours de Logo--}}
<div class="modal fade" id="logo_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="post" action="{{route('addupdpartner',$data->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Logo Modification</h4>
            </div>
            <div class="modal-body">
                    <img src="{{asset('assets/img/partners/')}}/{{$data->imgpartner}}" class="img-thumbnail" style="width:80">
                    <div>
                        <input type="text" name="id" value="{{$data->id}}" hidden>
                        <input type="text" name="indice" value="2" hidden>
                        <input type="file" name="imgpartner">
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
