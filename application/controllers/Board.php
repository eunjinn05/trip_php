<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("board_model");
  }

  function review_write() {
    $data['bcat'] = $this->board_model->get_category(0);
		$this->loadView(null, $data);
  }
  
  function get_category($bcat_depth, $bcat_parent) {
    $bcat = $this->board_model->get_category($bcat_depth, $bcat_parent);
    echo json_encode(array('bcat'=>$bcat));
  }
}
?>