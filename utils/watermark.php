<?php
  class WM {
    public static function createWatermark ($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct) {
      // creating a cut resource
      $cut = imagecreatetruecolor($src_w, $src_h);

      // copying relevant section from background to the cut resource
      imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
     
      // copying relevant section from watermark to the cut resource
      imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
     
      // insert cut resource to destination image
      imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
    }

    public static function getWatermarkedImage ($imgName) {
      if ($_GET["action"] == "store") $fieldName = "picture";
      if ($_GET["action"] == "update") $fieldName = "nPicture";

      switch ($_FILES[$fieldName]["type"]):
        case 'image/jpeg';
        case 'image/pjpeg';
          $tmp = imagecreatefromjpeg($_FILES[$fieldName]["tmp_name"]);
        break;
        case 'image/gif';
          $tmp = imagecreatefromgif($_FILES[$fieldName]["tmp_name"]);
        break;
        case 'image/png';
        case 'image/x-png';
          $tmp = imagecreatefrompng($_FILES[$fieldName]["tmp_name"]);
          imageAlphaBlending($tmp, true);
          imageSaveAlpha($tmp, true);
        break;
      endswitch;
  
      // $drip = imagecreatefromjpeg("view/assets/Mini_Drip.jpg");
      $drip = imagecreatefrompng("view/assets/Mini_Drip.png");
      imageAlphaBlending($drip, true);
      imageSaveAlpha($drip, true);
      $watermx = imagesy($drip);
      $watermy = imagesx($drip);
  
      $waterm_offx = imagesx($tmp) - $watermx - 6;
      $waterm_offy = imagesy($tmp) - $watermy - 6;
  
      // imagecopymerge($tmp, $drip, $waterm_offx, $waterm_offy, 0, 0, $watermx, $watermy, 100);
      WM::createWatermark($tmp, $drip, $waterm_offx, $waterm_offy, 0, 0, $watermx, $watermy, 100);

      switch ($_FILES[$fieldName]["type"]):
        case 'image/jpeg';
        case 'image/pjpeg';
          imagejpeg($tmp, "uploads/img/".$imgName);
        break;
        case 'image/gif';
          imagegif($tmp, "uploads/img/".$imgName);
        break;
        case 'image/png';
        case 'image/x-png';
          imagepng($tmp, "uploads/img/".$imgName);
        break;
      endswitch;
    }
  }