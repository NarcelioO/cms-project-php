<?php require base_path('views/partials/head.php');?>

<div class="flex">
<?php require base_path('views/admin/partials/nav.php');?>
    <ul>
        <?php foreach($posts as $post):?>
            <li>
                <?= $post['title'];?>
            </li>
        <?php endforeach?>
    </ul>
</div>