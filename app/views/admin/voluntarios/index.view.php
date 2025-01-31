<?php require base_path('views/partials/head.php');?>

<div class="flex">
<?php require base_path('views/admin/partials/nav.php');?>
    <div class="w-full h-[100vh] bg-slate-100 p-4">
        <div class="bg-white w-full h-full rounded-md border">
            <div class="flex w-full justify-between items-center p-4 bg-gray-100 border-b">
                <form action="">
                    <input type="text" placeholder="Procurar" class="py-2 px-3 rounded-md border focus:ring-2 focus:outline-none focus:ring-blue-500">
                </form>
                <a href="/admin/posts/create" class="px-3 py-2 bg-blue-600 text-white font-medium rounded-md">Nova Postagem</a>
            </div>
            <div class="p-4">
            <table class="w-full">
                <thead>
                    <tr>
                    <th class=" text-left text-sm">Nome</th>
                    <th class=" px-8 text-sm">Cargo</th>
                    <th class=" px-8 text-sm">Periodo</th>
                    <th class=" px-8 text-sm">Portfolio</th>
                    <th class=" px-8 text-sm">Acões</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class=" font-medium text-sm text-gray-700 py-4 underline:bg-sky-500 flex" >
                            <img src="#" alt="profile_photo">
                            <a href="#">Rodrigo Barrocal</a>
                        </td>
                    <td class=" font-medium text-sm text-gray-700 text-center ">Fullstack</td>
                    <td class=" font-medium text-sm text-gray-700 text-center ">10/12/2024 - Atual</td>
                    <td class=" font-medium text-sm text-gray-700 text-center ">Linkedin</td>
                    <td class=" font-bold text-sm text-gray-700 text-center ">
                        <a href="/admin/posts/update/:id"  class="text-[#FF8800] mr-2"><i class="fa-solid fa-pen-to-square" style="color:#FF8800"></i>Editar</button>
                        <a href="/admin/posts/destroy/:id" class="text-[#F54040]"><i class="fa-solid fa-trash-can" style="color: #f54040;"></i>Excluir</button>
                    </td>
                    </tr>
                    
                   
                   
                   
                </tbody>
            </table>
            </div>
            
            <!-- <ul class="p-4">
                <?php foreach($voluntarios as $voluntario):?>
                    <li class="w-full flex justify-between items-center bg-red-500">
                        <span class="w-[340px] font-medium text-sm ">Empreendedorismo Feminino: Força Motriz nas Periferias e Seu Impacto no Crescimento do Brasil</span>
                        <span class="font-medium text-sm">Empreendedorismo</span>
                        <span class="font-medium text-sm">Author</span>
                        <span class="font-medium text-sm">Published</span>
                        <span class="font-medium text-sm">10/02/2024</span>
                        <div class="font-medium text-sm">
                            <button>Editar</button>
                            <button>Excluir</button>
                        </div>
                    </li>
                <?php endforeach?>
            </ul> -->
        </div>
        
    </div>
   
</div>