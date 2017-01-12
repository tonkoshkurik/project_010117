<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 15:38
 */
class Controller_Agency extends Controller
{
    public function __construct()
    {
        if ($this->check_user_role() > 2) {
            die('Access Deny');
        }
        $this->model = new Model_Agency();
        $this->view = new View();
    }

    public function action_index()
    {
        return $this->view->render('/agency/index.php');
    }

    public function action_add_client()
    {
        $user_id = false;

        if ($_POST) {
            $db_component = $this->db();
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user_id = App::getInstance()->getComponent('auth')->registration($db_component, $first_name, $last_name, $login, $email, $password);
        }

        if ($user_id) {

            return $this->view->render('/auth/registration.php');
        }

    }
}