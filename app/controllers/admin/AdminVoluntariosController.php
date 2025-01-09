<?php
namespace app\controllers\admin;

use app\models\Voluntarios;

class AdminVoluntariosController{

   
   public function index()
   {
      $heading = "Voluntarios";
      $voluntarios = Voluntarios::all();
      //dd($posts);
      require view('admin/voluntarios/index.view.php',[
         'heading'=>$heading,
         'voluntarios' => $voluntarios
      ]);
   }
   public function create()
   {
      require view('admin/voluntarios/create.view.php');
   }

}
   
