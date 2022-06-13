<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;
class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::get();
        return view('admin.customer.index')->with(compact('data'));
    }

    public function create()
    {
        $data = Customer::all();
        return view('admin.customer.create')->with(compact('data'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required'
        ]);
        $data =  new Customer();
        $data->full_name =$request->full_name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
           $data->photo = $name;
        }
        $data->save();
        return  redirect('admin/customer/create')->with('success','Data has been added');
  
    }

    public function show($id)
    {
        $data = Customer::find($id);
        return view('admin.customer.show')->with(compact('data'));
    
      
    }

    public function edit($id)
    {
        $data = Customer::find($id);
        return view('admin.customer.edit')->with(compact('data'));
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required'
        ]);
        $data = Customer::find($id);
        $data->full_name =$request->full_name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->mobile = $request->mobile;
        $data->address = $request->address;
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
            $data->photo = $request->prev_photo;  
        }
        $data->save();
        return  redirect('admin/customer/'.$id.'/edit')->with('success','Data has been updated');
  
    }

   
    public function destroy($id)
    {
        Customer::where('id',$id)->delete();
        return redirect('admin/customer')->with('success','Data has been Deleted');
      
    }
}
