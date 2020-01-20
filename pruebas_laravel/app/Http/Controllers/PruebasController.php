<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PruebasController extends Controller
{
    //preubas controler
    public function index(){
        $titulo='Lista de Usuarios';
        $usuarios=['Efren','Roger','oliver'];
        return view('usuarios.index',array(
            'titulo'=>$titulo,
            'usuarios'=>$usuarios
        ));
    }

    public function testOrm(){

        // $posts=Post::all();
        // foreach($posts as $post){
        //     echo "<h1>".$post->title."</h1>";
        //     echo "<span>{$post->category->name}</span>";
        //     echo "<p>".$post->content."</p>";
        //     echo "<hr>";
        // }

        $categories=Category::all();
        foreach($categories as $category){
            echo "<h1>{$category->name}</h1>";
            foreach($category->posts as $post){
                echo "<h1>".$post->title."</h1>";
                echo "<p>".$post->content."</p>";

            }
        }
        

        die();
    }
}
