<?php
namespace app\controllers\admin;

use core\Controller;

class CandidatosController{

   
   
   public function index()
   {
      $heading = "Empreenda";

      require Controller::view('/admin/candidatos/index.view.php',[
         'heading'=>$heading,
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
