<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 18:58
 */
class Model_Agency extends Model
{

    public function add_client($id, $role_id){
        $connection = $this->db()->connect();
        $stmt = $connection->prepare('UPDATE `users` SET role = :role_id WHERE id = :id');

        return $stmt->execute([':id' => $id, ':role_id' => $role_id]);
    }
}