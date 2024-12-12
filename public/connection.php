<?php

define('HOST', 'localhost');
define('USER','root');
define('PASSWORD','');
define('DB','aceda');

$connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die('Connection error');

?>