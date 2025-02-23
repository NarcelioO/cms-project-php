<?php
namespace app\controllers\admin;

use app\controllers\Controller;

class CursosController extends Controller{

   
   public function index()
   {
      $heading = "Empreenda";

      require Controller::view('/admin/cursos/index.view.php',[
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
