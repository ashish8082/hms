<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\RoomTypeimage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RoomType::all();
        return view('admin.roomtype.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);
        $data =  new RoomType();
        $data->title =$request->title;
        $data->amount =$request->price;
        $data->detail = $request->detail;
        $data->save();
        foreach($request->file('imgs') as $img)
        {       
               $name = "room".rand(1,999).'.'.$img->extension();
               $destinationPath = public_path('/images');
               $img->move($destinationPath, $name);
               $imgData = new RoomTypeimage();
               $imgData->room_type_id= $data->id;
               $imgData->img_src =$name ;
               $imgData->img_alt =$request->title;
               $imgData->save();
             
        }
        return  redirect('admin/roomtype/create')->with('success','Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RoomType::find($id);
        return view('admin.roomtype.show')->with(compact('data'));
    
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RoomType::find($id);
        return view('admin.roomtype.edit')->with(compact('data'));
    
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
        $data = RoomType::find($id);
        $data->title =$request->title;
        $data->amount =$request->price;
        $data->detail = $request->detail;
        $data->save();
        if($request->file('imgs'))
        {
            foreach($request->file('imgs') as $img)
            {       
               $name = "room".rand(1,999).'.'.$img->extension();
               $destinationPath = public_path('/images');
               $img->move($destinationPath, $name);
               $imgData = new RoomTypeimage();
               $imgData->room_type_id= $data->id;
               $imgData->img_src =$name ;
               $imgData->img_alt =$request->title;
               $imgData->save();
             
            }
        }
        
        return  redirect('admin/roomtype/'.$id.'/edit')->with('success','Data has been Updated');
  
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
              
         RoomType::where('id',$id)->delete();
         return redirect('admin/roomtype')->with('success','Data has been Deleted');
       
    }
    public function destroyImage($id)
    {
        $image=RoomTypeimage::where('id',$id)->first();
        
        if(isset($image) && $image!="")
        {
            unlink("images/".$image->img_src);
        }
        RoomTypeimage::where('id',$id)->delete();
        return response()->json(['success'=>'true']);
      
        
    }
}
