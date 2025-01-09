<?php
namespace app\controllers\portal;

use core\Controller;

class ContactController extends Controller
{
    public function index()
    {
      $heading = "Contato Home";
      require view('portal/contato.view.php',[
        'heading' => $heading
      ]);
        
    }
}


?>
