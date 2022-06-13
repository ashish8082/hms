@extends('backend-layout.main-layout')
@section('content')
<link href="{{url('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container-fluid">

    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Department</h6>
            <a href="{{url('admin/department/create')}}"class="btn btn-success btn-sm float-right">Add Department</a>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{Session::get('success')}}</p>
            <?php Session::forget('success');?>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="room" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @if(isset($data) && $data!="")
                        <tr>
                            <td>
                                {{$data->id}}
                            </td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->detail}}</td>
                          
                        </tr>    
                       
                        @endif
                   </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection