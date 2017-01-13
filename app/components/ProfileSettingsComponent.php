<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13.01.2017
 * Time: 11:48
 */
class ProfileSettingsComponent extends Component
{
    public function init()
    {
        // TODO: Implement init() method.
    }

    public function save_logo(){
        $uploaddir = DOWNLOAD_DIR.'agency_logo/';
        if (!file_exists($uploaddir)){
            mkdir($uploaddir);
        }
        $uploadfile = $uploaddir . basename($_FILES['logo']['name']);

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
            return basename($uploadfile);
        } else {
            return false;
        }

    }

    public function save_user_photo(){
        $uploaddir = DOWNLOAD_DIR.'user_photo/';
        if (!file_exists($uploaddir)){
            mkdir($uploaddir);
        }
        $uploadfile = $uploaddir . basename($_FILES['logo']['name']);

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
            return basename($uploadfile);
        } else {
            return false;
        }
    }

    public function save_user_password(){

    }

}