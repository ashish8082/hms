@extends('backend-layout.main-layout')
@section('content')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Staff </h6>
                <a href="{{ url('admin/staff') }}" class="btn btn-success btn-sm float-right">View All</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{Session::get('success')}}</p>
                <?php Session::forget('success');?>
                @endif
                <div class="table-responsive">
                    <form method="POST" action="{{url('admin/staff')}}" enctype="multipart/form-data"> @csrf
                        <table class="table table-bordered" id="roomtype" width="100%" cellspacing="0">
                            <tr>
                                <th>Full Name</th>
                                <td>
                                    <input type="text" name="full_name"class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Select Department </th>
                                <td>
                                    <select name="department_id" id="roomtype" class="form-control">
                                        <option value="">---------Select-------</option>
                                        @foreach ($department as $d)
                                            <option value="{{$d->id}}">{{$d->title}}</option>   
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <input type="file" name="photo">
                                </td>
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td>
                                    <textarea name="bio" class="form-control"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Salary Type</th>
                                <td>
                                    <input type="radio" name="salary_type" value="daily"> &nbsp;Daily &nbsp;
                                    <input type="radio" name="salary_type" value="monthly">&nbsp; Monthly
                                    

                                </td>
                            </tr>
                            <tr>
                                <th>Salary Amount</th>
                                <td>
                                    <input type="number" name="salary_amount" class="form-control">
                                    

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
