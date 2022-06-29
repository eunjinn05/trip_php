<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
  function __construct() {
    parent::__construct();
  }

  function member_id_check() {
    $input = $this->input->post();
    $this->db->where("mem_id", $input["mem_id"]);
    $mem = $this->db->get("member")->row();

    $arr = ($mem) ? array('result'=>true) : array('result'=>false);
    echo json_encode($arr);
  }
}
?>