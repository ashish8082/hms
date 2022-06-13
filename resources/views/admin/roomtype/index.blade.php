@extends('backend-layout.main-layout')
@section('content')
<link href="{{url('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container-fluid">

    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types</h6>
            <a href="{{url('admin/roomtype/create')}}"class="btn btn-success btn-sm float-right">Add New</a>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{Session::get('success')}}</p>
            <?php Session::forget('success');?>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="roomtype" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>Price</th>
                            <th>Galary Images</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @if(isset($data) && $data!="")
                        @foreach ($data as $d)
                        <tr>
                            <td>
                             {{$d->id}}
                            </td>
                            <td>{{$d->title}}</td>
                            <td>{{$d->amount}}</td>
                            <td>{{count($d->roomtypeimgs)}}</td>
                            <td>{{$d->detail}}</td>
                            <td>
                                <a href="{{url('admin/roomtype/'.$d->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
                                <a href="{{url('admin/roomtype/'.$d->id.'/edit')}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are you sure to delete this data ?')" href="{{url('admin/roomtype/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                       
                        @endif
                   </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@section('scripts')
<!-- /.container-fluid -->
 <!-- Page level plugins -->
 <script src="{{url('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

 <script>
     // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#roomtype').DataTable();
});

 </script>
@endsection
@endsection