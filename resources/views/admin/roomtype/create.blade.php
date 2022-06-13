@extends('backend-layout.main-layout')
@section('content')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room Types</h6>
                <a href="{{ url('admin/roomtype') }}" class="btn btn-success btn-sm float-right">View All</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
                @if(Session::has('success'))
                <p class="text-success">{{Session::get('success')}}</p>
                <?php Session::forget('success');?>
                @endif
                <div class="table-responsive">
                    <form method="POST" action="{{url('admin/roomtype')}}" enctype="multipart/form-data"> @csrf
                        <table class="table table-bordered" id="roomtype" width="100%" cellspacing="0">
                            <tr>
                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><input type="number" name="price" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Gallery</th>
                                <td><input type="file" name="imgs[]" multiple></td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea name="detail" class="form-control"></textarea>
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
@endsection
