<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13.01.2017
 * Time: 11:32
 */
//var_dump($data);
?>
<h1>Hello administrator</h1>
<?php echo $data['added_user']?'user was added, id='.$data['added_user']:'' ?>
<div style="border: solid 1px blue"><?php echo $data['add_user']?></div>
<div style="border: solid 1px blue"><?php echo $data['add_agency_form']?></div>
<div style="border: solid 1px blue"><?php echo $data['agency_list']?></div>
