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

  function normal_login() {
    $input = $this->input->post();
    $this->db->where("mem_id", $input["mem_id"]);
    $this->db->where("mem_type", 'normal');
    $mem = $this->db->get("member")->row();
    var_dump($mem);

    if ($mem) {
      if( $mem->mem_password == hash("sha512", $input['mem_password']) ) {
        $_SESSION['mem_idx'] = $mem->mem_idx;
        $_SESSION['mem_name'] = $mem->mem_name;

        redirect(DIRECTORY);
      } else {
        alert('비밀번호를 확인하세요', DIRECTORY.'/login/login');
      }
    } else {
      alert('아이디를 확인하세요', DIRECTORY.'/login/login');
    }
  }
  
  function kakao_login() {
    $url = 'https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=fa96067c8cb2bed84a268007831d5897&code='.$_GET['code'];
    $fields = array(
      'grant_type' => 'authorization_code',
      'client_id' => 'fa96067c8cb2bed84a268007831d5897',
      'redirect_uri' => 'http://localhost.trip_php/login/kakao_login',
      'code' => $_GET['code']
    );
    $headers = array(
      'Content-Type: application/x-www-form-urlencoded'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    var_dump($result);

  }
}
?>