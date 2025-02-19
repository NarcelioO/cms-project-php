<?php
namespace app\controllers\admin;

use app\middleware\AuthMiddleware;
use app\models\PostModel;
use app\services\Sanitize;
use app\services\Sanitizer;
use app\services\Validator;
use core\Controller;
use Doctrine\DBAL\DriverManager;

class PostsController{

  
   private function generateSlug($title)
   {
      $slug = strtolower(trim($title));
      $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
      $slug = preg_replace('/-+/', '-', $slug);
      return trim($slug, '-');
   }

   


   public function index()
   {
      $connectionParams = [
         'dbname' => 'aceda_db',
         'user'=> 'root',
         'password' => '',
         'host' => 'localhost',
         'driver' => 'pdo_mysql'
      ];
      
      // $conn = DriverManager::getConnection($connectionParams);

      // $stmt = $conn->prepare("select * from post");
      // $selected = $stmt->executeQuery();
      // $posts = $selected->fetchAllAssociative();


   
      $postModel = PostModel::getInstance();  
      $posts = $postModel->all();

      $heading = "Posts";
      require Controller::view('/admin/posts/index.view.php',[
         'heading' => $heading,
         'posts' => $posts
      ]);
   }

   public function show($req)
   {

      $postModel = PostModel::getInstance();
      $heading = "Posts";
      $post = $postModel->find($req['id']);

      require Controller::view('admin/posts/show.view.php',[
         'heading'=>$heading,
         'post' => $post
      ]);
   }
   

   public function create()
   {
      require Controller::view('admin/posts/create.view.php');
   }


   public function store()
   {

      $imageName = Validator::processImage($_FILES['image']);
      $data = 
      [
               "title" => Sanitizer::string($_POST['title'], 3, 255),
               "slug" => $this->generateSlug($_POST['title']),
               //"user_id" => ($_POST['autor']?? ''),
               "status" => isset($_POST['status']) ?? $_POST['status'] === '1',
               "content" => Sanitizer::string($_POST['content']),
               "image_path" => $imageName ?? ''
      ];
      //dd($data);
      $categoria = ($_POST['category'] ?? '');
      
      $postModel = PostModel::getInstance();
      $postId = $postModel->create($data);

      // $categoriaModel = CategoriaModel::getInstance();
      // $categoriaId = $categoriaModel->create(['nome' => $categoria]);


      // $postModel->attachedCategoria($postId, $categoriaId);


      if($postId){
         header('Location: /admin/posts');
      }else{
         echo "Erro ao criar post";
      }


   }

   public function edit($request)
   {
      $postModel = PostModel::getInstance();
      $post = $postModel->find($request->params);
      require Controller::view('admin/posts/create.view.php',[
         'post' => $post
      ]);
   }

   public function update($id, $data)
   {
      $instance = PostModel::getInstance();
      $sql = "update posts set title = :title, category = :category, image_path = :image_path, status = :status, author = :author, content = :content, slug = :slug where id = :id";
      $stmt = $instance->update($sql,[
         'title' => $data['title'],
         'category' => $data['category'],
         'image_path' => $data['image_path'] ?? null,
         'status' => $data['status'],
         'author' => $data['author'],
         'content' => $data['content'],
         'slug' => $data['slug'],
         'id'=>$id
      ]);

      return $stmt;
   }

   public function destroy($id)
   {
      $instance = PostModel::getInstance();
      $stmt = $instance->delete($id->params);
      
      if(!$stmt){
         $_SESSION['error'] = "Post não encontrado ou já deletado";
         header('Location: /admin/posts');   
      }
      $_SESSION['sucess'] = "Post delete com sucesso!";
      header('Location: /admin/posts');
      exit;
   }
  

}
