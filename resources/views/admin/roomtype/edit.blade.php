@extends('backend-layout.main-layout')
@section('content')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update {{$data->title}}</h6>
                <a href="{{ url('admin/roomtype') }}" class="btn btn-success btn-sm float-right">View All</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{Session::get('success')}}</p>
                <?php Session::forget('success');?>
                @endif
                <div class="table-responsive">
                    <form method="POST" action="{{url('admin/roomtype/'.$data->id)}}" enctype="multipart/form-data"> @csrf
                        @method('put')
                        <table class="table table-bordered" id="roomtype" width="100%" cellspacing="0">
                            <tr>
                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control" value="{{$data->title}}" /></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><input type="number" name="price" class="form-control" value="{{$data->amount}}" /></td>
                            </tr>
                           
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea name="detail" class="form-control">{{$data->detail}}</textarea>    
                                </td>
                            </tr>
                            <tr>
                                <th>Galary Images</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                                <input type="file" name="imgs[]" multiple>
                                                @foreach ($data['roomtypeimgs'] as $img_data)
                                                    <td class="imgcol{{$img_data->id}}">
                                                         <img src="{{url('images/'.$img_data->img_src)}}" alt="{{$data->img_alt}}" width="100px" height="100px">
                                                         <p class="mt-2"><button type="button" onclick="return confirm('Are you sure you want to delete  this image??')" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img_data->id}}"><i class="fa fa-trash-alt"></i></button></p>
                                                    </td>
                                                @endforeach
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".delete-image").on("click",function(){
                var image_id = $(this).attr('data-image-id');
                var _vm = $(this);

                $.ajax({
                    url:"{{url('admin/roomtypeimage/delete')}}/"+image_id,
                    dataType: 'json',
                    // data:{image_id:image_id},
                    beforeSend:function()
                    {
                    _vm.addClass('disabled');
                    },

                    success:function(data)
                    {
                        $(".imgcol"+image_id).remove();
                        _vm.removeClass();
                    
                    },
                    error:function(e)
                    {
                        alert(e);
                    }

                });
            });
        });
    </script>
    @endsection
@endsection
