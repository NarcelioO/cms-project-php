<?php require base_path('views/partials/head.php');?>
<div class="flex">
<?php require base_path('views/admin/partials/nav.php');?>
    
    <div class="w-full h-[100vh] bg-slate-100 p-4">
        
        <div class="bg-white w-full h-full rounded-md border">
            <div class="flex w-full justify-between items-center p-4 bg-gray-100 border-b">
                <form action="">
                    <input type="text" placeholder="Procurar" class="py-2 px-3 rounded-md border focus:ring-2 focus:outline-none focus:ring-blue-500">
                </form>
                <a href="/admin/posts/create" class="px-3 py-2 bg-blue-600 text-white font-semibold rounded-md">Nova Postagem</a>
            </div>
            <div class="p-4">

            <?php if(isset($_SESSION['sucess'])):?>
                <div class="bg-green-200 px-3 py-2" id="sucess">
                    <?= $_SESSION['sucess'] ?>
                </div>
                <?php unset($_SESSION['sucess']);?>
            <?php endif;?>

            <?php if(isset($_SESSION['error'])):?>
                <div class="bg-red-200 p-4" class="error">
                    <?= $_SESSION['error'] ?>
                </div>
                <?php unset($_SESSION['error']);?>
            <?php endif;?>

            <table class="w-full">
                <thead class="border">
                    <tr>
                   
                    <th class="px-4 border py-2 text-left text-sm">Titulo</th>
                    <th class="px-4 border py-2 text-left text-sm">Categoria</th>
                    <th class="px-4 border py-2 text-left text-sm">Autor</th>
                    <th class="px-4 border py-2 text-left text-sm">Status</th>
                    <th class="px-4 border py-2 text-left text-sm">Data</th>
                    <th class="px-4 border py-2 text-left text-sm">Acões</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post):?>
                    <tr class="odd:bg-white even:bg-gray-100 border">
                    
                        <td class=" font-medium text-sm text-gray-700 px-4 py-2 underline:bg-sky-500 " >
                            <?= $post['title'];?>
                        </td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2"><?= $post['categoria'] ?? ''?></td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2">Milena Alundaasdsadsa</td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2">Draft</td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2">10/02/2024</td>
                    <td class=" font-bold text-sm text-gray-700 border px-4 py-4">
                        <a href="/admin/posts/edit/<?= $post['id']?>" class="text-white mr-2 p-2 bg-[#FF8800] rounded"><i class="fa-solid fa-pen-to-square" style="color:#FFF"></i>Editar</a>
                        <button id="openModalButton" data-post-id="<?= $post['id']?>" class="text-white p-2 rounded bg-[#F54040]"><i class="fa-solid fa-trash-can" style="color: #fff;"></i>Excluir</button>
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
    const modal = document.querySelector("#confirmDeleteModal");
    const openModalButton = document.querySelectorAll("#openModalButton");
    const closeModalButton = document.querySelector("#closeModalButton");
    const cancelButton = document.querySelector("#cancelButton");
    const confirmDeleteButton = document.querySelector("#confirmDeleteButton");

    const sucess = document.querySelector("#sucess");
    const error = document.querySelector("#error");

    if(sucess){setTimeout(() => sucess.remove(), 2000)}
    if(error){setTimeout(() => error.remove(), 2000)}

    let postId = null

    openModalButton.forEach(
        function(button){
            button.addEventListener('click', function(){
                postId = this.getAttribute("data-post-id");
                modal.classList.remove('hidden')
            })
        }
    )


    function closeModal(){
        modal.classList.add('hidden')
    }

    cancelButton.addEventListener('click', closeModal)

    confirmDeleteButton.addEventListener('click',function(){
        window.location.href = `/admin/posts/destroy/${postId}`
    })


   })
</script>