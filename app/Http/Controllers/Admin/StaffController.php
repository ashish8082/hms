<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Staff;
use App\models\StaffDepartment;
use App\models\StaffPayment;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::get();
        return view('admin.staff.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = StaffDepartment::all();

        return view('admin.staff.create')->with(compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  new Staff();
        $data->full_name =$request->full_name;
        $data->department_id =$request->department_id;
        $data->bio =$request->bio;
        $data->salary_type =$request->salary_type;
        $data->salary_amt =$request->salary_amount;
        if ($request->hasFile('photo'))
        {
           $image = $request->file('photo');
           $name = time().'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path('/images');
           $image->move($destinationPath, $name);
          $data->photo = $name;
       }
        $data->save();
        return  redirect('admin/staff/create')->with('success','Data has been added');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Staff::find($id);
        return view('admin.staff.show')->with(compact('data'));
    
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = StaffDepartment::all();

        $data = Staff::find($id);
        return view('admin.staff.edit')->with(compact('data','department'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Staff::find($id);
        $data->full_name =$request->full_name;
        $data->department_id =$request->department_id;
        $data->bio =$request->bio;
        $data->salary_type =$request->salary_type;
        $data->salary_amt =$request->salary_amount;
        if ($request->hasFile('photo'))
        {
           $image = $request->file('photo');
           $name = time().'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path('/images');
           $image->move($destinationPath, $name);
          $data->photo = $name;
       }
       else 
       {
        $data->photo =$request->prev_photo;
       }
        $data->save();
        return  redirect('admin/staff/'.$id.'/edit')->with('success','Data has been Updated');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::where('id',$id)->delete();
        return redirect('admin/staff')->with('success','Data has been Deleted');
      
    }
    public function add_payment($staff_id)
    {
        return view('admin.staffpayment.add')->with('staff_id',$staff_id);
    }
    public function save_payment(Request $request,$staff_id)
    {
        
        $data =  new StaffPayment();
        $data->staff_id =$staff_id;
        $data->amount =$request->amount;
        $data->payment_date =$request->amount_date;
        $data->save();
        return  redirect('admin/staff/payment/'.$staff_id.'/add')->with('success','Data has been added');
  
    }
}
