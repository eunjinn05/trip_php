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

  function normal_join() {
    $input = $this->input->post();
    $input['mem_type'] = "normal";

    $create_options  = array(
      "input"    => $input,
      "table"    => "member",
      "prefix"  => "mem",
    );
    $data = $this->common->create($create_options);

    if ($data) {
      $_SESSION['mem_idx'] = $data[0]->mem_idx;
      $_SESSION['mem_name'] = $data[0]->mem_name;
      redirect('http://localhost.trip_php/');
    }

  }
}
?>