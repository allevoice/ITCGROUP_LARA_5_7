@extends('template.thermadmin')

@section('title', 'Footer Information')

@section('admincontenent')
    <div class="col-md-12">
        @php
            $ind_1 = 'Information de la Page';
            $ind_2 = 'Media publicitaire';
            $ind_3 = 'Information Map';
            $ind_4 = 'More';
        @endphp




        <h2>
            Editer
            <a href="{{route('listfooterdata')}}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>

        <form method="post" action="{{route('footerupdatedata',$data->id)}}">
            @csrf
            @method('PUT')

            @if($indice == '1')
                <fieldset>
                    <legend>Information de la Page </legend>
                    <input type="hidden" class="form-control" value="{{$indice}}" name="indice">
                    <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
                    <div class="col-sm-6 form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$data->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"  value="{{$data->email_2}}" name="email_2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$data->phone_1}}" name="phone_1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->phone_2}}" name="phone_2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->phone_3}}" name="phone_3">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Adresse </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->adresse}}" name="adresse">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Adresse </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->address_2}}" name="address_2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Town </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->town}}" name="town">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">State </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->states}}" name="states">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Code Zippe </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->zipcode}}" name="zipcode">
                            </div>
                        </div>
                    </div>
                </fieldset>
            @elseif($indice == '2')
                <fieldset>
                    <legend>Mediap</legend>
                    <input type="hidden" class="form-control" value="{{$indice}}" name="indice">
                    <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
                    <div class="col-sm-6 form-horizontal">
                        <div class="form-group">


                            <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-facebook-square"></span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->facelink}}" name="facelink">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                                        <div class="col-sm-9">
                                            <label>
                                                <select class="form-control" name="facest">
                                                    @foreach (statuscmd() as $key=>$liste)
                                                        <option value="{{$key}}"  {{ $key==$data->facest ? "selected" : "" }} >{{$liste}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-instagram"></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->instalink}}" name="instalink">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                                        <div class="col-sm-9">
                                            <label>
                                                <select class="form-control" name="instast">
                                                    @foreach (statuscmd() as $key=>$liste)
                                                        <option value="{{$key}}"  {{ $key==$data->instast ? "selected" : "" }} >{{$liste}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-linkedin-square"></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->inlink}}" name="inlink">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                                        <div class="col-sm-9">
                                            <label>
                                                <select class="form-control" name="inst">
                                                    @foreach (statuscmd() as $key=>$liste)
                                                        <option value="{{$key}}"  {{ $key==$data->inst ? "selected" : "" }} >{{$liste}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 form-horizontal">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-google-plus-square"></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->goopluslink}}" name="goopluslink">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                                        <div class="col-sm-9">
                                            <label>
                                                <select class="form-control" name="gooplusst">
                                                    @foreach (statuscmd() as $key=>$liste)
                                                        <option value="{{$key}}"  {{ $key==$data->gooplusst ? "selected" : "" }} >{{$liste}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"><span class="fa fa-2x fa-twitter-square"></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$data->tweetlink}}" name="tweetlink">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                                        <div class="col-sm-9">
                                            <label>
                                                <select class="form-control" name="tweetst">
                                                    @foreach (statuscmd() as $key=>$liste)
                                                        <option value="{{$key}}"  {{ $key==$data->tweetst ? "selected" : "" }} >{{$liste}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </fieldset>


            @elseif($indice == '3')
                <fieldset>
                    <legend>Information Map </legend>
                    <div class="col-sm-12">
                        <input type="hidden" class="form-control" value="{{$indice}}" name="indice">
                        <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
                        <textarea class="form-control myTextEditor" rows="6" cols="96" name="maplink">{{$data->maplink}}</textarea>
                    </div>
                </fieldset>
                <hr>
            @else
                <fieldset>
                    <legend>More</legend>
                    <input type="hidden" class="form-control" value="{{$indice}}" name="indice">
                    <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
                    <div class="col-sm-6 form-horizontal">

                        <div class="form-group">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Statut</label>
                                <div class="col-sm-9">
                                    <label>
                                        <select class="form-control" name="status">
                                            @foreach (statuscmd() as $key=>$liste)
                                                <option value="{{$key}}"  {{ $key==$data->status ? "selected" : "" }} >{{$liste}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>


                </fieldset>
            @endif

















                        <div class="form-group text-center">
                            <div class="col-xs-6">
                                <a href="{{route('listfooterdata')}}" class="btn btn-danger" type="button">Retour</a>
                            </div>
                            <div class="col-xs-6">
                                <label>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </label>
                            </div>
                        </div>



                </form>


    </div>


@endsection
