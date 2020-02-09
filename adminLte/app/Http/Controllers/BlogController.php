<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Blog; //archivo de modelo

class BlogController extends Controller
{
    public function index(){
        $blog = Blog::all(); //metodo all traigame todos los archivos de la tabla blog
        return view("paginas.blog", array("blog"=>$blog)); //envio a la vista lo que estoy alsenado tpdo lo que va en el objeto blog
    }
}
