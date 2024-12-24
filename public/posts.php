<?php



 require '../app/views/partials/head.php';?>
<?php
require 'connection.php';
use core\Database;

$db = new Database ($config['database']);
// $config = require('../config.php');

// $stmt = $connection->query("select * from posts");
// $stmt->execute();
// $posts = $stmt->fetchAll();
// ?>
<!-- component -->
<div class="min-h-screen flex flex-row bg-gray-100 ">
    <?php require '../app/views/partials/admin/nav.php';?>
    <div class="w-full p-4 flex flex-col">
            <div class="flex justify-between items-center w-full">
                <h1 class="font-medium text-2xl text-gray-700">Posts</h1>
                <a href="/create-post.php" class=" px-3 py-2 font-semibold rounded-md text-white text-sm bg-blue-700">Nova Postagem</a>
            </div>
            <div>
                <ul class="mt-5">
                    <?php 
                    $sql = 'SELECT * from posts';
                    $posts = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($posts)>0){ ?>
                        <?php foreach($posts as $post): ?>
                            <li class="flex justify-between items-center py-1 px-4 bg-white border mb-1 ">
                                <a href="/create-post.php?id=<?= $post['id'];?>" class="text-blue-700 hover:underline text-sm font-medium">
                                    <?= htmlspecialchars($post['title']);?>
                                </a>
                                <div>

                                </div>
                                
                                <form action="actions.php" method="POST">
                                <a href="/create-post.php?id=<?= $post['id'];?>" class="p-2 text-blue-500">Editar</a>
                                    <button type="submit" name="delete-post" class="p-2 text-red-500" value="<?= $post['id'];?>">Excluir</button>
                                </form>
                            </li>
                    <?php endforeach; ?>

                    <?php 
                        }
                    else{
                        echo 'Nenhuma postagem encontrada';
                    }?>
                    
                </ul>
                
            </div>
    </div>
</div>
<?php require '../app/views/partials/footer.php' ;?>

<?php
//require '../vendor/autoload.php';
?>


