<?php
    include "../db.php";
?>
<?php 
  session_start();
  if(isset($_SESSION["file_orig_name"])) $file_orig_name = $_SESSION["file_orig_name"];
  else $file_orig_name = "";
  if(isset($_SESSION["file_save_name"])) $file_save_name = $_SESSION["file_save_name"];
  else $$file_save_name = "";
?>
<?php 
    echo($file_orig_name);
    echo($file_save_name);
?>
<?php 
    $fileDir = "../bookPdf/";
    $fullPath = $fileDir."/".$file_save_name;
    $length = filesize($fullPath);

    header("Content-Type: application/octet-stream");
    header("Content-Length: $length");
    header("Content-Disposition: attachment; filename=".iconv('utf-8','euc-kr',$file_orig_name));
    header("Content-Transfer-Encoding: binary");

    $fh = fopen($fullPath, "r");
    fpassthru($fh);
?>