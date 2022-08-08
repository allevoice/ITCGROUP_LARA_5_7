@extends('template.thermadmin')

@section('title', 'Bannners')

@section('admincontenent')
    <div class="col-md-12">
        <h2>
            Banners liste
            <a href="{{route('newslide')}}" class="btn btn-sm btn-primary">+</a>
            <a href="{{route('slidelstdel')}}" class="btn btn-xs btn-danger">Del</a>
        </h2>


        @if(session()->has('sms_error'))
            <div class="alert alert-danger">
                {{ session()->get('sms_error') }}
            </div>
        @endif


        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">

                    {{ $data->links('pagination::bootstrap-4') }}

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th >Logo</th>
                            <th >Images</th>
                            <th>Titre</th>
                            <th>Url</th>
                            <th class="row visible-lg">Description</th>
                            <th class="row visible-lg">Status</th>
                            <th class="row visible-lg">level</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                        @forelse ($data as $show)
                            <tr  class="odd gradeX {{$show->level== 1 ? 'info' : ''}}">
                                <td class="center" width="100">
                                    @if($show->logoview !=NULL)
                                        <img src="{{asset('assets/img/slideshow/')}}/{{$show->logoview}}" width="50px">
                                    @else
                                        <img src="{{asset('assets/img/slideshow/default/small-logo.png')}}" width="50px">
                                    @endif
                                </td>
                                <td class="center" width="100">
                                    @if($show->backimgview !=NULL)
                                        <img src="{{asset('assets/img/slideshow/')}}/{{$show->backimgview}}" class="img-thumbnail">
                                    @else
                                        <img src="{{asset('assets/img/slideshow/default/home-defaults.jpg')}}" class="img-thumbnail">
                                    @endif
                                </td>

                                <td width="100">{{$show->title}}</td>
                                <td width="100">{{$show->link}}</td>
                                <td class="row visible-lg">{{$show->description}}</td>

                                <td class="row visible-lg" >{{statuscmd($show->status)}}</td>
                                <td class="row visible-lg" >{{levelback($show->level)}}</td>


                                <td width="100">
                                    <form action="{{route('delslide',$show->id)}}" method="post" class='form-inline'>
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$show->id}}">

                                        <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal_view_{{$show->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="{{route('editslide',$show->id)}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a>

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
                                                        @if($show->backimgview !=NULL)
                                                            <img src="{{asset('assets/img/slideshow/')}}/{{$show->backimgview}}" class="img-thumbnail">
                                                        @else
                                                            <img src="{{asset('assets/img/slideshow/default/home-defaults.jpg')}}" class="img-thumbnail">
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-4 col-xs-6">
                                                        @if($show->logoview !=NULL)
                                                            <img src="{{asset('assets/img/slideshow/')}}/{{$show->logoview}}" class="img-thumbnail">
                                                        @else
                                                            <img src="{{asset('assets/img/slideshow/default/small-logo.png')}}" class="img-thumbnail">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>





                                            <div class="col-sm-12">

                                                <div class="form-horizontal">

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Titre</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->title}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Url</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{$show->link}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control myTextEditor" rows="5" readonly>{{$show->description}}" </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="{{levelback($show->level)}}" readonly>
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
