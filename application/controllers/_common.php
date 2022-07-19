<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class _common extends CI_Controller {
  function __construct() {
    parent::__construct();

    $this->data = get_router();
  }

  /*=================================================
          세션 정보 가져오기
  =================================================*/
  public function get_session() {
    /////#####===== 파라메터 설정 =====#####/////
    $key  = $this->input->get("key", TRUE)?:"";

    if($this->input->is_ajax_request()) {
      echo @$_SESSION["{$key}"]?:"";
    }

    if($key=="alert_msg") {
      unset($_SESSION['alert_msg']);
    }
  }


}

