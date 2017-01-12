<?php


class Controller_Auth extends Controller
{
    public function __construct(){
//        $this->model = new Model_Admin();
        $this->view = new View();
    }

    public function action_index() {
        $user = App::getInstance()->getComponent('auth')->getCurrentUser();
        if ($user) {

            echo $this->view->render('default_tpl/index.php');
        } else {
            return $this->action_login();
        }
    }

    public function action_registration(){
        if ($_POST){
            echo 'do reg';
            $db_component = $this->db();
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $user = App::getInstance()->getComponent('auth')->registration($db_component, $first_name, $last_name, $login, $email, $password);

        }
        $data = '';
        return $this->view->render($data, '/auth/registration.php');
    }

    public function action_login(){
        $user = App::getInstance()->getComponent('auth')->getCurrentUser();
        if ($user){
            return $this->action_index();
        }
        if ($_POST){
            $db_component = $this->db();
            $login = $_POST['login'];
            $password = $_POST['password'];
            $user = App::getInstance()->getComponent('auth')->login($db_component, $login, $password);
        }

        echo $this->view->render('/auth/login.php');
        die();
    }
}