<?php
namespace app\controllers\portal;

use core\Controller;


class AboutController extends Controller
{
    public function index()
    {
      $heading = "About Home";
      require view('portal/about.view.php',[
        'heading' => $heading
      ]);
    }
}


?>
