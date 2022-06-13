<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaffDepartment;
class StaffDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StaffDepartment::get();
        return view('admin.department.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  new StaffDepartment();
        $data->title =$request->title;
        $data->detail = $request->detail;
        $data->save();
        return  redirect('admin/department/create')->with('success','Data has been added');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = StaffDepartment::find($id);
        return view('admin.department.show')->with(compact('data'));
    
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = StaffDepartment::find($id);
        return view('admin.department.edit')->with(compact('data'));
    
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
        $data = StaffDepartment::find($id);
        $data->title =$request->title;
        $data->detail = $request->detail;
        $data->save();
        return  redirect('admin/department/'.$id.'/edit')->with('success','Data has been Updated');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaffDepartment::where('id',$id)->delete();
        return redirect('admin/department')->with('success','Data has been Deleted');
      
    }
}
