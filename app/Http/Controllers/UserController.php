<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
   public function index(){
        $user = User::orderBy('id', 'DESC')->get();

       return $this->Ok($user , "User Retrieve Succesfully");
    }

    public function show($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        return $this->Ok($user , "User Retrieved Succesfully");
    }

    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
            "username" => "required|unique:users",
            "email" => "required|unique:users|email|max:255",
            "password" => "required|min:8|max:255",
            "profile_picture" => "sometimes|string",
            "bio" => "sometimes|string|max:255",
            "full_name" => "required|string|max:255",
            "nickname" => "sometimes|string|max:50",
            "cover_picture" => "sometimes|string",
        ]);
        if($validator->fails()){
            return $this->BadRequest($validator);
        }

        $validated=$validator->validated();

        $user = User::create($validated);
        $user->userProfile()->create($validated);
     

        return $this->Ok($user , "User Created Succesfully");
    }


    public function update(Request $request){
    $data = $request->all();
    $validator = Validator::make($data, [
        "id" => "required|exists:users,id", 
        "username" => "sometimes|string|max:255", 
        "email" => "sometimes|email|unique:users,email," . $data['id'], 
        "password" => "sometimes|min:8", 
    ]);
    if ($validator->fails()) {
        return $this->BadRequest($validator);
    }
   
    $user = User::find($data['id']);

    
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    if (isset($data['username'])) {
        $user->username = $data['username'];
    }
    if (isset($data['email'])) {
        $user->email = $data['email'];
    }
    if (isset($data['password'])) {
        $user->password = $data['password']; 
    }

    
    $user->save();

   
    return $this->Ok($user , "User Update Succesfully");
}




    public function destroy($id){
       $user = User::find($id);
       if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return $this->Ok($user , "User Deleted Succesfully");
    }


}
