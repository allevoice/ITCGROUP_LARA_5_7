@extends('template.thermadmin')

@section('title', 'Advisor')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            New Insert
            <a href="{{route('listadvisor')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>




            <div class="col-md-10 col-sm-8">

                <form method="post" action="{{route('insertadvisor')}}">
                    @csrf

                        <div class="form-horizontal col-sm-12">

                            <div class="form-group @error('title') is-invalid @enderror">
                                <label for="inputEmail3" class="col-sm-3 control-label">Titre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Titre De l'info bulble">
                                    @if($errors->first('title'))
                                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group @error('post') is-invalid @enderror">
                                <label for="inputEmail3" class="col-sm-3 control-label">Poste</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="post" value="{{old('post')}}" placeholder="Titre De l'info bulble">
                                    @if($errors->first('post'))
                                    <div class="alert alert-danger">{{ $errors->first('post') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group @error('spost') is-invalid @enderror">
                                <label for="inputEmail3" class="col-sm-3 control-label">Sous Postre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="spost" value="{{old('spost')}}" placeholder="Titre De l'info bulble">
                                    @if($errors->first('spost'))
                                    <div class="alert alert-danger">{{ $errors->first('spost') }}</div>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="col-md-9 text-left">
                                    <div class="form-group @error('facelink') is-invalid @enderror">
                                        <label class="col-sm-3 control-label">Facebook</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="facelink" value="{{old('facelink')}}" placeholder="Titre De l'info bulble">
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
                                                    <option value="{{$key}}"  {{ $key==old('facest')  ? "selected" : "" }} >{{$liste}}</option>
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
                                            <input type="text" class="form-control" name="inlink" value="{{old('inlink')}}" placeholder="Titre De l'info bulble">
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
                                                    <option value="{{$key}}"  {{  $key==old('inst')  ? "selected" : "" }} >{{$liste}}</option>
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
                                            <input type="text" class="form-control" name="goopluslink" value="{{old('goopluslink')}}" placeholder="Titre De l'info bulble">
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
                                                    <option value="{{$key}}"  {{ $key==old('gooplusst')  ? "selected" : "" }} >{{$liste}}</option>
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
                                            <input type="text" class="form-control" name="tweetlink" value="{{old('tweetlink')}}" placeholder="Titre De l'info bulble">
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
                                                    <option value="{{$key}}"  {{ $key==old('tweetst')  ? "selected" : "" }} >{{$liste}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                <a href="{{route('listadvisor')}}" class="btn btn-danger" type="button">Retour</a>
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
