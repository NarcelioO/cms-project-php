<?php

use core\Database;
require '../config.php';
session_start();
require 'connection.php';
//$connection = new Database($config);
if(isset($_POST['save-post'])){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $directory = '/assets';
        $filename = dirname($_FILES['imagem']['name']);
        $pathImage = $directory . $filename;
        //update
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $postId = (int)$_POST['id'];
            $stms = $connection->prepare("UPDATE posts SET title = ?, content = ?, category = ? WHERE id = ?");
            $stms->bind_param("sssi", $title, $content, $category, $postId);
            $stms->execute(); 
            $stms->close();
            $message = "Registro atualizado com sucesso";
            //create
        }else{
            $stms = $connection->prepare("INSERT INTO posts (title, content, category) VALUES (?, ?, ?)");
            $stms->bind_param("sss", $title, $content, $category);
            $stms->execute();
            $stms->close();
            $message = "Registro criado com sucesso";
        }
    
        header("Location:posts.php?sucess=1");
        exit;
    }


}
if(isset($_POST['delete-post'])){
    $postId = mysqli_real_escape_string($connection, $_POST['delete-post']);
  
    $sql = "DELETE FROM posts WHERE id =' $postId'";

    mysqli_query($connection, $sql);
    if(mysqli_affected_rows($connection)>0){
        $_SESSION['message'] = 'post deletado com sucesso';
        header('Location: posts.php');
        exit;
    }else{
        $_SESSION['message'] = 'post não foi deletado';
        header('Location: posts.php');
        exit;
    }
   

}

if(isset($_POST['save-voluntario'])){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name = $_POST['name'];
        $cargo = $_POST['cargo'];
        $status = $_POST['status'];
        $resume = $_POST['resume'];
        $directory = '/assets';
        $filename = dirname($_FILES['imagem']['name']);
        $pathImage = $directory . $filename;
        //update
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = (int)$_POST['id'];
            $stms = $connection->prepare("UPDATE voluntarios SET name = ?, cargo = ?, status = ?resume = ? WHERE id = ?");
            $stms->bind_param("ssssi", $name, $cargo, $status, $resume, $id);
            $stms->execute();
            $stms->close();
            $message = "Registro atualizado com sucesso";
            //create
        }else{
            $stms = $connection->prepare("INSERT INTO posts (name, cargo, resume, status) VALUES (?, ?, ?,?)");
            $stms->bind_param("ssss", $name, $cargo, $resume, $status);
            $stms->execute();
            $stms->close();
            $message = "Registro criado com sucesso";
        }
    
        header("Location:voluntarios.php?sucess=1");
        exit;
    }


}

