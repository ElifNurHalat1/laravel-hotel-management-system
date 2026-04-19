<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            
            if($usertype == 'user')
            {
                return view('home.index');
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else
            {
                return redirect()->back();
            }
        }
        
    }


    public function home()
    {
        return view('home.index');

    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'wifi' => 'required|in:yes,no',
            'type' => 'required|in:regular,premium,deluxe',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = new Room();

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        
        $image = $request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room',$imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('success','Room added');
        
    }
}
