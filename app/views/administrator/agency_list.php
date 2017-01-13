<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13.01.2017
 * Time: 15:32
 */
//echo '<pre>';
//var_dump($data);
?>

<div>
    <ul>
        <?php foreach ($data as $agency):?>
            <li><?=$agency->name?></li>
        <?php endforeach;?>
    </ul>
</div>
