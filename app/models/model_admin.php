<?php
class Model_Admin extends Model {

  public function get_data() {
    $loginUser = array(
      "login_status" => 1
    );
    return $loginUser;
  }


  public function getOrder()
  {
  	$sql = 'SELECT * FROM `applications`';
  	$sql.= 'WHERE approving = "no"';

	$con = $this->db();
	$res = $con->query($sql);

	$all_order = array();
	while ($all = $res->fetch_assoc()) {
		$all_order[] = $all;
	}
	return $all_order;
  }

  public function update_approve()
  {
    $id = $_POST['id'];
    $approving = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET approving='$approving'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

  public function status()
  {
    $id = $_POST['id'];
    $stat = $_POST['val'];
    $sql = "UPDATE `applications`";
    $sql.= " SET status='$stat'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

  public function update_tf()
  {

    $id = $_POST['id'];
    $val = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET tf='$val'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

  public function update_da()
  {
    $id = $_POST['id'];
    $val = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET da='$val'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

   public function update_ttf()
  {
    $id = $_POST['id'];
    $val = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET ttf='$val'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

  public function update_cont()
  {
    $id = $_POST['id'];
    $val = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET content='$val'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

  public function update_url()
  {
    $id = $_POST['id'];
    $val = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET live_url='$val'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }
 
   public function update_date()
  {
    $id = $_POST['id'];
    $val = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET deadline='$val'";
    $sql.= " WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

  public function getUser()
  {

    $id = $_POST['id'];

    $sql = "SELECT * FROM `applications`";
    $sql.= "WHERE id='$id'";
    // var_dump($sql);

    $con = $this->db();
    $res = $con->query($sql);
    $email = $res->fetch_assoc();
    // var_dump($email);
  }

  public function update_guest()
  {
    $id = $_POST['id'];
    $val = $_POST['val'];

    $sql = "UPDATE `applications`";
    $sql.= " SET guest_post_url='$val'";
    $sql.= " WHERE id='$id'";
// var_dump($sql);
    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }

  public function add_notification()
  {
    $subject = $_POST['subject'];
    $notification = $_POST['notification'];

    $sql = 'INSERT INTO `notifications`';
    $sql.= '(subject, notification)';
    $sql.= " VALUES ('$subject', '$notification')";
      
    $con = $this->db();
    $res = $con->query($sql);

    if($res){
        return 'Success';
    }else{
        return "Db error";
        }

  }

  public function old_notif()
  {
    $sql = 'SELECT * FROM `notifications`';
  
    $con = $this->db();
    $res = $con->query($sql);
    $all = array();
    while($not = $res->fetch_assoc()){
      $all[] = $not;
    }
    return $all;

  }

  public function deleteNotif()
  {
    $id = $_POST['id'];
    $sql = "DELETE FROM `notifications`";
    $sql.="WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }

  }

  public function getNotif()
  {
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $id = $_POST['id'];
    $sql = "SELECT * FROM `notifications`";
    $sql.= "WHERE id='$id'";

    $con = $this->db();
    $res = $con->query($sql);

    $result = $res->fetch_assoc();
    return $result;

  }

  public function updateNotyf()
  {
    //$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $id = $_POST['id_not'];
    $subject = $_POST['subject'];
    $notification = $_POST['notification'];

    $sql = "UPDATE `notifications`";
    $sql.= " SET subject='$subject', notification='$notification'";
    $sql.= " WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }

  }

  public function getClients(){
    $sql = "SELECT * FROM `users`";
    $sql .= "WHERE level = '3'";
    $con = $this->db();
    $res = $con->query($sql);

    $all_client = array();
    while($user = $res->fetch_assoc()){
      $all_client[] = $user;
    }
    return $all_client;
  }

  public function getCampaign()
  {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `campaigns`";    
    $sql.= "WHERE user_id = '$id'";
    $con = $this->db();
    $res = $con->query($sql);

    $all_camp = array();
    while($camp = $res->fetch_assoc()){
      $all_camp[] = $camp;
    }
    return $all_camp;
  }

  public function getclientfornot(){
    $id = $_POST['id'];
    $id = substr($id, 0, -1);
    $sql = "SELECT `id_user` FROM `applications`";
    $sql .= "WHERE id IN ('$id')";
    $con = $this->db();
    $res = $con->query($sql);

    $id_table = array();
    while($camp = $res->fetch_assoc()){
      $id_table[] = $camp;
    }
    // var_dump($id_table[0]['id_user']);
// var_dump($id_table);
//     exit();
// $id_us = $id_table['id_user'];
    $id_us = $id_table[0]['id_user'];
    $query = "SELECT * FROM `users`";
    $query .= "WHERE id IN ('$id_us')";
    $con = $this->db();
    $result = $con->query($query);
    $all = array();
    while($user = $result->fetch_assoc()){
      $all[] = $user;
    }
     return $all;
  }

  public function getsubject(){
    $sql = "SELECT * FROM `notifications`";
    // $sql .= "WHERE id IN ('$id')";
    $con = $this->db();
    $res = $con->query($sql);

    $all_notif = array();
    while($subj = $res->fetch_assoc()){
      $all_notif[] = $subj;
    }
    return $all_notif;

  }

  public function getinform(){
    $id = $_POST['id'];
    $id = substr($id, 0, -1);
    $sql = "SELECT * FROM `applications`";
    $sql .= "WHERE id IN ('$id')";
    // var_dump($sql);
    // exit();
    $con = $this->db();
    $res = $con->query($sql);

    $check_inform = array();
    while($inf = $res->fetch_assoc()){
      $check_inform[] = $inf;
    }
    return $check_inform;
 
  }

  public function getTemplate(){
    $id = $_POST['id'];

    $sql = "SELECT * FROM `notifications`";
    $sql .= "WHERE id = '$id'";
    $con = $this->db();
    $res = $con->query($sql);
    $camp = $res->fetch_assoc();
    // var_dump($camp);
    // exit();
      return $camp;
  }






}
