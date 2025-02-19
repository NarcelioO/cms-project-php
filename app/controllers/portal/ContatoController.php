<?php
namespace app\controllers\portal;

use core\Controller;

class ContatoController extends Controller
{
    public function index()
    {
      $heading = "Pagina de contato";
      require Controller::view('portal/contato.view.php',[
        'heading' => $heading
      ]);
        
    }
}


?>
