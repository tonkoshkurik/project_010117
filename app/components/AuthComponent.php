<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 14:07
 */
final class AuthComponent extends Component
{
    private $current_user;
    private $config;

    public function __construct()
    {
        $this->config['secret_key'] = SECRET_KEY;
    }

    public function init() {
        // TODO: Implement init() method.
    }

    /**
     * @param DbComponent $db_component
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $login
     * @param $password
     * @return bool
     */
    public function registration($db_component, $first_name, $last_name, $login, $email, $password) {
        $connection = $db_component->connect();
        $stmt = $connection->prepare('INSERT INTO `users` (login, email, password, first_name, last_name) 
                                        VALUES (:login, :email, :password, :first_name, :last_name)');
        $hash_password = $this->createHashPassword($this->config['secret_key'], $password);
        $stmt->execute([':login' => $login, ':email' => $email, ':password' => $hash_password, ':first_name' => $first_name, ':last_name' => $last_name]);
//        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $connection->lastInsertId();
//        return $result["id"];
    }

    /**
     * @param DbComponent $db_component
     * @param $login
     * @param $password
     * @return bool
     */
    public function login($db_component, $login, $password) {
        $connection = $db_component->connect();
        $stmt = $connection->prepare('SELECT * FROM `users` WHERE login = :login AND password = :password LIMIT 1');
        $hash_password = $this->createHashPassword($this->config['secret_key'], $password);
        $stmt->execute([':login' => $login, ':password' => $hash_password]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($user) {
            $this->session_set('USER_SESSION', $this->encryptSessionToken($this->config['secret_key'], $user->id));
            $this->session_set('USER_NAME', $user->name);
            $this->current_user = $user;
        }
        return $user;
    }

    public function logout() {
        $this->current_user = null;
        $this->session_delete('USER_SESSION');
        $this->session_delete('USER_NAME');
    }

    /**
     * @param DbComponent $db_component
     * @return bool
     */
    public function middleware($db_component) {
        session_start();
        if (empty($_SESSION['USER_SESSION'])) {
            return false;
        }

        $user_id = $this->decryptSessionToken($this->config['secret_key'], $_SESSION['USER_SESSION']);

        if (!$user_id) {
            $this->logout();
            return false;
        }

        $connection = $db_component->connect();
        $stmt = $connection->prepare('SELECT * FROM `users` WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $user_id]);
        $this->current_user = ($stmt->fetch(\PDO::FETCH_OBJ));
        return true;
    }

    private function createHashPassword($secret_key, $password) {
        return md5($secret_key . $password);
    }

    private function encryptSessionToken($secret_key, $user_id) {
        return $user_id . ':' . md5($secret_key . $user_id);
    }

    private function decryptSessionToken($secret_key, $session_id) {
        list($user_id, $sign) = explode(':' , $session_id);


        if (!hash_equals($sign, md5($secret_key . $user_id))) {

            return false;
        }
        return $user_id;
    }


    public function getCurrentUser() {
        return $this->current_user;
    }

    public function session_set($key, $value){
        session_start();
        $_SESSION[$key] = $value;
//        var_dump($_SESSION);
//        die('sssse');
    }

    public function session_get($key){
        session_start();
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;
    }

    public function session_delete($key){
        session_start();
        if (isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    public static function session_destroy(){
        session_destroy();
    }


}