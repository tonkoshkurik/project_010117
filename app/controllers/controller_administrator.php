<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 15:38
 */
class Controller_Administrator extends Controller
{
    public function __construct(){
        if($this->check_user_role() != 1){
            die('Access Deny');
        }
        $this->model = new Model_Administrator();
        $this->view = new View();
    }

    public function action_index(){

    }

    public function action_add_agency_user(){
        $user_id = false;

        if ($_POST){
            $db_component = $this->db();
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user_id = App::getInstance()->getComponent('auth')->registration($db_component, $first_name, $last_name, $login, $email, $password);
        }

        if ($user_id){
            $this->model->add_agency_user($user_id, 2);
        }

        return $this->view->render('/auth/registration.php');
    }

}