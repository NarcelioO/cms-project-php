<?php require '../app/views/partials/head.php';?>
<?php
$volunteers = [
    [
        'id'=>'1',
        'name'=>"Ronaldo Lacerda da Silva",
        'resume'=>'Muito feliz pela oportunidade de desenvolver o site do zero, iniciei na aceda em Janeiro/2024 onde o site era em Wordpress Elementor, identificamos pontos de lentidão no site e um ambiente no qual o cliente final não conseguia atualizar informações importantes sendo sempre necessário um Dev, com isso surgiu a ideia de refazer o site porem trabalhando diretamente com código fonte.',
        'cargo'=>'Category 1'
    ],
    [
        'id'=>'1',
        'name'=>"Tomás Moiano Pereira",
        'resume'=>'Muito feliz pela oportunidade de desenvolver o site do zero, iniciei na aceda em Janeiro/2024 onde o site era em Wordpress Elementor, identificamos pontos de lentidão no site e um ambiente no qual o cliente final não conseguia atualizar informações importantes sendo sempre necessário um Dev, com isso surgiu a ideia de refazer o site porem trabalhando diretamente com código fonte.',
        'cargo'=>'Category 1'
    ],
    [
        'id'=>'1',
        'name'=>"Marcos Vinicius Hernandes Da Silva Carreiro",
        'resume'=>'Muito feliz pela oportunidade de desenvolver o site do zero, iniciei na aceda em Janeiro/2024 onde o site era em Wordpress Elementor, identificamos pontos de lentidão no site e um ambiente no qual o cliente final não conseguia atualizar informações importantes sendo sempre necessário um Dev, com isso surgiu a ideia de refazer o site porem trabalhando diretamente com código fonte.',
        'cargo'=>'Category 1'
    ],
    [
        'id'=>'1',
        'name'=>"Caroliny Thayanni",
        'resume'=>'Muito feliz pela oportunidade de desenvolver o site do zero, iniciei na aceda em Janeiro/2024 onde o site era em Wordpress Elementor, identificamos pontos de lentidão no site e um ambiente no qual o cliente final não conseguia atualizar informações importantes sendo sempre necessário um Dev, com isso surgiu a ideia de refazer o site porem trabalhando diretamente com código fonte.',
        'cargo'=>'Category 1'
    ],
    [
        'id'=>'1',
        'name'=>"Alfredo Marvulle",
        'resume'=>'Muito feliz pela oportunidade de desenvolver o site do zero, iniciei na aceda em Janeiro/2024 onde o site era em Wordpress Elementor, identificamos pontos de lentidão no site e um ambiente no qual o cliente final não conseguia atualizar informações importantes sendo sempre necessário um Dev, com isso surgiu a ideia de refazer o site porem trabalhando diretamente com código fonte.',
        'cargo'=>'Category 1'
    ]
    ]

?>
<!-- component -->
<div class="min-h-screen flex flex-row bg-gray-100 ">
    <?php require '../app/views/partials/admin/nav.php';?>
    <div class="w-full p-4 flex flex-col">
            <div class="flex justify-between items-center w-full">
                <h1 class="font-medium text-2xl text-gray-700">Lista de Voluntarios</h1>
                <a href="/create-voluntarios.php" class="px-3 py-2 font-semibold rounded-md text-white text-sm bg-blue-700 ">Cadastrar Voluntario</a>
            </div>
            <div>
                <ul class="mt-5">
                    <?php foreach($volunteers as $voluntary): ?>
                        <li class="flex items-center justify-between p-3 bg-white border mb-1 ">
                            <a href="/voluntario.php?id=<?= $voluntary['id']; ?>" class="text-blue-700 text-sm font-medium hover:underline">
                                <?= $voluntary['name'];?>
                            </a>
                            <div >
                                <a href="" class="p-2 text-blue-500">Editar</a>
                                <a href="" class="p-2 text-red-500">Excluir</a>
                            </div>
                        </h1>
                    <?php endforeach; ?>
                </ul>
                
            </div>
    </div>
</div>
<?php require '../app/views/partials/admin/footer.php' ;?>

<?php
//require '../vendor/autoload.php';
?>


