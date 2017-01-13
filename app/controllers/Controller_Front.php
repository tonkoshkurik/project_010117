<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.01.2017
 * Time: 14:25
 */
class Controller_Front extends Controller
{


    public function action_index(){

            switch ($this->check_user_role()) {
                case 1:
                    header('Location: /administrator');
//                    return $this->view->render('administrator/index.php');
                    break;
                case 2:
                    return $this->view->render('agency/index.php');
                    break;
                case 3:
                    return $this->view->render('client/index.php');
                    break;
                default:
//                    return $this->view->render('/auth/login.php');
                    header('Location: /auth/login');
                    break;
            }
    }
}