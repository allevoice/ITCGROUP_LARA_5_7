@extends('template.thermadmin')

@section('title', 'Blogues')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$data->title}}
            <a href="{{route('listblog')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>


        <div class="col-md-4 col-sm-4">
                    <div class="col-sm-12">
                            <img src="{{asset('assets/img/blog')}}/{{$data->backimg}}" class="img-thumbnail" style="width:100">
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

            <div class="col-md-8 col-sm-8">

                <form method="post" action="{{route('addupdblog',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" value="{{$data->id}}" hidden>
                    <input type="text" name="indice" value="3" hidden>

                    <div class="form-horizontal col-sm-12">



                        <div class="form-group @error('namepost') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Poste Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="namepost" value="{{$data->namepost}}" placeholder="Titre De l'info bulble">
                                @if($errors->first('namepost'))
                                <div class="alert alert-danger">{{ $errors->first('namepost') }}</div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group @error('myTextEditor') is-invalid @enderror">
                            <div class="col-sm-12">
                                <textarea class="form-control" name="myTextEditor"  class="myTextEditor" rows="20" cols="96"   placeholder="Votre contenu" >{{$data->description}}</textarea>
                                @if($errors->first('myTextEditor'))
                                <div class="alert alert-danger">{{ $errors->first('myTextEditor') }}</div>
                                @endif
                            </div>
                        </div>







                        <div class="col-md-12">
                            <div class="col-md-9 text-left">
                                <div class="form-group @error('facelink') is-invalid @enderror">
                                    <label class="col-sm-3 control-label">Facebook</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="facelink" value="{{$data->facelink}}" placeholder="Titre De l'info bulble">
                                        @if($errors->first('facelink'))
                                        <div class="alert alert-danger">{{ $errors->first('facelink') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('inst') is-invalid @enderror">
                                    <label class="col-sm-4">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="facest">
                                            @foreach (statuscmdswitch() as $key=>$liste)
                                                {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                                <option value="{{$key}}"  {{ $key==$data->facest ? "selected" : "" }} >{{$liste}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-12">
                            <div class="col-md-9 text-left">
                                <div class="form-group @error('inlink') is-invalid @enderror">
                                    <label class="col-sm-3 control-label">Linked</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="inlink" value="{{$data->inlink}}" placeholder="Titre De l'info bulble">
                                        @if($errors->first('inlink'))
                                        <div class="alert alert-danger">{{ $errors->first('inlink') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-4">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="inst">
                                            @foreach (statuscmdswitch() as $key=>$liste)
                                                {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                                <option value="{{$key}}"  {{ $key==$data->inst ? "selected" : "" }} >{{$liste}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="col-md-9 text-left">
                                <div class="form-group @error('inlink') is-invalid @enderror">
                                    <label class="col-sm-3 control-label">Googel Plus</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="goopluslink" value="{{$data->goopluslink}}" placeholder="Titre De l'info bulble">
                                        @if($errors->first('goopluslink'))
                                        <div class="alert alert-danger">{{ $errors->first('goopluslink') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @error('inst') is-invalid @enderror">
                                    <label class="col-sm-4">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="gooplusst">
                                            @foreach (statuscmdswitch() as $key=>$liste)
                                                {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                                <option value="{{$key}}"  {{ $key==$data->gooplusst ? "selected" : "" }} >{{$liste}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="col-md-9 text-left">
                                <div class="form-group @error('inlink') is-invalid @enderror">
                                    <label class="col-sm-3 control-label">Tweeter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tweetlink" value="{{$data->tweetlink}}" placeholder="Titre De l'info bulble">
                                        @if($errors->first('tweetlink'))
                                        <div class="alert alert-danger">{{ $errors->first('tweetlink') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-4">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="tweetst">
                                            @foreach (statuscmdswitch() as $key=>$liste)
                                                {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                                <option value="{{$key}}"  {{ $key==$data->tweetst ? "selected" : "" }} >{{$liste}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="col-md-12">
                            <div class="col-md-6 text-left">
                                <div class="form-group @error('inlink') is-invalid @enderror">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Statut</label>
                                    <div class="col-sm-8">
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
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4">Level</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="level">
                                            @foreach (levelcmd() as $key=>$liste)
                                                {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                                <option value="{{$key}}"  {{ $key==$data->level ? "selected" : "" }} >{{$liste}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

















                        <div class="form-group @error('linkv') is-invalid @enderror">
                            <label for="inputEmail3" class="col-sm-3 control-label">Poste Date</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="yyyy/mm/dd" value="{{$data->post_date}}" name="postdate" class="form-control" required/>
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
{{--Mise a jours de background--}}


{{--Mise a jours de Logo--}}
<div class="modal fade" id="logo_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="post" action="{{route('addupdblog',$data->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Logo Modification</h4>
            </div>
            <div class="modal-body">
                    <img src="{{asset('assets/img/blog')}}/{{$data->backimg}}" class="img-thumbnail" style="width:100">
                    <div>
                        <input type="text" name="id" value="{{$data->id}}" hidden>
                        <input type="text" name="indice" value="2" hidden>
                        <input type="file" name="backimg">
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
