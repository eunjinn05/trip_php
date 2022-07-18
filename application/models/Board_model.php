<?
class Board_model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  function get_category($bcat_depth, $bcat_parent=null) {
    $CI =& get_instance();

    $CI->db->where("bcat_depth", $bcat_depth);
    ($bcat_parent) ?  $CI->db->where("bcat_parent", $bcat_parent) : '';
    return $bcat = $CI->db->get("board_category")->result();
  }

  function get_banner() {
    $CI =& get_instance();
    return $bcat = $CI->db->get("main_banner")->result();

  }
}
