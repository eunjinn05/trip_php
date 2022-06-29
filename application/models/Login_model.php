<?
class Login_model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  function exec_member_duplicate_check() {
    $input = $this->input->post();
    $this->db->where("mem_id", $input["mem_id"]);
    $mem = $this->db->get("member")->row();

    return ($mem) ? true : false;   
  }

}
