<?php
  session_start();
  unset($_SESSION["userId"]);
  unset($_SESSION["userName"]);
  
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>