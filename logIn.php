<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/logIn.css?after">
    </head>
    <body>
      <?php include "sideBar.php";?>
      <section class="home-section">
        <div class="text">
          <header>
            <?php include "header.php";?>
          </header>  
          <div class="logInForm">
            <h1>Log in</h1>
            <form action="/service/logInService.php" method="POST">
              <h3>Id</h3>
              <input type="text" name="id" placeholder="example" required>
              <h3>Password</h3>
              <input type="password" name="password" placeholder="********" required>
              <div></div>
              <input id="submit" type="submit" value="Log in">
            </form>
          </div>
        </div>
        <footer>
              <?php include "footer.php";?>
        </footer>
      </section>
    </body>
</html>