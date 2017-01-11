<?php
class Model_Clients extends Model {

  public function get_data() {
    $table = "<table id='clients' class=\"display table table-condensed table-striped table-hover table-bordered clients pull-left\">";
      $table .= "<thead><tr><th>ID</th><th>Email</th><th>Level</th><th>Full Name</th><th>Actions</th><th>Campaign</th></tr></thead>";
      $table .= "</table>";
      return $table;
  }


  public function addCampaign(){
  	$id = $_POST['id'];
    $campaign = $_POST['campaign'];
    
    $sql = 'INSERT INTO `campaigns`';
    $sql.= '(campaign, user_id)';
    $sql.= " VALUES ('$campaign', '$id')";
      
    $con = $this->db();
    $res = $con->query($sql);

    if($res){
        return 'Success';
    }else{
        return "Db error";
        }

  }

  public function getCampaigns(){
    $id = $_POST['id'];
    $sql = "SELECT * FROM  `campaigns`";
    $sql.="WHERE user_id = '$id'";
    $con = $this->db();
    $res = $con->query($sql);

    $all_campaigns = array();
    while ($all = $res->fetch_assoc()) {
      $all_campaigns[] = $all;
    }
     return $all_campaigns;

  }

  public function deleteCampaign(){
    $id = $_POST['id'];
    
    $sql = "DELETE FROM `campaigns`";
    $sql .= "WHERE id = '$id'";
    
    $con = $this->db();
    $res = $con->query($sql);
    if($res){
        return 'Success';
    }else{
        return "Db error";
        }
  }


}


