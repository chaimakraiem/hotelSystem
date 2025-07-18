<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

class AdminController extends Controller
{
    public function index(){
      if (Auth::check()) {
        $usertype = Auth::user()->usertype;

        if ($usertype === 'user') {
              $room=Room::all();
            return view('home.index',compact('room'));
        } elseif ($usertype === 'admin') {
            return view('admin.index');
        } else {
            return redirect()->back();
        }
    } else {
        return redirect('/login');
    }

    }
    public function home(){
        $room=Room::all();

        return view('home.index',compact('room'));
    }
     public function addRoom(){
        return view('admin.addRoom');
    }

    public function storeRoom(Request $request){
        $data= new Room();

        $data->title=$request->title;
        $data->description=$request->description;
        $data->prix=$request->prix;
        $data->image=$request->image;
        $data->disponibilite=$request->disponibilite;
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
        }
        $data->save();

        return redirect()->back();
    }
    public function dispalyRoom(){
        $data = Room::all();
        return view('admin.roomsList',compact('data'));
    }
     public function deleteRoom($id){
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }
     public function updateRoom($id){
        $data = Room::find($id);
        return view('admin.updateRoom',compact('data'));
    }
      public function upRoom(Request $request,$id){
        $data = Room::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->prix=$request->prix;
        $data->image=$request->image;
        $data->disponibilite=$request->disponibilite;
        $image=$request->image;
          if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return  redirect()->back();


    }
    
}
