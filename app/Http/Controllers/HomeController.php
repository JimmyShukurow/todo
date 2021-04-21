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
            if($user->role == 'admin'){
                $details = DetailsOfList::all();
                if($details->count() > 10){
                    $details = DetailsOfList::paginate(10);
                }
                return view('layouts.home', compact('details','user'));
            }
            else{
                
                $details = DetailsOfList::where('user_id',$user->id)->orderBy('id','DESC')->get();
                if($details->count() > 10){
                    $details = DetailsOfList::where('user_id',$user->id)->orderBy('id','DESC')->paginate(10);
                }
                return view('layouts.home', compact('details','user'));
            }
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
