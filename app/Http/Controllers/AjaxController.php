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
        if(Auth::check()){
            $request->validate([
                'nameOfContent'=>'required',
                'description'=>'required',
            ]);
            $user = Auth::user();
            $details->user_id = $user->id;
            $details->name = $request->nameOfContent;
            $details->description = $request->description;
            $details->save();
            $data['details'] = DetailsOfList::where('user_id',$user->id)->orderBy('id','DESC')->paginate(10);
            $data['status'] = 'success';
            return response()->json($data, 200);
        }
        else{
            $data['status'] = 'failure';
            return response()->json($data, 200);
            
        }
    }
    
    public function login(Request $request){
        $data = [];
        if (Auth::attempt(['email' => $request->emailOfUser, 'password' => $request->password])) {
            // Authentication was successful...
            $request->validate([
                'emailOfUser'=>'required',
                'password' =>'required',
            ]);
            $data["status"] = "success";
            $user = Auth::user();
            $data["userName"] = $user->name;
            $data["userId"] = $user->id;
            if($user->role == 'admin'){
                $data['details'] = DetailsOfList::paginate(10);
            }
            else{
                $details = DetailsOfList::where('user_id',$user->id)->orderBy('id','DESC');
                $details->paginate(10);
            $data['details'] = $details;
            }

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
            'registerPassword' => 'required',
            'retyperegisterPassword' => 'required',
        ]);
        $user = new User();
        $user->name = $request-> registerName;
        $user->email = $request-> email;
        $user->password = bcrypt($request-> registerPassword);
        $user ->save();
        return response()->json('success',200);
    }
   public function deleteDetails(Request $request){
       DetailsOfList::where("id", $request->id)->delete();
       return response()->json("success",200);
   }
   public function saveDetails(Request $request){
        $details = DetailsOfList::find($request->id);
        $details->description = $request->description;
        $details->save();
        
        return response()->json("success", 200);
    }
    public function searchDetails(Request $request){
        if(Auth::check()){
            $data = [];
            $user = Auth::user();
            $user_id = $user->id;
            $search = DetailsOfList ::
            join('users', 'users.id','=','details_of_lists.user_id')
                ->select('details_of_lists.description','details_of_lists.name','details_of_lists.id');
            if($user->role == 'admin'){
                $search->where(function($query){
                    $searchquery = \request()->get('query');
                        $query->where('details_of_lists.description','like','%'.$searchquery.'%');
                   });
            }
            else{
                $search->where('details_of_lists.user_id','=',$user_id)
                ->where(function($query){
                 $searchquery = \request()->get('query');
                     $query->where('details_of_lists.description','like','%'.$searchquery.'%');
                });
            }
           
                   
            $data['searchResult'] = $search->paginate(10);
            $data['status']= 'success';
            
            return response()->json($data,200);
        }
        else{
            return response()->json('failure',200);
        }

    }
}
