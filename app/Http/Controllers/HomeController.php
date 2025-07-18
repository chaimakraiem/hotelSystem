<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    public function detailsRomm($id){
        $room = Room::find($id);
        return view('home.detailsRoom',compact('room'));
    }

}
