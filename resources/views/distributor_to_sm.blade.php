@extends('layout')

@section('content')

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12" align="center" style="margin-top:-12px;">
                            <h5 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class="fa fa-user"></span> <strong>Assign Dashboard</strong></h5>
                        </div>


                        @include('assign_team_menu')
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12" style="margin-top:-15px;">

                    <div class="panel panel-default">

                    @include('alert')

                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;DS To SM </h5>

                        </div>
                        <div class="col-md-2"></div>

                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                            <div class="form-group">
                                <form role="form" method="POST" action="{{route('create-ds_to_sm')}}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px;">
                                            <div class="col-md-3" style="margin-top:15px;"></div>
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Select Distributor<font color="#FF0000">*</font></label>

                                                <select class="form-control select " data-live-search="true" name="ds">

                                                    <option value="">Select</option>
                                                    @foreach ($ds as $dss)
                                                    <option value="{{$dss->id}}">{{$dss->Name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Select SM<font color="#FF0000">*</font></label>
                                                <select class="form-control select" data-live-search="true" name="sm[]" multiple="">
                                                    <option value="">Select</option>
                                                    @foreach ($sms as $sm)
                                                    <option value="{{$sm->id}}">{{$sm->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>




                                            <div class="col-md-2" style="margin-top:5.4vh;" align="left">

                                                <div class="input-group" style=" margin-bottom:15px;">

                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> Submit </button>
                                                </div>
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
                    <!-- 


                            <div class="col-md-3"></div> -->
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">

                            <div class="panel panel-default">
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i>&nbsp;DS To SM</h5>

                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <th>Name of Distributor</th>
                                                <!-- <th>Name of ASM</th>
                                            <th>Name of SP</th> -->
                                                <th>Name of SM</th>
                                                <!-- <th>City</th>
                                            <th>State</th> -->

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ds_to_sm as $ds_to_sm)
                                            <tr>
                                                <th>{{$loop->index+1}}</th>
                                                <td>{{$ds_to_sm->Name}}</td>
                                                <td>
                                                    @php
                                                    $a = explode(',', $ds_to_sm->sm_id);
                                                    $i=0;
                                                    $total_record=count($a);
                                                    @endphp
                                                    @foreach($a as $id)
                                                    @php
                                                    $i++;
                                                    $sm=App\Models\Salemanager::where('id',$id)->select('Name')->first();
                                                    echo $sm['Name'] ?? '';
                                                    echo $i!=$total_record ? ',' : '';

                                                    @endphp

                                                    @endforeach
                                                </td>


                                                <td>
                                                    <a href="{{route('edit-ds_to_sm',$ds_to_sm->id)}}"><button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                    </a>
                                                    <a onclick="return confirm('Are You Sure To Delete This?')" href="{{route('delete_ds_to_sm',$ds_to_sm->id)}}">
                                                        <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@stop