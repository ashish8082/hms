@extends('backend-layout.main-layout')
@section('content')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Customer </h6>
                <a href="{{ url('admin/customer') }}" class="btn btn-success btn-sm float-right">View All</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                @endif
                @if (Session::has('success'))
                    <p class="text-success">{{ Session::get('success') }}</p>
                    <?php Session::forget('success'); ?>
                @endif
                <div class="table-responsive">
                    <form method="POST" action="{{ url('admin/customer') }}" enctype="multipart/form-data"> @csrf
                        <table class="table table-bordered" id="customer" width="100%" cellspacing="0">

                            <tr>
                                <th>Full Name <span class="text-danger">*</span></th>
                                <td>
                                    <input type="text" name="full_name" class="form-control"
                                        placeholder="Enter Full Name" />
                                </td>
                            </tr>
                            <tr>
                                <th>Email <span class="text-danger">*</span></th>
                                <td>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" />
                                </td>
                            </tr>
                            <tr>
                                <th>Password <span class="text-danger">*</span></th>
                                <td>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter Password" />
                                </td>
                            </tr>
                            <tr>
                                <th>Mobile Number <span class="text-danger">*</span></th>
                                <td>
                                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile No" />
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <textarea name="address" class="form-control" placeholder="Enter Address"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td> <input type="file" name="photo"></td>
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
