<?php
namespace app\controllers\portal;

use core\Controller;
use core\Database;

$_SESSION['name'] = 'john doe';
class AboutController extends Controller
{
    public function index()
    {
    //   $heading = "Welcome to the Home Page";
    //   $this->view('portal/index.view.php',[
    //     'heading' => $heading
    //   ]);
        echo "About Controller";
    }
}


?>
