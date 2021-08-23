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
    <script type="text/javascript">
            function bookDeleteCheck(){
                if(confirm("Are you sure you want to delete your account? when you press the button below, your account, your books and all other data will be removed permanently and will not be recoverable. If you decide to create another account in the future, you cannot sign up with the same id again.")){
                    location.href = "/service/deleteUserAccountService.php?id=<?php echo($row['id']); ?>";
                    return true;
                } else {
                    return false;
                }
            }
        </script>
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
            <form action="/service/modifyUserAccountService.php" method="POST">
              <h3>New Password</h3>
              <input type="password" name="password" placeholder="********" required>
              <h3>New Name</h3>
              <input type="text" name="name" placeholder="example" required>
              <h3>New E-mail</h3>
              <input type="text" name="email" placeholder="example@e_library.com" required>
              <input type = "hidden" name = "userId" value = <?php echo($userId); ?> />
              <div></div>
              <input id="submit" type="submit" value="Modify" />
              <div class="delete">
                <a href="#" onclick="bookDeleteCheck()">Delete</a>
              </div>
            </form>
          </div>
        </div>
        <footer>
        <?php include "footer.php";?>
        </footer>
      </section>
    </body>
</html>