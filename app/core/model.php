<?php 
class Model
{
  public $last_id;


  public function get_data()
  {

  }

    public function db()
    {
        return App::getInstance()->getComponent('db');
    }
}
