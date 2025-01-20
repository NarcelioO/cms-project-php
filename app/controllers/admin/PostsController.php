<?php
namespace app\controllers\admin;

use app\models\PostModel;

//use app\models\Post;


class PostsController{


   private function generateSlug($title)
   {
      $slug = strtolower(trim($title));
      $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
      $slug = preg_replace('/-+/', '-', $slug);
      return trim($slug, '-');
   }
   private function processImage($image)
   {

   }

   public function index()
   {
      $postModel = PostModel::getInstance();
      $heading = "Posts";
      $posts = $postModel->findAll();
      //dd($posts);
      require view('admin/posts/index.view.php',[
         'heading'=>$heading,
         'posts' => $posts
      ]);
   }

   public function show($req)
   {
      require view('admin/posts/show.view.php',[
         'heading'=>$heading,
         'posts' => $posts
      ]);
   }
   

   public function create()
   {
      require view('admin/posts/create.view.php');
   }

   public function store()
   {
     //var_dump($_POST['title']);
     echo "<pre>";
     var_dump($_POST);
     var_dump($_FILES);
     echo "</pre>";
     $data = 
     [
            "title" => htmlspecialchars(strip_tags($_POST['title']?? '')),
            "category" => htmlspecialchars(strip_tags($_POST['category'] ?? '')),
            "status" => htmlspecialchars(strip_tags($_POST['status']?? '')),
            "author" => htmlspecialchars(strip_tags($_POST['author']?? '')),
            "content" => htmlspecialchars(strip_tags($_POST['content']?? '')),
            "slug" => $this->generateSlug($_POST['title'])
     ];
     dd($data);
       

      // ];
      // $postId = PostModel::create($data);
      // if($postId){
      
      // }

      // echo "Post criado com sucesso! ID: {$postId}";
   }

   public function edit($id)
   {
      //pego o id faço a cunsulta e envio os dados para a edição
   }

   public function update($id, $data)
   {

   }

   public function destroy($id){
      
   }
  

}
