<?php
namespace app\services;


class Validator{

    private static $configImagem = [
        'types' => ['image/jpeg', 'image/gif', 'image/png'],
        'size' => 5 * 1024 * 1024,
        'path' => __DIR__ . '/../../storage/uploads'
    ];

   

    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    
    }

    private static function length($data, $min, $max)
    {
        return strlen($data) >= $min && strlen($data) <= $max;
    }

    public static function string($value, $min = 0, $max = INF)
    {
        return self::length(trim($value), $min, $max);
    }

    public static function url($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL);
    }

    public static function password($value, $min = 8)
    {
        return strlen($value) >= $min;
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