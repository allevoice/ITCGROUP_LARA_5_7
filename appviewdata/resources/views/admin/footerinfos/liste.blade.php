@extends('template.thermadmin')

@section('title', 'Footer Information')

@section('admincontenent')
    <div class="col-md-12">
        <h2>Footer Information</h2>

        @forelse ($data as $show)
            <fieldset>
                <legend>Information de la Page <a href="{{route('editfooterdata',$show->id.'-1')}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a></legend>

                <div class="col-sm-6 form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$show->email}}" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control"  value="{{$show->email_2}}" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$show->phone_1}}" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->phone_2}}" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->phone_3}}" readonly="readonly">
                        </div>
                    </div>


                </div>

                <div class="col-sm-6 form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Adresse </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->adresse}}" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Adresse </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->address_2}}" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Town </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->town}}" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">State </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->states}}" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Code Zippe </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->zipcode}}" readonly="readonly">
                        </div>
                    </div>
                </div>

            </fieldset>



            <fieldset>
                <legend>Mediap <a href="{{route('editfooterdata',$show->id.'-2')}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a></legend>

                <div class="col-sm-6 form-horizontal">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-facebook-square"></span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->facelink}}" readonly="readonly">
                            Lien Facebook
                            @if(isset($show->facelink) AND !empty($show->facelink))
                                @if($show->facest == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Desactive</span>
                                @endif
                            @else
                                <span class="label label-default">n'existe pas</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-instagram"></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->instalink}}" readonly="readonly">
                            Lien Instagram
                            @if(isset($show->instalink) AND !empty($show->instalink))
                                @if($show->instast == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Desactive</span>
                                @endif
                            @else
                                <span class="label label-default">n'existe pas</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-linkedin-square"></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->inlink}}" readonly="readonly">
                            Lien LinkedIn
                            @if(isset($show->inlink) AND !empty($show->inlink))
                                @if($show->inst == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Desactive</span>
                                @endif
                            @else
                                <span class="label label-default">n'existe pas</span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 form-horizontal">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-google-plus-square"></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->goopluslink}}" readonly="readonly">
                            Lien Google plus
                            @if(isset($show->goopluslink) AND !empty($show->goopluslink))
                                @if($show->gooplusst == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Desactive</span>
                                @endif
                            @else
                                <span class="label label-default">n'existe pas</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-twitter-square"></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->tweetlink}}" readonly="readonly">
                            Lien twitter
                            @if(isset($show->tweetlink) AND !empty($show->tweetlink))
                                @if( $show->tweetst == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Desactive</span>
                                @endif
                            @else
                                <span class="label label-default">n'existe pas</span>
                            @endif
                        </div>
                    </div>
                </div>

            </fieldset>



            <fieldset>
                <legend>Information Map <a href="{{route('editfooterdata',$show->id.'-3')}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a></legend>
                <div class="col-sm-12">
                    {!! $show->maplink !!}
                </div>
            </fieldset>

            <fieldset>
                <legend>More <a href="{{route('editfooterdata',$show->id.'-4')}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a></legend>
                <div class="col-sm-6 form-horizontal">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{statuscmd($show->status)}}" readonly="readonly">
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">langues</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="{{$show->langues}}" readonly="readonly">
                        </div>
                    </div>
                </div>

            </fieldset>

        @empty
           <center><a href="{{route('addstfooterdata')}}">New Default Data</a></center>


        @endforelse















        <!--End Advanced Tables -->
    </div>




    </div>



@endsection
