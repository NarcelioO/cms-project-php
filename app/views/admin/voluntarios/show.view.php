<?php require base_path('views/partials/head.php');?>

<div class="flex">
<?php require base_path('views/admin/partials/nav.php');?>
    <ul>
        <?php foreach($voluntarios as $voluntario):?>
            <li>
                <?= $voluntario['name'];?>
            </li>
        <?php endforeach?>
    </ul>
</div>