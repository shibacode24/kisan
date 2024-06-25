@extends('layout')

@section('content')


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <div class="form-group">
                                    <div class="col-md-12" align="center" style="margin-top:-12px;">
                                        <h5 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class="fa fa-user"></span> <strong>Master Dashboard</strong></h5>
                                    </div>

                                    <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                                        <a href="area_master.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>Area Master</button></a>
                                        <a href="role_master.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>Role</button></a>
                                        <a href="state.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>State</button></a>
                                        <a href="district.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>District</button></a>
                                        <a href="tehsil.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>Tehsil</button></a>
                                        <a href="city.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>City</button></a>

                                    </div>
                                </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top:-15px;">

            <div class="panel panel-default">
         @include('alert')
                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;CEO Registration </h5>

				    
				
                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">
                    @if(count($errors)>0)
                     <ul class="alert alert-danger">
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                         @endforeach
                     </ul>
                     @endif

                     <form role="form" method="POST" action="{{ route('update-ceo') }}">
                        @csrf
                        <input type="hidden" placeholder=" " name="id" value="{{$ceo_edit->id}}" class="form-control" required />

                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group" style="margin-top:-10px;">
                            
                                <div class="col-md-2" style="margin-top:15px;">
                                    <label>Name<font color="#FF0000">*</font></label>
                                    <input type="text" placeholder=" " name="Name" value="{{$ceo_edit->Name}}" class="form-control"
                                        required />
                                </div>

                                <div class="col-md-2" style="margin-top:15px;">
                                    <label>Mobile Number<font color="#FF0000">*</font></label>
                                    <input type="text" placeholder=" " name="Mobile_Number" value="{{$ceo_edit->Mobile_Number}}" class="form-control"
                                    maxlength="10"    required />
                                </div>

                                <div class="col-md-2" style="margin-top:15px;">
                                    <label>Username<font color="#FF0000">*</font></label>
                                    <input type="text" placeholder=" " name="Username" value="{{$ceo_edit->Username}}" class="form-control"
                                        required />
                                </div>

                                <div class="col-md-2" style="margin-top:15px;">
                                    <label>Password<font color="#FF0000">*</font></label>
                                    <input type="text" placeholder=" " name="Password" class="form-control">
                                </div>

                                <div class="col-md-2" style="margin-top:5vh;">

                                    <div class="input-group" style=" margin-bottom:15px;">
                                        <button type="submit" name="ceo" value="ceo"
                                            class="btn btn-primary"><span class="fa fa-plus"></span> Add </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
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
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> Registered CEO </h5>

                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr.no.</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ceos as $ceo)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $ceo->Name }}</td>
                                                <td >{{ $ceo->Mobile_Number }}</td>
                                                <td>{{ $ceo->Username }}</td>
                                                <td>
                                                    <a href="{{ route('edit-ceo', $ceo->id) }}"><button
                                                            style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                                            data-placement="top" title="Edit "><i class="fa fa-edit"
                                                                style="margin-left:5px;"></i></button>
                                                    </a>
                                                    <a onclick="return confirm('Are You Sure To Delete This?')"
                                                        href="{{ route('destroy-ceo', $ceo->id) }}">
                                                        <button
                                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                                            data-placement="top" title="Delete "><i
                                                                class="fa fa-trash-o"
                                                                style="margin-left:5px;"></i></button>
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

    <script>
     var msg = '{{Session::get('
     alert ')}}';
     var exist = '{{Session::has('
     alert ')}}';
     if (exist) {
         alert(msg);
     }
 </script>

</div>
<!-- END PAGE CONTAINER -->
@stop
