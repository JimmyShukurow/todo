<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsOfList;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function home(){
        if(Auth::check()){
            $user = Auth::user();
            $details = DetailsOfList::where('user_id',$user->id)->orderBy('id','DESC')->get();
            // $details = 2;
            return view('layouts.home', compact('details','user'));
        }
        else{
            return view('layouts.home');
        }
        
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('home');
    }
}
