<?php require base_path('views/partials/head.php');?>
<div class="flex">
<?php require base_path('views/admin/partials/nav.php');?>
    
    <div class="w-full h-[100vh] bg-slate-100 p-4">
        <?php if(isset($_SESSION['sucess'])):?>
            <div class="bg-green-200 p-4">
                <?= $_SESSION['sucess'] ?>
            </div>
            <?php unset($_SESSION['sucess']);?>
        <?php endif;?>
        <?php if(isset($_SESSION['error'])):?>
            <div class="bg-red-200 p-4">
                <?= $_SESSION['error'] ?>
            </div>
            <?php unset($_SESSION['error']);?>
        <?php endif;?>
        <div class="bg-white w-full h-full rounded-md border">
            <div class="flex w-full justify-between items-center p-4 bg-gray-100 border-b">
                <form action="">
                    <input type="text" placeholder="Procurar" class="py-2 px-3 rounded-md border focus:ring-2 focus:outline-none focus:ring-blue-500">
                </form>
                <a href="/admin/posts/create" class="px-3 py-2 bg-blue-600 text-white font-semibold rounded-md">Nova Postagem</a>
            </div>
            <div class="p-4">
            <table class="w-full">
                <thead>
                    <tr>
                    <th class=" text-left text-sm">Titulo</th>
                    <th class=" px-8 text-sm">Categoria</th>
                    <th class=" px-8 text-sm">Autor</th>
                    <th class=" px-8 text-sm">Status</th>
                    <th class=" px-8 text-sm">Data</th>
                    <th class=" px-8 text-sm">Acões</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post):?>
                    <tr>
                        <td class=" font-medium text-sm text-gray-700 py-4 underline:bg-sky-500" >
                            <a href="#"><?= $post['title'];?></a>
                        </td>
                    <td class=" font-medium text-sm text-gray-700 text-center "><?= $post['categoria'] ?? ''?></td>
                    <td class=" font-medium text-sm text-gray-700 text-center ">Milena Alundaasdsadsa</td>
                    <td class=" font-medium text-sm text-gray-700 text-center ">Draft</td>
                    <td class=" font-medium text-sm text-gray-700 text-center ">10/02/2024</td>
                    <td class=" font-bold text-sm text-gray-700 text-center ">
                        <a href="/admin/posts/edit/<?= $post['id']?>"  class="text-[#FF8800] mr-2"><i class="fa-solid fa-pen-to-square" style="color:#FF8800"></i>Editar</a>
                        <button id="openModalButton" data-post-id="<?= $post['id']?>" class="text-[#F54040]"><i class="fa-solid fa-trash-can" style="color: #f54040;"></i>Excluir</button>
                    </td>
                    </tr>
                    <?php endforeach; ?>                
                </tbody>
            </table>
            
            </div>
            
        </div>
        

    </div>

    <!-- Modal de confirmação de exclusão-->
    <div id="confirmDeleteModal" class="w-full h-full flex items-center justify-center absolute bg-zinc-800 bg-opacity-50 hidden">
        <!-- content -->
        <div class="p-8 bg-white border rounded-lg flex flex-col gap-4 ">
            <div class="flex ">
                <h5 class="font-semibold">Tem certeza que deseja deletar este post?</h5>
            </div>
            <div class="flex gap-2">
                <button type="button" class="px-3 py-2 bg-blue-700 rounded text-white font-semibold w-full" id="cancelButton">Cancelar</button>
                <button type="button" class="px-3 py-2 border-2 border-red-700 rounded text-red-700 font-semibold w-full" id="confirmDeleteButton">Deletar</button>
            </div>
        </div>
    </div> 
                  
</div>

<script>
   document.addEventListener('DOMContentLoaded', function(){
    let modal = document.getElementById("confirmDeleteModal");
    let openModalButton = document.getElementById("openModalButton");
    let closeModalButton = document.getElementById("closeModalButton");
    let cancelButton = document.getElementById("cancelButton");
    let confirmDeleteButton = document.getElementById("confirmDeleteButton");



    let postId = null

    openModalButton.addEventListener("click", function(){
        postId = this.getAttribute("data-post-id");
        modal.classList.remove('hidden')
    })

    function closeModal(){
        modal.classList.add('hidden')
    }

    cancelButton.addEventListener('click', closeModal)

    confirmDeleteButton.addEventListener('click',function(){
        window.location.href = `/admin/posts/destroy/${postId}`
    })
   })
</script>