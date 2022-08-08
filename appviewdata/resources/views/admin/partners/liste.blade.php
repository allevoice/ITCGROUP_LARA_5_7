@extends('template.thermadmin')

@section('title', 'Partner')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Partners liste
            <a href="{{route('newpartner')}}" class="btn btn-sm btn-primary">+</a>
            <a href="{{route('listedelpartener')}}" class="btn btn-xs btn-danger">Del</a>
        </h2>


        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">

                    {{ $partner->links('pagination::bootstrap-4') }}

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th >Image</th>
                            <th >Logo</th>
                            <th>Titre</th>
                            <th class="row visible-lg">Service</th>
                            <th class="row visible-lg">Status</th>
                            <th class="row visible-lg">Level</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                        @forelse ($partner as $show)
                            <tr  class="odd gradeX
                            @if ($show->status == NULL and $show->status == 0 and empty($show->status))
                                danger
                            @endif
                                ">

                                <td class="center"  width="120">
                                    @if ($show->backimgpartner == NULL)
                                        <img src="{{asset('assets/img/partners/services-img1.jpg')}}" class="img-thumbnail" style="width:80">
                                    @else
                                        <img src="{{asset('assets/img/partners/')}}/{{$show->backimgpartner}}" class="img-thumbnail" style="width:80">
                                    @endif
                                </td>

                                <td class="center" width="50">
                                        <img src="{{asset('assets/img/partners/')}}/{{$show->imgpartner}}" class="img-circle" width="100">
                                </td>

                                <td>{{$show->titlepartner}}</td>

                                <td class="row visible-lg">
                                    {{--{{$show->servicepartner}}--}}
                                    {!! html_entity_decode($show->servicepartner) !!}
                                </td>
                                <td class="row visible-lg">{{statuscmd($show->status)}}</td>
                                <td class="row visible-lg">{{levelcmd($show->level)}}</td>

                                <td>
                                    <form action="{{route('delpartner',$show->id)}}" method="post" class='form-inline'>
                                        @csrf
                                        @method('DELETE')

                                        <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal_view_{{$show->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="{{route('editpartner',$show->id)}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a>

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
                                                <h4 class="modal-title" id="myModalLabel">{{$show->titlepartner}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        @if ($show->backimgpartner == NULL)
                                                            <img src="{{asset('assets/img/partners/services-img1.jpg')}}" class="img-thumbnail" style="width:80">
                                                        @else
                                                            <img src="{{asset('assets/img/partners/')}}/{{$show->backimgpartner}}" class="img-thumbnail" style="width:80">
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <img src="{{asset('assets/img/partners/')}}/{{$show->imgpartner}}" class="img-circle">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">

                                                    <div class="form-horizontal">


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Titre</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" value="{{$show->titlepartner}}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Service</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" value="{{$show->titleservices}}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Link</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" value="{{$show->linkpartner}}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Services</label>
                                                            <div class="col-sm-9">
                                                                {!! html_entity_decode($show->servicepartner) !!}
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" value="{{statuscmd($show->status)}}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Level</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" value="{{levelcmd($show->level)}}" readonly>
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


                    {{ $partner->links('pagination::bootstrap-4') }}




                    </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>




    </div>



@endsection
