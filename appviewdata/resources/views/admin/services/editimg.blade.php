@extends('template.thermadmin')

@section('title', 'Services')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$show->title}}
            <a href="{{route('editserve',$show->id)}}" class="btn btn-md btn-danger"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>



        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="{{route('addupdserve',$show->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="id" value="{{$show->id}}" hidden>

                @if($nameimg == 2)
                    <div class="col-sm-5 col-xs-12">
                        @if($show->blueicone !=NULL)
                            <img src="{{asset('assets/img/services/')}}/{{$show->blueicone}}" width="50px" height="50px">
                        @else
                            <img src="{{asset('assets/img/services/newimg.jpg')}}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div>
                            <input type="text" name="indice" value="2" hidden>
                            <input type="file" name="blueicone">
                            @if($errors->first('blueicone'))
                            <div class="alert alert-danger">{{ $errors->first('blueicone') }}</div>
                            @endif
                        </div>
                        <span id="helpBlock" class="help-block">Accept les format suivant PNG, JPG </span>
                    </div>
                @elseif($nameimg == 3)
                    <div class="col-sm-5 col-xs-12">
                        @if($show->whiteicone !=NULL)
                            <img src="{{asset('assets/img/services/')}}/{{$show->whiteicone}}" style="background-color: #0A0A0A" width="50px" height="50px">
                        @else
                            <img src="{{asset('assets/img/services/newimg.jpg')}}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div>
                            <input type="text" name="indice" value="3" hidden>
                            <input type="file" name="whiteicone">
                            @if($errors->first('whiteicone'))
                            <div class="alert alert-danger">{{ $errors->first('whiteicone') }}</div>
                            @endif
                        </div>
                        <span id="helpBlock" class="help-block">Accept les format suivant PNG, JPG </span>
                    </div>
                @elseif($nameimg == 4)
                    <div class="col-sm-5 col-xs-12">
                        @if($show->img1 !=NULL)
                            <img src="{{asset('assets/img/services/')}}/{{$show->img1}}" class="img-thumbnail">
                        @else
                            <img src="{{asset('assets/img/services/newimg.jpg')}}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div>
                            <input type="text" name="indice" value="4" hidden>
                            <input type="file" name="img1">
                            @if($errors->first('img1'))
                            <div class="alert alert-danger">{{ $errors->first('img1') }}</div>
                            @endif
                        </div>
                        <span id="helpBlock" class="help-block">Accept les format suivant PNG, JPG </span>
                    </div>
                @endif














                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="pull-right btn btn-primary">Save</button>
                    </div>
                </div>
            </form>


        </div>









    </div>
{{--Mise a jours de background--}}




@endsection
