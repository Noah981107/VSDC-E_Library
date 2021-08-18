<?php 
    session_start();
    if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
    else $userId = "";
    if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
    else $userName = "";
?>

<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/signUp.css?after">
    </head>
    <body>
      <?php include "sideBar.php"; ?>
      <section class="home-section">
        <div class="text">
          <header>
            <?php include "header.php"; ?>
          </header>
          <div class="signUpForm">
            <h1>Information modification</h1></br>
            <form action="/service/userModifyService.php" method="POST">
              <h3>Id : <?php echo($userId); ?></h3>
              <h3>Password</h3>
              <input type="password" name="password" placeholder="********" required>
              <h3>Name : <?php echo($userName); ?></h3>
              <h3>E-mail</h3>
              <input type="text" name="email" placeholder="example@e_library.com" required>
              <div></div>
              <input id="submit" type="submit" value="Change">
            </form>
          </div>
          <footer>
            <?php include "footer.php";?>
          </footer>
        </div>
      </section>
    </body>
</html>