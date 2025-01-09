<?php require base_path('views/partials/head.php');?>
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

<div class="min-h-screen flex justify-center items-center flex-row bg-gray-100 ">
<?php require base_path('views/admin/partials/nav.php');?>
        <div class="w-full p-4 ">
            <div class="max-w-5xl mx-auto bg-white p-8 border border-gray-200 rounded-lg">
                <form action="actions.php" method="POST">
                    <div class="space-y-12">
                        <div class="">
                        <!-- <h2 class="text-base/7 font-semibold text-gray-900">Cadastrar voluntario</h2> -->

                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="mt-2 sm:col-span-3">
                            <label for="username" class="block text-sm/6 font-medium text-gray-900">Titulo</label>
                            <div class="mt-2">
                                <input type="text" name="username" id="username" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6" placeholder="john doe">
                            </div>
                            </div>
                            <div class="mt-2 sm:col-span-3">
                            <label for="username" class="block text-sm/6 font-medium text-gray-900">Slug</label>
                            <div class="mt-2">
                                <input type="text" name="username" id="username" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6" placeholder="john doe">
                            </div>
                            </div>
                            <div class="col-span-full">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 ">Status</span>
                                </label>

                            </div>
                            
                            <div class="sm:col-span-3">
                            <label for="country" class="block text-sm/6 font-medium text-gray-900">Categoria</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="country" name="cargo" id="cargo idautocomplete="cargo-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6">
                                <option value="option 1">Empreendedorismo</option>
                                <option value="option 2">Avisos</option>
                                
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            </div>
                            <div class="sm:col-span-3">
                            <label for="country" class="block text-sm/6 font-medium text-gray-900">Autor</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="country" name="cargo" id="cargo idautocomplete="cargo-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6">
                                <option value="option 1">Ativo</option>
                                <option value="option 2">Ex contribuinte</option>
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            </div>

                            <div class="col-span-full">
                            <label for="about" class="block text-sm/6 font-medium text-gray-900">Conteudo</label>
                            <div class="mt-2">
                                <textarea name="about" id="about" rows="6" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6"></textarea>
                            </div>
                            
                            </div>
                            <div class="col-span-full ">
                                <div class="border rounded w-full">
                                    <label for="file_input" class="block w-fit border-r rounded-l text-black-300 font-medium py-2 px-4 cursor-pointer hover:bg-gray-600">Enviar imagem</label>
                                    <input type="file" id="file_input" class="hidden">
                                    
                                </div>
                                <p class="mt-1 text-sm text-gray-500 " id="file_input_help">PNG, JPG or GIF (MAX. 800x400px).</p>
                                
                            </div>


                            
                        </div>
                        </div>

                        

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancelar</button>
                        <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" name="save-voluntario"><?= $postId ? 'Atualizar' : 'Cadastrar';?></button>
                    </div>
                </form>
            </div>
        </div>
</div>

<?php require base_path('views/admin/partials/footer.php');?>