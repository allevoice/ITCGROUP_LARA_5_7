@extends('template.thermadmin')

@section('title', 'Bringing')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Delete liste
            <a href="{{route('listadvisor')}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
        </h2>


        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">

                    {{--{{ $data->links('pagination::bootstrap-4') }}--}}

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th >Profile</th>
                            <th>Post</th>
                            <th class="row visible-lg">Media</th>
                            <th class="row visible-lg">Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                        @forelse ($data as $show)
                            <tr  class="odd gradeX">
                                <td class="center" width="100">
                                    <img src="{{asset('assets/img/about/')}}/{{$show->imgprofile}}" class="img-thumbnail" width="100">
                                </td>

                                <td width="100">{{$show->post}} <br>{{$show->spost}}</td>

                                <td class="row visible-lg">

                                    @if($show->facelink != null)
                                        @if($show->facest ==NULL OR $show->facest == 0)
                                            <p class="bg-danger">{{$show->facelink}}</p>
                                        @else
                                            <p class="bg-success">{{$show->facelink}}</p>
                                        @endif
                                    @else
                                    @endif


                                    @if($show->inlink != null)
                                        @if($show->inst ==NULL OR $show->inst == 0)
                                            <p class="bg-danger">{{$show->inlink}}</p>
                                        @else
                                            <p class="bg-success">{{$show->inlink}}</p>
                                        @endif
                                    @else
                                    @endif

                                    @if($show->tweetlink != null)
                                        @if($show->tweetst ==NULL OR $show->tweetst == 0)
                                            <p class="bg-danger">{{$show->tweetlink}}</p>
                                        @else
                                            <p class="bg-success">{{$show->tweetlink}}</p>
                                        @endif
                                    @else
                                    @endif

                                    @if($show->goopluslink != null)
                                        @if($show->gooplusst ==NULL OR $show->gooplusst == 0)
                                            <p class="bg-danger">{{$show->goopluslink}}</p>
                                        @else
                                            <p class="bg-success">{{$show->goopluslink}}</p>
                                        @endif
                                    @else
                                    @endif


                                </td>
                                <td class="row visible-lg" >{{statuscmd($show->status)}}</td>




                                <td width="100">
                                    <form action="{{route('advisordelete',$show->id)}}" method="post" class='form-inline'>
                                        @csrf
                                        @method('DELETE')

                                        <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal_view_{{$show->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="{{route('restdeladvisor',$show->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-transfer"></i></a>

                                        <script>
                                            function ConfirmDeletebutton()
                                            {
                                                return confirm("Are you sure you want to delete this Element definitly?");
                                            }
                                        </script>
                                        <button Onclick="return ConfirmDeletebutton();" type="submit" name="actiondelete" class=" form-group btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o "></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>





                            <div class="modal fade" id="myModal_view_{{$show->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Visual info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-sm-12">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <img src="{{asset('assets/img/about/')}}/{{$show->imgprofile}}" class="img-thumbnail" width="200">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">

                                                <div class="form-horizontal">

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Post</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->post}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Sous Post</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->spost}}" readonly>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Media</label>
                                                        <div class="col-sm-9">
                                                            Facebook:
                                                            @if($show->facelink != null)
                                                                @if($show->facest ==NULL OR $show->facest == 0)
                                                                    <span class="bg-danger">{{$show->facelink}}</span>
                                                                @else
                                                                    <span class="bg-success">Facebook: {{$show->facelink}}</span>
                                                                @endif
                                                            @else
                                                            @endif
                                                            <br>


                                                            Linkend:
                                                            @if($show->inlink != null)
                                                                @if($show->inst ==NULL OR $show->inst == 0)
                                                                    <span class="bg-danger">{{$show->inlink}}</span>
                                                                @else
                                                                    <span class="bg-success">{{$show->inlink}}</span>
                                                                @endif
                                                            @else
                                                            @endif
                                                            <br>

                                                            Tweeter:
                                                            @if($show->tweetlink != null)
                                                                @if($show->tweetst ==NULL OR $show->tweetst == 0)
                                                                    <span class="bg-danger">{{$show->tweetlink}}</span>
                                                                @else
                                                                    <span class="bg-success">{{$show->tweetlink}}</span>
                                                                @endif
                                                            @else
                                                            @endif
                                                            <br>

                                                            Google plus:
                                                            @if($show->goopluslink != null)
                                                                @if($show->gooplusst ==NULL OR $show->gooplusst == 0)
                                                                    <span class="bg-danger">{{$show->goopluslink}}</span>
                                                                @else
                                                                    <span class="bg-success">{{$show->goopluslink}}</span>
                                                                @endif
                                                            @else
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{statuscmd($show->status)}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">User</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->iduser}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Inscrit</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->created_at}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Update</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->updated_at}}" readonly>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        @empty
                            <tr>
                                <td colspan="9"> <center>No data</center> </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>


                    {{--{{ $data->links('pagination::bootstrap-4') }}--}}




                    </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>




    </div>



@endsection
