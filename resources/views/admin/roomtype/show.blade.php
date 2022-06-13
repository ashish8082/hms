@extends('backend-layout.main-layout')
@section('content')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$data->title}}</h6>
                <a href="{{ url('admin/roomtype') }}" class="btn btn-success btn-sm float-right">View All</a>
            </div>
            <div class="card-body">
              
                <div class="table-responsive">
                        <table class="table table-bordered" id="roomtype" width="100%" cellspacing="0">
                            <tr>
                                <th>Title</th>
                                <td>{{$data->title}}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{$data->amount}}</td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    {{$data->detail}}
                                </td>
                            </tr>
                            <tr>
                                <th>Galary Images</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                                @foreach ($data['roomtypeimgs'] as $img_data)
                                                    <td class="imgcol{{$img_data->id}}">
                                                         <img src="{{url('images/'.$img_data->img_src)}}" alt="{{$data->img_alt}}" width="100px" height="100px">
                                                         
                                                    </td>
                                                @endforeach
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>

    </div>
@endsection
