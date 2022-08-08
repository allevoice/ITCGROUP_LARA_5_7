@extends('template.thermadmin')

@section('title', 'Header')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$show->title}}
            <a href="{{route('listheaderpage')}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>


        <form method="post" action="{{route('addupdheaderpage',$show->id)}}">
            @csrf
            @method('PUT')
            <input type="text" name="id" value="{{$show->id}}" hidden>

        <div class="col-md-9 col-sm-8" style="background-color: #95999c">

                <div class="form-horizontal">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="pull-right btn btn-info">Save</button>
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
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control myTextEditor" rows="5" name="description">{{$show->description}}</textarea>
                        </div>
                        @if($errors->first('description'))
                            <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>



                    <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">Page</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{detpageinfo($show->page,NULL)}}" readonly>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{detpageinfo(NULL,$show->level)}}" readonly>
                            </div>
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




        </div>


    </div>
{{--Mise a jours de background--}}




@endsection
