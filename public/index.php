<?php require 'views/partials/head.php';?>
<?php require 'connection.php';?>

<?php 
require '../bootstrap.php';
use app\database\models\User;
use app\classes\Person;

$person = new Person(14, 'Masculino');
$person::$name ="Narcelio";
// $user = new User();
// $user->read();

$routes = [
    '/' => 'controllers/HomeController.php',
    '/about' => 'controllers/AboutController.php'

]

?>
<!-- component -->
<div class="min-h-screen flex flex-row bg-gray-100 ">
    <?php require 'views/partials/nav.php';?>
        <div class=" w-full p-4">
               Home
        </div>
</div>
<?php require 'views/partials/footer.php' ;?>

<?php
 require '../vendor/autoload.php';
?>



