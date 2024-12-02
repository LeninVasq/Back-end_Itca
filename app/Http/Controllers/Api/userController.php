<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{


    public function update(Request $request,$id){
        $user = User::find($id);
        if(!$user){
            $data=[
                'message'=>'El usuario no existe',
                'status' => 404
    
            ];
            return response()->json($data,404);
        }

        $validation =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
           ]);
    
        if($validation->fails()){
         
        $data=[
        'message'=>'Error en la validation de datos',
        'error' => $validation->errors(),
        'status' => 400
        ];
        return response()->json($data,400);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        $data=[
            'message'=>'Usuario actualizado',
            'status' => 200

        ];
        return response()->json($data,200);



    }

    public function deletebyid($id){
        $user = User::find($id);
        if(!$user){
            $data=[
                'message'=>'El usuario no existe',
                'status' => 404
    
            ];
            return response()->json($data,404);
        }

        $user->delete();

        $data=[
            'message'=> "Usuario eliminado",
            'status' => 200

        ];
        return response()->json($data,200);
    }


    public function findbyid($id){
        $user = User::find($id);
        if(!$user){
            $data=[
                'message'=>'El usuario no existe',
                'status' => 404
    
            ];
            return response()->json($data,404);
        }

        $data=[
            'message'=>$user,
            'status' => 200

        ];
        return response()->json($data,200);
    }
    public function createuser(Request $request)
    {
        
      $validation =  Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
       ]);

       if($validation->fails()){
     
        $data=[
            'message'=>'Error en la validation de datos',
            'error' => $validation->errors(),
            'status' => 400

        ];
        return response()->json($data,400);

       }
       

        $users  = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
       
        if(!$users){
            $data=[
                'message'=>'Error al crear el usuarios',
                'status' => 500
    
            ];
            return response()->json($data,500);

        }


        $data=[
            'message'=>$users,
            'status' => 201

        ];
        return response()->json($data,201);

    }


    public function finduser(){
        $data=[];
       $user = User::all();
       if($user->isEmpty()){
        $data=[
            'message'=>'No hay usuarios registrados',
            'status' => 200
        ];
       }
       else{
        $data=[
            'users' => $user,
            'status' => 200
        ];
       }
       return response()->json($data, 200);

    }
    
}
