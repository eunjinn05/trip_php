<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("board_model");
  }

  function aaa() {

    $this->board_model->func();

  }
}
?>