<?php

class Controller_Admin extends Controller
{
  function __construct()
  {
    $this->model = new Model_Admin();
    $this->view = new View();
  }
  function action_index() {
    $data["body_class"] = "page-header-fixed";
    $data["title"] = "Dashboard";
    session_start();
    if ( $_SESSION['admin'] == md5('admin'))
    {
      header('Location:/admin/dashboard');
      $this->view->generate('admin_view.php', 'template_view.php', $data);
    } else if ($_SESSION['user'] == md5('user')) {
      $data["user_id"] = $_SESSION["id"];
      header('Location:/client/dashboards');
      $this->view->generate('main_view.php', 'client_template_view.php', $data);
    } else {
      session_destroy();
      header('Location:/login');
      $this->view->generate('danied_view.php', 'template_view.php', $data);
    }
  }

  function action_dashboard()
  {

    session_start();
    // var_dump($_SESSION);
    //  exit();
    if ($_SESSION['admin'] == md5('admin')) {

      $data["title"] = "Dashboard";
      $data["body_class"] = "page-header-fixed";
      $data['all'] = $this->model->getOrder();
      $data['all_client'] = $this->model->getClients();

      $this->view->generate('dashboard_admin_view.php', 'template_view.php', $data);

    } else {
      session_destroy();
      $this->view->generate('danied_view.php', 'template_view.php', '');
    }
  }

  function action_changemails() {
    $con = $this->db();
    $sql = "SELECT id from `users`";
    if($res = $con->query($sql)){
      foreach ($res as $r){
        $result[] = $r;
      }
    }
    foreach ($result as $r) {
      $id = $r["id"];
      $sql = "UPDATE `clients` SET `email` = 'reasonbeatmaker@gmail.com' WHERE `clients`.`id` =".$id;
      $res = $con->query($sql);
      if($res) echo "clients.true";
    }

//    print_r( $result );
  }
  function action_logout()
  {
    session_start();
    session_destroy();
    header('Location:/login');
  }

  public function action_query()
  {
    $table = 'applications';
    $primaryKey = 'id';
    $columns = array(
      array( 'db' => '`a`.`id`', 'dt' => 0, 'field'=>'id', 'formatter' => function($d){
        $string = "<div class='order_id'><label><input type='checkbox' value='$d' class='id_check'><span>$d</span></label></div>";
        return $string;
      }),
      array( 'db' => '`a`.`date`', 'dt' => 1, 'field'=>'date', 'formatter' => function($d, $row) {
        $date_time = date("m/d/Y", strtotime($d));
        $string = '<input class="datepicker" name="deadline" class="deadline" attr-id="'. $row[0] .'" title="Date" disabled=disabled value="'.$date_time.'" class="edit-button" data-target="#edittf">';
        return $string;
      }),
      array( 'db' => '`a`.`guest_post_url`', 'dt' => 2, 'field'=>'guest_post_url', 'formatter' => function($d, $row) {
        if(empty($d)|| is_null($d)){
          $string = '<div attr-id="'.$row[0].'" style="width:100%; height:50px;" class="edit_guest"></div>';
          return $string;
        }else{
        $string = '<a href="#" class="edit_guest" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" class="edit-button"> '.$d.' </a>';
        return $string;
        }
      }),
      array( 'db' => '`a`.`approving`', 'dt' => 3, 'field'=>'approving', 'formatter' => function($d, $row) {
        $approving ='';
        $not_approving = '';
        if($d==1 || $d != 1){
          if($d == 1){
            $approving = 'selected';
          }else{
            $not_approving = 'selected';
          }
          $string = '<select class="change_approved" style="width:100%;" attr-id="'. $row[0] .'" name="select_approving">
            <option value="1" '. $approving .' >Approved</option>
            <option value="0"'. $not_approving .'>Is not approved</option>
        </select>';
          return $string;
        }
        return $d;
      }),
      array( 'db' => '`a`.`tf`', 'dt' => 4, 'field'=>'tf', 'formatter' => function($d, $row) {
        $string = '<a href="#" class="edittf" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" title="Check"  class="edit-button" data-target="#edittf"> '.$d.' </a>';
        return $string;
      }),
      array( 'db' => '`a`.`da`', 'dt' => 5, 'field'=>'da', 'formatter' => function($d, $row) {
        $string = '<a href="#"  class="editda" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" title="da"  class="edit-button" data-target="#editda"> '.$d.' </a>';
        return $string;
      }),
      array( 'db' => '`a`.`ttf`', 'dt' => 6, 'field'=>'ttf', 'formatter' => function($d, $row) {
        if(empty($d)|| is_null($d)){
          $string = '<div attr-id="'.$row[0].'" style="width:100%; height:20px;" class="editttf"></div>';
          return $string;
        }else{
          $string = '<a href="#" class="editttf" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" title="content"  class="edit-button" data-target="#editttf"> '.$d.' </a>';
          return $string;
        }
      }),
      array( 'db' => '`a`.`keywords`', 'dt' => 7, 'field'=>'keywords'),
      array( 'db' => '`a`.`client_url`', 'dt' => 8, 'field'=>'client_url'),
      array('db'  => '`a`.`content`', 'dt'=>9, 'field'=>'content', 'formatter' => function($d, $row) {
        if(empty($d)|| is_null($d)){
          $string = '<div attr-id="'.$row[0].'" style="width:100%; height:20px;" class="editcont"></div>';
          return $string;
        }else{
          $string = '<a href="#" class="editcont" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" title="content"  class="edit-button" data-target="#editcont"> '.$d.' </a>';
          return $string;
        }
      }),
      array('db'  => '`a`.`content_approving`', 'dt'=> 10, 'field'=>'content_approving'),
      array('db'  => '`a`.`status`', 'dt'=> 11, 'field'=>'status', 'formatter' => function($d, $row) {
        $progr = '';
        $proc = '';
        $live = '';
        if($d == 0){
          $progr = 'selected';
        }elseif($d == 1){
          $proc = 'selected';
        }else{
          $live = 'selected';
        }
        $string = '<select class="status_change" attr-id="'. $row[0] .'" style="width:100%;" name="select_st">
            <option value="0" '.$progr.'>In progress</option>
            <option value="1" '.$proc.'>Process content</option>
            <option value="2" '.$live.'>Live</option>
        </select>';
        return $string;
      }),
      array('db'  => '`a`.`live_url`', 'dt'=> 12, 'field'=>'live_url',  'formatter' => function($d, $row) {
        if(empty($d)|| is_null($d)){
          $string = '<div attr-id="'.$row[0].'" style="width:100%; height:20px;" class="editurl"></div>';
          return $string;
        }else{
          $string = '<a href="#" class="editurl" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" title="content"  class="edit-button" data-target="#editurl"> '.$d.' </a>';
          return $string;
        }
      }),
      // array('db'=> '`a`.`id`', 'dt'=>14, 'formatter' => function($d, $row) {


      //   $string = '<a href="#" id="check" class="check" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" title="Check" data-toggle="modal" class="edit-button" data-target="#editClient"><i style="color:#24e22d;" id="check" class="fa fa-check" aria-hidden="true"></i> </a>';
      //   $string .= ' <a href="#" id="not_appr" class="not_appr" attr-id="'. $row[0] .'" attr-name="'. $row[1] .'" title="Reject"><i style="color:#bf2424;" class="fa fa-times" aria-hidden="true"></i></a>';
      //   return $string;
      // // }
      // }, 'field'=> 'id')
    );
    $joinQuery = "FROM {$table} as `a`";

    $sql_details = array(
      'user' => DB_USER,
      'pass' => DB_PASS,
      'db'   => DB_NAME,
      'host' => DB_HOST
    );
    ob_clean();

    echo json_encode(
      SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery)
    );
    exit;
  }

  public function action_approving()
  {
    $res = $this->model->update_approve();
    // var_dump($res);
    // exit();
    if($res){
      echo "Success";

      $user = $this->model->getUser();
      if($_POST['val'] == 0){
        $approving = "Not is approved";
      }else{
        $approving = "Approved";
      }
      // $to.=$user['email'].", ";
      $to=ADMINEMAIL;

      /* тема/subject */
      $subject = "Changes in the order processing.";
      /* сообщение */
      $message = '
          <html>
          <head>
           <title>Changes in the order processing</title>
          </head>
            <body>
              <p>Status of approval: "'.$approving.'"</p>
            </body>
          </html>
      ';

      $headers= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
      $headers .= "From: Alert service \r\n";
      // $headers .= "Cc: birthdayarchive@example.com\r\n";
      // $headers .= "Bcc: birthdaycheck@example.com\r\n";
      /* и теперь отправим из */
      mail($to, $subject, $message, $headers);

    }else{
      echo "Error";
    }
  }

  public function action_status()
  {
    $res = $this->model->status();

    if($res){
      echo "Success";
    }else{
      echo "Error";
    }

  }

  // public function action_edittf()
  // {
  //   $res = $this->model->get_tf();
  //  // var_dump($res);
  // }

  public function action_update_tf()
  {
    $res = $this->model->update_tf();

    if($res){
      echo "Success";
    }else{
      echo "Error";
    }

  }

  public function action_update_da()
  {
    $res = $this->model->update_da();

    if($res){
      echo "Success";
    }else{
      echo "Error";
    }
  }

  public function action_update_ttf()
  {
    $res = $this->model->update_ttf();

    if($res){
      echo "Success";
    }else{
      echo "Error";
    }
  }

  public function action_update_cont()
  {
    $res = $this->model->update_cont();

    if($res){
      echo "Success";
    }else{
      echo "Error";
    }
  }

  public function action_update_url()
  {
    $res = $this->model->update_url();

    if($res){
      echo "Success";
    }else{
      echo "Error";
    }
  }

  public function action_deadline()
  {
    $res = $this->model->update_date();

    if($res){
      echo "Success";

      $user = $this->model->getUser();
      var_dump($user);
      exit();
      foreach ($user as $key) {

        $to.=$key['email'].", ";
      }
      /* тема/subject */
      $subject = "Changes in the order processing.";
      /* сообщение */
      $message = '
          <html>
          <head>
           <title>Changes in the order processing</title>
          </head>
            <body>
              <p>The deadline was set at "'.$_POST["val"].'"</p>
            </body>
          </html>
      ';

      $headers= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
      $headers .= "From: Alert service \r\n";
      // $headers .= "Cc: birthdayarchive@example.com\r\n";
      // $headers .= "Bcc: birthdaycheck@example.com\r\n";
      /* и теперь отправим из */
      mail($to, $subject, $message, $headers);

    }else{
      echo "Error";
    }
  }

  public function action_update_guest()
  {
    $res = $this->model->update_guest();
    
    if($res){
      echo "Success";
    }else{
      echo "Error";
    }
  }

  public function action_notification()
  {
    $old_notif = $this->model->old_notif();
    // var_dump($old_notif);
    // exit();
    $data['title'] = "Add notification";
    $data['notif'] = $old_notif;
    $this->view->generate('notification_view.php', 'template_view.php', $data);
  }

  public function action_addNotification()
  {
    $res = $this->model->add_notification();
    if($res){
      echo "Success";
    }else{
      echo "Error";
    }
  }

  public function action_deleteNotif()
  {
    $res = $this->model->deleteNotif();
    if($res){
      echo "Success";
    }else{
      echo "Error";
    }

  }

  public function action_getNotif()
  {
    $res = $this->model->getNotif();
    echo "<input type='hidden' name='id_not' value='".$res['id']."'/>";
    echo "<div class='form-group'>";
    echo "<label for='$k'>Subject</label>";
    echo '<input class="form-control" type="text" value="'.$res['subject'].'" name="subject" > ' ;
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<label for='$k'>Notification</label>";
    echo '<textarea rows="10" cols="45" class="form-control" type="text" name="notification" >"'. $res['notification'].'"</textarea> ' ;
    echo "</div>";

  }

  public function action_UpdateNotif()
  {
    $res = $this->model->updateNotyf();
     if($res){
      echo "Success";
    }else{
      echo "Error";
    }

  }

  public function action_getCampaign()
  {
    $result['all_camp'] = $this->model->getCampaign();
    foreach($result['all_camp'] as $camp){
      // echo $camp;
      // var_dump($camp);
      echo "<select id='campaigns' name='campign'>";
      echo "<option value='$camp[id]'> $camp[campaign] </option>";
      echo "</select>";
    }
    
  }

  public function action_getNotification(){
    $clients['all'] = $this->model->getclientfornot();
    $notif['all_notif'] = $this->model->getsubject();
    $information['check_inform'] = $this->model->getinform();
    // Clients
      echo "<div style='float:left;' id='clientsfornot' name='clientsfornot'>";
      echo "Recipients";
    foreach ($clients['all'] as $client) {
      echo "<div value='$client[email]'> $client[full_name] - $client[email] </div>";
    }
      echo "</div>";

      // Subject
      echo "<select id='subject' name='subject'>";
      echo "<option disabled selected>Choose template</option>";
    foreach ($notif['all_notif'] as $not) {
      echo "<option value='$not[id]'> $not[subject] </option>";
    }
      echo "</select>";

        // Information
    //   echo "<div id='inform' name='information'>";
    // foreach ($information['check_inform'] as $inf) {
    //   echo "<div>  </div>";
    // }
    //   echo "</div>";
  }

  public function action_getTemplate(){
    $template = $this->model->getTemplate();
// var_dump($template['notification']);
// exit();
    echo $template['notification'];


  }



}
