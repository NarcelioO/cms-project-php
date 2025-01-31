<?php
namespace app\services;


class Validator{

    private static $configImagem = [
        'types' => ['image/jpeg', 'image/gif', 'image/png'],
        'size' => 5 * 1024 * 1024,
        'path' => __DIR__ . '/../../storage/uploads'
    ];

    static function length($data, $min, $max)
    {
        return strlen($data) >= $min && strlen($data) <= $max;
    }

    public static function email($email)
    {
        $email = trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }

    public static function string($data, $min = 1, $max = INF)
    {
        if(empty($data)){
            echo "O campo esta vazio";
        }

        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

        return self::length($data, $min, $max) ? $data : false;
        
    }

    public static function processImage($image)
   {
        //verifica se o arquivo foi enviado
        if(!isset($image) || $image['error'] !== UPLOAD_ERR_OK){
            throw new ('Erro o upload da imagem');
        }

        //verifica se o arquivo é uma imagem
        if(!in_array($image['type'] , self::$configImagem['types'])){
            throw new ('Tipo de imagem não permitido');
        }

        //verifica o tamanho do arquivo
        if($image['size'] > self::$configImagem['size']){
            throw new ('Tamanho do arquivo excedido');
        }


        //gera um nome unico para o arquivo
        $extensao = pathinfo($image['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $extensao;


        //verfica se o diretorio de imagens existe
        if(!is_dir(self::$configImagem['path'])){
            mkdir(self::$configImagem['path'], 0777, true);
        }

        //move o arquivo para o diretoria de imagens
        $fullPath = self::$configImagem['path'] . '/' . $nomeArquivo;
        if(!move_uploaded_file($image['tmp_name'], $fullPath)){
            throw new ('Erro ao mover o arquivo');
        }

        return $nomeArquivo;




   }
}