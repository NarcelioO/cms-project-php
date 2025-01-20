<?php
namespace app\controllers\portal;

use core\Controller;


class SobreController extends Controller
{
    public function index()
    {
      $heading = "Pagina Sobre";
      require view('portal/about.view.php',[
        'heading' => $heading
      ]);
    }
}


?>
