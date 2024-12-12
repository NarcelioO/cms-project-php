<?php require 'views/partials/head.php';?>
<?php


$connection = new mysqli('localhost', 'root', '', 'aceda');


$postId = null;
$title = '';
$content= '';
$category = '';

if(isset($_GET['id'])){
    $postId = (int)$_GET['id'];
    $stms = $connection->prepare('SELECT title, content, category FROM posts WHERE id = ?');
    $stms->bind_param('i', $postId);
    $stms->execute();
    $stms->bind_result($title, $content, $category);
    $stms->fetch();
    $stms->close();

}

$categories = ['Avisos', 'Empreendedorismo']

// var_dump($postId);
?>

<!-- component -->
<div class="min-h-screen flex flex-row bg-gray-100 ">
    <?php require 'views/partials/nav.php';?>

<div class="w-full p-4">
            <div class="max-w-5xl mx-auto">
            <form action="actions.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($postId);?>">
                <div class="space-y-12">
                    <div class="pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900"><?= $postId ? "Atualizar Postagem":"Nova Postagem";?></h2>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                            <label class=" mb-2 text-sm font-medium" for="file_input">Imagem de capa</label>
                            <input type="file" class="w-full cursor-pointer mt-2">
                            <p class="mt-1 text-sm text-gray-500 " id="file_input_help">PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                        
                        <div class="col-span-full">
                            <label for="title"  class="block text-sm/6 font-medium text-gray-900">Titulo</label>
                            <div class="mt-2">
                                <input  type="text" name="title" id="title" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="janesmith" value="<?= htmlspecialchars($title);?>">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm/6 font-medium text-gray-900">Categoria</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="category" name="category" autocomplete="category-name"  class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <?php foreach($categories as $categ):?>
                                        <option value="<?= $categ?>" <?= $category == $categ ? 'selected' : '' ?>><?= $categ;?></option>
                                    <?php endforeach;?>
                                
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="col-span-full">
                        <label for="about" class="block text-sm/6 font-medium text-gray-900">Conteudo</label>
                            <div class="mt-2">
                                <textarea name="content" id="content" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" ><?= htmlspecialchars($content);?></textarea>
                            </div>
                        </div>

                    </div>
                    </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/posts.php" class="text-sm/6 font-semibold text-gray-900" >Cancelar</a>
                    <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" name="save-post"><?= $postId ? "Atualizar" : "Postar";?></button>
                </div>
            </form>
            </div>
           

        </div>
</div>

<?php require 'views/partials/footer.php' ;?>

<?php
//require '../vendor/autoload.php';
?>
