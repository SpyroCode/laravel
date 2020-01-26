<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function pruebas(Request $request){
        return "Accion de pruebas USER-CONTROLLER";
    }

    public function register(Request $request){

        //recoger datos


        $json=$request->input('json',null);

        $params=json_decode($json);//se pasa a un objeto
        $params_array=json_decode($json,true);
    if(!empty($params) && !empty($params_array)){
        //limpiar datos
        $params_array=array_map('trim',$params_array);
        //validar datos

        $validate=\Validator::make($params_array,[
            'name'=>'required|alpha', //que sea requerido y qye sea alfanumerico
            'surname'=>'required|alpha',
            'email'=>'required|email|unique:users',  //validda que el campo sea unico y en que tabla
            'password'=>'required|',
        ]);    

        if($validate->fails()){
            $data=array('status'=>'error',
                        'code'=>404,
                        'message'=>'el usuario no se ha creado',
                        'error'=>$validate->errors(),
                    );
        }else{

            //cifrar la contrarseña

            //$pwd=password_hash($params->password,PASSWORD_BCRYPT,['cost'=>4]);
            $pwd=hash('sha256',$params->password);
            
            $user=new User();

            $user->name=$params_array['name'];
            $user->surname=$params_array['surname'];
            $user->password=$pwd;
            $user->email=$params_array['email'];
            $user->role='ROLE_USER';

            

            //crear el usuario

            $user->save();

            $data=array('status'=>'success',
                        'code'=>200,
                        'message'=>'El usuario se ha credo correctamente',
                        'error'=>$validate->errors(),
                        'user'=>$user,
                    );
        }    
    }else{
        $data=array('status'=>'error',
                        'code'=>404,
                        'message'=>'Los datos no son correctos',
                        
                    );
    }

        
    
        


        
    return response()->json($data,$data['code']);

    }

    public function login(Request $request){

        $jwtAuth = new \JwtAuth();

        $email='spiralnet@gmail.com';
        $password='holahola';
        //$pwd=password_hash($password->password,PASSWORD_BCRYPT,['cost'=>4]);
        $pwd=hash('sha256',$password);
        return $jwtAuth->singup($email,$pwd);
    }
}
