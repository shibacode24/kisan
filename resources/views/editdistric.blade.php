@extends('layout')

@section('content')



<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    @include('masterheader')

    <div class="row">
        <div class="col-md-12" style="margin-top:-15px;">

            <div class="panel panel-default">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;District </h5>

                </div>
                <div class="col-md-2"></div>


                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">
                        <form role="form" method="POST" action="{{route('update-distric')}}">
                            @csrf
                            <input type="hidden" placeholder=" " name="id" value="{{$distric_edit->id}}" class="form-control" required />
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top:-10px;">
                                    <div class="col-md-3" style="margin-top:15px;"></div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>State<font color="#FF0000">*</font></label>
                                        <select class="form-control select" data-live-search="true" name="state">
                                            @foreach ($states as $state)
                                            <option value="{{$state->id}}" @if($distric_edit->State_id==$state->id) selected @endif>{{$state->State_Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>District<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="dd" value="{{$distric_edit->District}}" class=" form-control" required />
                                    </div>

                                    <div class="col-md-2" style="margin-top:5vh;">

                                        <div class="input-group" style=" margin-bottom:15px;">
                                            <button type="submit" name="distric" value="Distric" class="btn btn-primary"><span class="fa fa-plus"></span> Update </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div>
            <div>
                <!-- END DEFAULT DATATABLE -->
                <!-- <div class="col-md-3"></div> -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i>Added District </h5>

                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr.no.</th>
                                            <th>State</th>
                                            <!-- <th>Selected ASM</th> -->
                                            <th>District</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($districs as $distric)
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$distric->State_Name}}</td>
                                            <td>{{$distric->District}}</td>
                                            <td>
                                                <a href="{{route('edit-distric',$distric->id)}}"><button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                </a>
                                                <a onclick="return confirm('Are You Sure To Delete This?')" href="{{route('destroy-distric',$distric->id)}}"><button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-2"></div>

                </div>


            </div>
        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@stop