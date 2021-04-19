<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsOfList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class AjaxController extends Controller
{
    //

    public function save(Request $request){
        $data =[];
        $details = new DetailsOfList();
        $user = Auth::user();
        $details->user_id = $user->id;
        $details->name = $request->nameOfContent;
        $details->description = $request->description;
        $details->save();
        $data['details'] = DetailsOfList::where('user_id',$user->id)->orderBy('id','DESC')->get();
        
        return response()->json($data, 200);
    }
    
    public function login(Request $request){
        $data = [];
        if (Auth::attempt(['email' => $request->emailOfUser, 'password' => $request->password])) {
            // Authentication was successful...
            $data["status"] = "success";
            $user = Auth::user();
            $data["userName"] = $user->name;
            $data["userId"] = $user->id;
             $data['details'] = DetailsOfList::where('user_id',$user->id)->orderBy('id','DESC')->get();

           return response()->json($data, 200);
            
        }
        else{
            $data["status"] = "failure";
            return response()->json($data,200);
        }
    }
    public function register(Request $request){
         $request->validate([
            'registerName' => 'required',
            'email' => 'required',
            'registerPassword' => 'required'
        ]);
        $user = new User();
        $user->name = $request-> registerName;
        $user->email = $request-> email;
        $user->password = bcrypt($request-> registerPassword);
        $user ->save();
        return response()->json('success',200);
    }
   
}
