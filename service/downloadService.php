<?php
    include "../db.php";
?>
<?php 
  if(isset($_GET["orig"])) $file_orig_name = $_GET["orig"];
  else $file_orig_name = "";
  if(isset($_GET["save"])) $file_save_name = $_GET["save"];
  else $file_save_name = "";
?>
<?php
    ob_start(); 
    $fileDir = "../bookPdf";
    $fullPath = $fileDir."/".$file_save_name;
    $length = filesize($fullPath);

    header("Pragma: public");
    header("Expires: 0");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=".iconv('utf-8','utf-8',$file_orig_name));
    header("Content-Length: $length");
    header("Content-Transfer-Encoding: binary");

    ob_clean();
    flush();
    readfile($fullPath);

?>
