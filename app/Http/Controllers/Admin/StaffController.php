<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Staff;
use App\models\StaffDepartment;
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
        $data = Room::with('roomtype')->find($id);
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
        $roomType = RoomType::all();
        $data = Room::with('roomtype')->find($id);
        return view('admin.staff.edit')->with(compact('data','roomType'));
    
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
        $data = Room::find($id);
        $data->room_type_id =$request->roomtype;
        $data->title = $request->detail;
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
        Room::where('id',$id)->delete();
        return redirect('admin/rooms')->with('success','Data has been Deleted');
      
    }
}
