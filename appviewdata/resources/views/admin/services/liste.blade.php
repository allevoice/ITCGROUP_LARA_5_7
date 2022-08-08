@extends('template.thermadmin')

@section('title', 'Services')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Shows liste
            <a href="{{route('newserve')}}" class="btn btn-sm btn-primary">+</a>
            <a href="{{route('servelstdel')}}" class="btn btn-xs btn-danger">Del</a>
        </h2>


        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">

                    {{ $data->links('pagination::bootstrap-4') }}

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th >Icons</th>
                            <th >Galleries</th>
                            <th>Titre</th>
                            <th class="row visible-lg">Description</th>
                            <th class="row visible-lg">Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                        @forelse ($data as $show)
                            <tr  class="odd gradeX">
                                <td class="center" width="100">
                                    <img src="{{asset('assets/img/services/')}}/{{$show->blueicone}}" width="30px" height="30px">
                                    <img src="{{asset('assets/img/services/')}}/{{$show->whiteicone}}" style="background-color: #0A0A0A" width="30px" height="30px">
                                </td>
                                <td class="center" width="100">
                                    @if($show->img1 !=NULL)
                                            <img src="{{asset('assets/img/services/')}}/{{$show->img1}}" class="img-thumbnail">
                                    @else
                                            <img src="{{asset('assets/img/services/default/services-img1.jpg')}}" class="img-thumbnail">
                                    @endif
                                </td>

                                <td width="100">{{$show->title}}</td>

                                <td class="row visible-lg"  >
                                    {{$show->titleinfo}}
                                </td>
                                <td class="row visible-lg" >{{statuscmd($show->status)}}</td>




                                <td width="100">
                                    <form action="{{route('delserve',$show->id)}}" method="post" class='form-inline'>
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$show->id}}">

                                        <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal_view_{{$show->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="{{route('editserve',$show->id)}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a>

                                        <script>
                                            function ConfirmDeletebutton()
                                            {
                                                return confirm("Are you sure you want to delete?");
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
                                                    <div class="form-group col-sm-12">
                                                        <div class="col-sm-8 col-xs-6">
                                                            @if($show->img1 !=NULL)
                                                                <div class="col-xs-12">
                                                                    <img src="{{asset('assets/img/services/')}}/{{$show->img1}}" class="img-thumbnail">
                                                                </div>
                                                            @else
                                                                <div class="col-xs-12">
                                                                    <img src="{{asset('assets/img/services/default/services-img1.jpg')}}" class="img-thumbnail">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-4 col-xs-6">
                                                            <div class="col-xs-6">
                                                                <img src="{{asset('assets/img/services/')}}/{{$show->blueicone}}" width="50px" height="50px">
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <img src="{{asset('assets/img/services/')}}/{{$show->whiteicone}}" style="background-color: #0A0A0A" width="50px" height="50px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                                <div class="col-sm-12">

                                                    <div class="form-horizontal">

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Code</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" value="{{$show->codeservice}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Titre</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" value="{{$show->title}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Titre info</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control myTextEditor" rows="3" readonly>{{$show->titleinfo}}" </textarea>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Description</label>
                                                            <div class="col-sm-9">
                                                                {!! $show->description !!}
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


                    {{ $data->links('pagination::bootstrap-4') }}




                    </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>




    </div>



@endsection
