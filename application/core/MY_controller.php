<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  var $data  = array();

  /*=================================================
          생성자
  =================================================*/
  function __construct() {
    parent::__construct();
  }

  function loadView($skin, $data) {
    if( is_null($skin) ) $skin = MAIN_LAYOUT;

    // var_dump($data); exit;
    $this->data = get_router();
    $data = array_merge($data, $this->data);
    $this->load->view($skin, $data);
  }

  function load404() {
    show_404('errors/html/error_404.php');
  }
}
