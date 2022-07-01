<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Common {
  var $CI;

  /*=================================================
          Construct
  =================================================*/
  public function __construct() {
    $this->CI =& get_instance();
  }


  public function create($option) {
    $CI = $this->CI;

    /////#####===== 옵션 설정 =====#####/////
    $tmp_options  = array(
      "input"      => "",            //추가할 post 데이터
      "table"      => "",            //테이블 명
      "prefix"    => @$option["table"]?explode("_", get_table_pk($option["table"]))[0]:"",   //prefix
      "join"      => ""?:array(),   //JOIN 할 데이터 array("테이블 명", "일치하는 데이터 (ON) ", "조인 종류"),
    );

    $options  = array_merge($tmp_options, $option);

    @extract($options);

    /////#####===== 주키 설정 =====#####/////
    $pk      = @$pk?:(@$prefix?$prefix."_idx":get_table_pk($table));
    $pk_value  = @$pkval?:@$input[$pk]?:$this->CI->input->post($pk, TRUE);

    /////#####===== db에 들어갈 데이터 추출 =====#####/////
    $data    = array();
    foreach($input as $key=>$val) {
      //##### 네임 값에 prefix 있는 데이터만 추출(PK제외, 추가데이터 제외, repw 제외) #####//
      if(preg_match("/^{$prefix}_/", $key) && $key!=$pk) {
        if($key==$prefix."_password") {
          if($key=="bc_password" || $key == "cmnt_password") {
            $CI->db->select("PASSWORD('".$val."') as enc_password");
            $row = $CI->db->get()->row();
            $data[$key]  = $row->enc_password;
          } else if($val != "") {
            $data[$key]  = hash("sha512", $val);
          }
        }       
        else if($key==$prefix."_regdate" || $key==$prefix."_update") {
          $data[$key]  = $val?:date("Y-m-d H:i:s");
        }
        else if(is_array($val)) {
          $data[$key]  = implode("|",$val);
        }
        else {
          $data[$key] = $val;
        }
      }
    }
    
    /////#####===== 업데이트 or 인서트 =====#####/////
    if($table) {
      //각 컬럼 있는지 확인
      foreach($data as $key=>$val) {
        if(!$CI->db->field_exists($key, $table)) {
          unset($data[$key]);
        }
      }

      if( empty($data) ) {
        // 저장할 데이터가 없다면 종료
        return null;
      }

      //== 중복 확인 ==//
      $is_exist = 0;
      if ($pk_value) {
          $is_exist = $CI->db->get_where($table, array($pk => $pk_value))->num_rows();
      }

      //== 수정 ==//
      if ($is_exist > 0) {
        $CI->db->update($table, $data, array($pk => $pk_value));
      } else {
        $CI->db->insert($table, $data);
        $pk_value = $CI->db->insert_id();
      }

      //결과 값 return
      $CI->db->where(array($pk=>$pk_value));
      $result  = $CI->db->get($table)->result();
      return $result;
    }
  }


}
