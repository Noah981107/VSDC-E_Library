<link rel="stylesheet" type="text/css" href="/css/sideBar.css">

<?php 
    session_start();
    if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
    else $userId = "";
    if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
    else $userName = "";
?>
    <div class="sidenav">
        <a href="../index.php">Home</a>
        <a href="../generalBook.php">General Book</a>
        <a href="../finalProjectBook.php">Final Project Book</a>
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