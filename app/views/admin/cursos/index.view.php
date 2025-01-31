<?php require base_path('views/partials/head.php');?>
<div class="flex">
<?php require base_path('views/admin/partials/nav.php');?>
    <ul>
        <?php foreach($cursos as $curso):?>
            <li>
                <?= $curso['title'];?>
            </li>
        <?php endforeach?>
    </ul>
</div>