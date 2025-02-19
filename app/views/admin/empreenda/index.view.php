<?php require base_path('views/partials/head.php');?>
<div class="flex">
<?php require base_path('views/admin/partials/nav.php');?>
    
    <div class="w-full h-[100vh] bg-slate-100 p-4">
        
        <div class="bg-white w-full h-full rounded-md border">
            <div class="flex w-full justify-between items-center p-4 bg-gray-100 border-b">
                <form action="">
                    <input type="text" placeholder="Procurar" class="py-2 px-3 rounded-md border focus:ring-2 focus:outline-none focus:ring-blue-500">
                </form>
                <a href="/admin/empreenda/download" class="px-3 py-2 bg-green-600 text-white font-semibold rounded-md">
                <i class="fa-solid fa-download" style="color: #ffffff;"></i>
                    Baixar Arquivo
                </a>
            </div>
            <div class="p-4">
            <table class="w-full">
                <thead class="border">
                    <tr>
                   
                    <th class="px-4 border py-2 text-left text-sm " >Titulo</th>
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
                    
                        <td class=" font-medium text-sm text-gray-700 px-4 py-2 underline:bg-sky-500" >
                            <a href="#"><?= $post['title'];?></a>
                        </td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2"><?= $post['categoria'] ?? ''?></td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2">Milena Alundaasdsadsa</td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2">Draft</td>
                    <td class=" font-medium text-sm text-gray-700 border px-4 py-2">10/02/2024</td>
                    </tr>
                    <?php endforeach; ?>                
                </tbody>
            </table>
            
            </div>
            
        </div>
        

    </div>
                  
</div>
