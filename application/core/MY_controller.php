<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  var $data  = array();

  /*=================================================
          생성자
  =================================================*/
  function __construct() {
    parent::__construct();
    $this->data = get_router();
  }

  function loadView($skin, $data) {
    if( is_null($skin) ) $skin = MAIN_LAYOUT;
    (!$data) ? $data = array() : '';

    $data = array_merge($data, $this->data);
    $this->load->view($skin, $data);
  }

  function load404() {
    show_404('errors/html/error_404.php');
  }
}
