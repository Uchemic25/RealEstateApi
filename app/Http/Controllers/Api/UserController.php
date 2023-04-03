<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    //

    public function index(){
        $version = 2;

        return response()->json([
            'app' => $version
        ]);
    }


    public function signUp(Request $request){

        
        $exist = UserModel::where('email',$request->email)->get();
        if(count($exist) > 0){
              
            return response()->json([
                "status"=>"failed",
                "message" => "Email already exist"
            ]);
        }

        $user = new UserModel();

        $user->role_id = $request->role_id;
        $user->purchase_type_id = $request->purchase_type_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->logo = $request->logo;
        $user->image = $request->image;
        $user->rate = $request->rate;
        $user->number_of_rate = $request->number_of_rate;

        $id = $user->save();

        if($id){
             
            return response()->json([
                "status"=>"success",
                "message" => "Registration Successful"
            ]);
        }
        

       
        return response()->json([
            "status"=>"failed",
            "message" => "Registration Failed"
        ]);

    }


    public function signIn(Request $request){
        
        
        $user = UserModel::where('email',$request->email)->get();
       
        if($user[0]->password  == $request->password){
            
            return response()->json([
                "status"=>"success",
                "data"=>$user[0]
            ]);
        }else{
            return response()->json([
                "status"=>"failed",
            ]);
        }


    }
}
