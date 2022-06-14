@extends('backend-layout.main-layout')
@section('content')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Staff  Payment</h6>
                <a href="{{ url('admin/staff') }}" class="btn btn-success btn-sm float-right">View All</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{Session::get('success')}}</p>
                <?php Session::forget('success');?>
                @endif
                <div class="table-responsive">
                    <form method="POST" action="{{url('admin/staff/payment/'.$staff_id)}}"> @csrf
                        <table class="table table-bordered" id="roomtype" width="100%" cellspacing="0">
                            <tr>
                                <th>Amount</th>
                                <td>
                                    <input type="number" name="amount"class="form-control" placeholder="Enter Amount"/>
                                </td>
                            </tr>
                           
                           
                            <tr>
                                <th>Date</th>
                                <td>
                                    <input type="date" name="amount_date" class="form-control">
                                    

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
