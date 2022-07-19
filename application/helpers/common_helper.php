<?
if ( ! function_exists('get_router')) {
    function get_router() {
        static $data = null;
        if (is_null($data)) {
            $CI =& get_instance();
            /////#####===== 시스템 정보 =====#####/////
            $data["fetch_directory"] = $CI->router->directory;
            $data["fetch_class"] = $CI->router->class;
            $data["fetch_method"] = $CI->router->method;
            $data["fetch_views"] = VIEWPATH . $data["fetch_directory"] . $data["fetch_class"] . "/" . $data["fetch_method"] . ".php";

            return $data;
        }
    }
}

if ( ! function_exists('get_table_pk')) {
    /*=================================================
        테이블 주키 호출
    =================================================*/
    function get_table_pk($table = "") {
      $CI =& get_instance();
  
      $result = $CI->db->field_data($table);
      $pk = "";
  
      foreach ($result as $key => $val) {
        if ($val->primary_key) {
          $pk = $val->name;
          break;
        }
      }
      return $pk;
    }
  }
  
if ( ! function_exists('alert')) {
  /*=================================================
      Alert 창
  =================================================*/
  function alert($msg="", $url="", $historyback = false) {
    $CI =& get_instance();

    if($msg) {
      $CI->session->set_tempdata('alert_msg', json_encode($msg), 10);
    }

    if($url) {
      redirect($url);
    } else{
      $url = $CI->agent->referrer();
      if( $url && !$historyback ) {
        redirect($url, 'refresh');
      } else {
        echo "<script type='text/javascript'>";   


        echo "history.go(-1);";
        echo "</script>";
      }

    }
  }
}

?>