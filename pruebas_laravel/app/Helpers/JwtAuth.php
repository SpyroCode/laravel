<?php

    namespace App\Helpers;

    use Firebase\JWT\JWT;
    use Illuminate\Support\Facades\DB;
    use App\User;

    class JwtAuth{

        public $key;

        public function __construct(){
            $this->key='esto_es_una_clave_super_secreta-99887766';
        }

        public function singup($email,$password,$gettoken=null){

            //Comprobar si exite el usuario con sus credenciales;

            $user=User::where([
                'email'=>$email,
                'password'=>$password,
            ])->first();
            //Comprobar si son correctas (objeto);
            $signup=false;
            if(is_object($user)){
                $signup=true;
            }
            //Generar el token de el usuario identificado;
            if($signup){
                $token=array(
                    'sub'=>$user->id,//la propiedad 'sub' en JWT es para id
                    'email'=>$user->email,
                    'name'=>$user->name,
                    'surname'=>$user->surname,
                    'iat'=>time(),//la propeidad 'iat' en JWT es para el tiempo
                    'exp'=>time()+(7*24*60*16) //se el suma una semana para la propuedad 'exp' de JWT

                );

                $jwt=JWT::encode($token,$this->key,'HS256');
                $decode=JWT::decode($token,$this->key,['HS256']);
                if(is_null($gettoken)){
                    $data=$jwt;
                }else{
                    $data=$decode;
                }
            }else{
                $data=array('status'=>'error',
                        'code'=>404,
                        'message'=>'Los datos de usuario no son correctos',
                        
                    );
            }
            //Devolver el token de usuario identificado;
            return $data;
        }
    }