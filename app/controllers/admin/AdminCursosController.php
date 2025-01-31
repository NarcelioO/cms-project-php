<?php
namespace app\controllers\admin;

use core\Controller;

class AdminCursosController{
   public function index()
   {
      $heading = "Cursos";
      //$posts = Cursos::all();
      //dd($cursos);
      require Controller::view('admin/cursos/index.view.php',[
         'heading'=>$heading,
         //'posts' => $posts
      ]);
   }

   public function create()
   {

   }

   public function edit()
   {

   }

   public function update()
   {
      
   }

   public function show()
   {
      echo "Show curso";
   }
}
