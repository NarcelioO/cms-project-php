<?php
namespace app\controllers\admin;

use app\models\Post;


class AdminPostsController{


   public function index()
   {
      $heading = "Posts";
      $posts = Post::all();
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

   public function store($data)
   {

   }

   public function edit($id)
   {
      
   }

   public function update($id, $data)
   {

   }

   public function destroy($id){
      
   }
  

}
