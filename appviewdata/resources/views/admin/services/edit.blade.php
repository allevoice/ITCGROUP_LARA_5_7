@extends('template.thermadmin')

@section('title', 'Services')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$show->title}}
            <a href="{{route('listserve')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>

        <form method="post" action="{{route('addupdserve',$show->id)}}">
            @csrf
            @method('PUT')
            <input type="text" name="id" value="{{$show->id}}" hidden>
            <input type="text" name="indice" value="1" hidden>

        <div class="col-md-9 col-sm-8" style="background-color: #95999c">

                <div class="form-horizontal">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="pull-right btn btn-primary">Save</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$show->codeservice}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Titre</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$show->title}}" name="title">
                        </div>
                        @if($errors->first('title'))
                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Titre info</label>
                        <div class="col-sm-10">
                            <textarea class="form-control myTextEditor" rows="3" name="titleinfo">{{$show->titleinfo}}</textarea>
                        </div>
                        @if($errors->first('titleinfo'))
                            <div class="alert alert-danger">{{ $errors->first('titleinfo') }}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="description">{{$show->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                            <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                            <div class="col-sm-9">
                                <label>
                                    <select class="form-control" name="status">
                                        @foreach (statuscmd() as $key=>$liste)
                                            {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                            <option value="{{$key}}"  {{ $key==$show->status ? "selected" : "" }} >{{$liste}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <label>
                                    <select class="form-control" name="level">
                                        @foreach (levelcmd() as $key=>$liste)
                                            {{--<option value="{{$key}}" selected='selected'>{{$liste}}</option>--}}
                                            <option value="{{$key}}" {{ $key==$show->level ? "selected" : "" }} >{{$liste}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">User</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{$show->iduser}}" readonly>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">Inscrit</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{$show->created_at}}" readonly>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">Update</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{$show->updated_at}}" readonly>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">Langue</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{$show->langues}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

        </form>

        <div class="col-md-3 col-sm-4">
            @if($show->blueicone !=NULL)
                <div class="col-xs-6">
                    <a href="{{route('editimgdata',$show->id.'-2')}}" title="Modification de l'image">
                        <img src="{{asset('assets/img/services/')}}/{{$show->blueicone}}" width="50px" height="50px">
                    </a>
                </div>
            @else
                <a href="{{route('editimgdata',$show->id.'-2')}}" title="Ajouter Une nouvelle">
                    <div class="col-xs-6">
                        <img src="{{asset('assets/img/services/newimg.jpg')}}" class="img-thumbnail">
                    </div>
                </a>
            @endif

            @if($show->whiteicone !=NULL)
                <a href="{{route('editimgdata',$show->id.'-3')}}" title="Modification de l'image">
                    <div class="col-xs-6">
                        <img src="{{asset('assets/img/services/')}}/{{$show->whiteicone}}" style="background-color: #0A0A0A" width="50px" height="50px">
                    </div>
                </a>
            @else
                <a href="{{route('editimgdata',$show->id.'-3')}}" title="Ajouter Une nouvelle">
                    <div class="col-xs-6">
                        <img src="{{asset('assets/img/services/newimg.jpg')}}" class="img-thumbnail">
                    </div>
                </a>
            @endif



            @if($show->img1 !=NULL)
                <a href="{{route('editimgdata',$show->id.'-4')}}" title="Modification de l'image">
                    <div class="col-xs-6">
                        <img src="{{asset('assets/img/services/')}}/{{$show->img1}}" class="img-thumbnail">
                    </div>
                </a>
            @else
                <a href="{{route('editimgdata',$show->id.'-4')}}" title="Ajouter Une nouvelle">
                    <div class="col-xs-6">
                        <img src="{{asset('assets/img/services/newimg.jpg')}}" class="img-thumbnail">
                    </div>
                </a>
            @endif

            </div>



        </div>


    </div>
{{--Mise a jours de background--}}




@endsection
