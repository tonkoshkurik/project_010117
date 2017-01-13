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

        /* Add user*/
        if ($_POST['add_user']){
            $user_id = $this->action_add_agency_user();
            if ($user_id){
                $admin_data['added_user'] = $user_id;
            } else {
                $admin_data['added_user'] = 'error';
            }
        }
        $admin_data['add_user'] = $this->view->render('/auth/registration.php');

        /* Add agency*/
        if ($_POST['add_agency']){
            $agency_id = $this->add_agency();
            if ($agency_id){
                $admin_data['added_agency'] = $agency_id;
            } else {
                $admin_data['added_agency'] = 'error';
            }
        }
        $admin_data['add_agency_form'] = $this->view->render('/administrator/add_agency_form.php');

        /*Agency list*/
        $agency_list = $this->model->get_list_agency();
        $admin_data['agency_list'] = $this->view->render('/administrator/agency_list.php', $agency_list);

        $data['add_user'] = $this->view->render('/administrator/index.php', $admin_data);

        return $data['add_user'];

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
        } else {
            return $this->action_index();
        }

        if ($user_id){
            $this->model->add_agency_user($user_id, 2);
        }
            return $user_id;
    }

    public function add_agency(){
        if ($_POST['add_agency']){
            return $this->model->add_agency($_POST);
        }
        return false;
    }

}