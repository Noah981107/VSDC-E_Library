<link rel="stylesheet" type="text/css" href="./css/header.css">

<h1 id = "test">VSDC E-Library</h1>
<?php 
  session_start();
  if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
  else $userId = "";
  if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
  else $userName = "";
?>
              <div class="topnav">
                <a href="../index.php">Home</a>
                <a href="../search.php">Search</a>
                <a href="../search.php">General Book</a>
                <a href="../search.php">Final Projenct Book</a>
<?php 
  if(!$userId){
?>
                <a href="../logIn.php">Log in</a>
                <a href="../signUp.php">Sign up</a>
<?php
  }
  else{
?>
                <a href = "../register.php">Register</a>
                <a href = "../logOut.php">Log Out</a>
<?php
  }
?>
              </div>