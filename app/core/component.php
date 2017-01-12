<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 14:36
 */

abstract class Component {

    static public function register($name) {
        App::getInstance()->addComponent($name, static::class);
    }

    abstract function init();
}