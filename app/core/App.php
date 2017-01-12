<?php


class App
{
    static private $instance;
    private $components;
    private $view;
//    protected static $router;
//    public static $db;
//    private $config;

    /**
     * @return self
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->view = new View();
    }

    private function __wakeup() {}

    private function __clone() {}

    public function addComponent($name, $component_cls) {
        $this->components[$name] = new $component_cls;
    }

    public function getComponent($name) {
        return $this->components[$name];
    }

    public function run() {
        $this->getComponent('auth')->middleware($this->getComponent('db'));
        $user = $this->getComponent('auth')->getCurrentUser();

        $data['content'] = Route::start();
        $data['user'] = $user;
//        var_dump($data);die;
//        $data['menu'] = 'menu';
//        $data['top'] = $this->view->render('default_tpl/top_menu.php', $data);
        $page = $this->view->render('default_tpl/index.php', $data);
        echo $page;
    }

}