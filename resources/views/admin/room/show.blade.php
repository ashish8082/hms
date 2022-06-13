@extends('backend-layout.main-layout')
@section('content')
<link href="{{url('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container-fluid">

    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms</h6>
            <a href="{{url('admin/rooms/create')}}"class="btn btn-success btn-sm float-right">Add New</a>
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
                            <th>RoomType</th>
                            <th>title</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @if(isset($data) && $data!="")
                        <tr>
                            <td>
                                {{$data->id}}
                            </td>
                            <td>{{$data->roomtype->title}}</td>
                            <td>{{$data->title}}</td>
                          
                        </tr>    
                       
                        @endif
                   </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
{{-- @section('scripts')
<!-- /.container-fluid -->
 <!-- Page level plugins -->
 <script src="{{url('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

 <script>
     // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#room').DataTable();
});

 </script>
@endsection --}}
@endsection