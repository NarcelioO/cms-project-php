<?php
namespace app\controllers\admin;

class AdminCursosController{
   public function index()
   {
      $heading = "Cursos";
      //$posts = Cursos::all();
      //dd($cursos);
      require view('admin/cursos/index.view.php',[
         'heading'=>$heading,
         //'posts' => $posts
      ]);
   }

   public function show()
   {
      echo "Show curso";
   }
}
