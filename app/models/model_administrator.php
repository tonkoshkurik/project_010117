<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 18:58
 */
class Model_Administrator extends Model
{

    public function add_agency_user($id, $role_id){
        $connection = $this->db()->connect();
        $stmt = $connection->prepare('UPDATE `users` SET role = :role_id WHERE id = :id');

        return $stmt->execute([':id' => $id, ':role_id' => $role_id]);
    }

    public function get_list_agency_users(){
        $connection = $this->db()->connect();
        $stmt = $connection->prepare('SELECT u.first_name, u.last_name, u.email, r.role FROM users u JOIN user_role r ON u.role = r.id');
        $stmt->execute();
        $user_list = $stmt->fetch(\PDO::FETCH_OBJ);
        return $user_list;
    }

    public function get_agency_user_by_id($id){
        $connection = $this->db()->connect();
        $stmt = $connection->prepare('SELECT u.first_name, u.last_name, u.email, r.role FROM users u JOIN user_role r ON u.role = r.id WHERE u.id = :id');
        $stmt->execute([':id'=>$id]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);
        return $user;
    }

    public function add_agency($post){
        $connection = $this->db()->connect();

        $logo = App::getInstance()->getComponent('settings')->save_logo();
        $stmt = $connection->prepare('INSERT INTO agency (`name`, description, logo) VALUES (:name, :description, :logo)');
        $stmt->execute([':name' => $post['name'], ':description' => $post['description'], ':logo' => $logo]);
        $agency_id = $connection->lastInsertId();

        return $connection->lastInsertId();
    }

    public function get_list_agency(){
        $connection = $this->db()->connect();
        $stmt = $connection->prepare('SELECT * FROM agency');
        $stmt->execute();
        $agency_list = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $agency_list;
    }

    public function get_agency_by_id(){

    }
}