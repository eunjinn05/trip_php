<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends MY_Controller {
  function __construct() {
    parent::__construct();
  }

  function uploadFile() {
		if (count($_FILES)) {
      $yearmonth = date('Y-m');
      $target_dir = "assets/upload/".$yearmonth."/";

      if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
      }

      foreach ($_FILES as $k=>$v) {
        $array=[];
        $fileinfo = pathinfo($v['name']);
        $ext = $fileinfo['extension'];
      
        if($ext == "png" || $ext == "jpg" || $ext == "jpeg") {
          if (gettype($v['tmp_name'])!='array') {
            if ($filename=$this->uploadImages($v['tmp_name'], $target_dir, $ext)) {
              $array[]=$filename;
            }
          } else {
            for ($i=0;$i<count($v['tmp_name']);$i++) {
              if ($filename=$this->uploadImages($v['tmp_name'][$i], $target_dir, $ext)) {
                $array[]=$filename;
              }
            }
          }
        } else {
          if (gettype($v['tmp_name'])!='array') {
            if ($filename=$this->uploadFile($v['tmp_name'], $v['name'], $target_dir)) {
              $array[]=$filename;
            }
          } else {
            for ($i=0;$i<count($v['tmp_name']);$i++) {
              if ($filename=$this->uploadFile($v['tmp_name'][$i], $v['name'][$i], $target_dir)) {
                $array[]=$filename;
              }
            }
          }
        }
        if ($array) {
          echo json_encode(array('data'=>$array));
        }
      }
    }
  }

	function uploadImages($tmp_name, $target_dir, $ext) {
    if ($tmp_name) {
      $o_info=getimagesize($tmp_name);
      $mime=explode('/', $o_info['mime']);
      if ($mime[0]=='image') {
        $filename=md5_file($tmp_name);
        $target_file=$target_dir.$filename.'.'.$ext;
        if (!is_file($target_file)) {
          if (move_uploaded_file($tmp_name, $target_file)) {
           $this->img_limit_resize($target_file, 600);
          }
        }
        return $target_file;
      }
    }
	    return false;
  }

  function img_limit_resize($real,$wid_size){   //이미지경로,변경할가로길이
    $img_info = GetImageSize($real);
		$img_wid = $img_info[0];
		$img_hei = $img_info[1];
		$img_type = $img_info['mime'];
		if($img_wid>$wid_size){ //업로드이미지가 기준사이즈보다 클경우 이미지 사이즈 축소저장
			$re_hei = (int)(($img_hei*$wid_size)/$img_wid);
			$im=imagecreatetruecolor($wid_size,$re_hei); //이미지의 크기를 정합니다.
			if ($img_type == 'image/png')
				$im2 = imagecreatefrompng($real);
			else
				$im2 = imagecreatefromjpeg($real);
			imagecopyresized($im, $im2,0,0,0,0,$wid_size,$re_hei,$img_wid,$img_hei);
			imagepng($im,$real); //ImagePNG(이미지, 저장될파일)
			ImageDestroy($im); // 이미지에 사용한 메모리 제거
		}
	}

}