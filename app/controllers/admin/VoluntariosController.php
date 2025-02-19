<?php
namespace app\controllers\admin;

use app\middleware\AuthMiddleware;
use app\models\Voluntarios;
use core\Controller;

class VoluntariosController{

   
   
   public function index()
   {
      $heading = "Voluntarios";
      $voluntarios = Voluntarios::all();
      //dd($posts);
      require Controller::view('admin/voluntarios/index.view.php',[
         'heading'=>$heading,
         'voluntarios' => $voluntarios
      ]);
   }
   public function create()
   {
      require Controller::view('admin/voluntarios/create.view.php');
   }

}
   
