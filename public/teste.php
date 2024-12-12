<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo 'email valido';
    }else{
        echo 'email invalido';
    }
}