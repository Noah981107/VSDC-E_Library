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