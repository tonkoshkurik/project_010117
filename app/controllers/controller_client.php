<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 15:38
 */
class Controller_Client extends Controller
{
    public function __construct(){
        $this->check_user_role();
//        $this->model = new Model_Client();
        $this->view = new View();
    }

    public function action_index(){

        return $this->view->render('client/index.php');
    }

}
