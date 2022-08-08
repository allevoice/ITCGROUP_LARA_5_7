@extends('template.thermadmin')

@section('title', 'Header')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Header page liste
        </h2>


        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">

                    {{--{{ $data->links('pagination::bootstrap-4') }}--}}

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th >Page</th>
                            <th >Groupe</th>
                            <th >Titre</th>
                            <th >Description</th>
                            <th class="row visible-lg">Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>



                        @forelse ($data as $show)
                            <tr  class="odd gradeX">
                                <td>{{detpageinfo($show->page,NULL)}}</td>
                                <td width="100">{{detpageinfo(NULL,$show->level)}}</td>
                                <td>{{$show->title}}</td>
                                <td class="row visible-lg">{{$show->description}}</td>
                                <td class="row visible-lg" >{{statuscmd($show->status)}}</td>

                                <td width="100">
                                        <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal_view_{{$show->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="{{route('editheaderpage',$show->id)}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
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

                                                <div class="form-horizontal">


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Page</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{detpageinfo($show->page,NULL)}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{detpageinfo(NULL,$show->level)}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Titre</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->title}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control myTextEditor" rows="5" readonly>{{$show->description}}" </textarea>
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
                                <td colspan="9"> <center> <a href="{{route('newinsertemptyheaderpage')}}">Ajout</a> </center> </td>
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
