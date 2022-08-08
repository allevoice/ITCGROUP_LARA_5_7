@extends('template.thermadmin')

@section('title', 'Banners')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Editer {{$show->title}}
            <a href="{{route('editslide',$show->id)}}" class="btn btn-md btn-danger"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>



        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="{{route('addupdslide',$show->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="id" value="{{$show->id}}" hidden>

                @if($nameimg == 2)
                    <div class="col-sm-5 col-xs-12">
                        @if($show->logoview !=NULL)
                            <img src="{{asset('assets/img/slideshow/')}}/{{$show->logoview}}" class="img-thumbnail">
                        @else
                            <img src="{{asset('assets/img/newimg.jpg')}}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div>
                            <input type="text" name="indice" value="2" hidden>
                            <input type="file" name="logoview">                            
							@if($errors->first('logview')!= NULL)
								<div class="alert alert-danger">{{ $errors->first('logview')}}</div>
							@endif
							
							
                        </div>
                        <span id="helpBlock" class="help-block">Accept les format suivant PNG, JPG </span>
                    </div>





                @elseif($nameimg == 3)
                    <div class="col-sm-5 col-xs-12">
                        @if($show->backimgview !=NULL)
                            <img src="{{asset('assets/img/slideshow/')}}/{{$show->backimgview}}" class="img-thumbnail">
                        @else
                            <img src="{{asset('assets/img/newimg.jpg')}}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div>
                            <input type="text" name="indice" value="3" hidden>
                            <input type="file" name="backimgview">
							@if($errors->first('backimgview')!= NULL)
								<div class="alert alert-danger">{{ $errors->first('backimgview')}}</div>
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
