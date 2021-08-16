<link rel="stylesheet" type="text/css" href="./css/signUp.css">

<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
    </head>
    <body>
      <?php include "sideBar.php"; ?>
      <section class="home-section">
        <header>
          <?php include "header.php"; ?>
        </header>
        <div class="signUpForm">
          <h1>Sign up</h1>
          <form action="/service/signUpService.php" method="POST">
            <h3>Id</h3>
            <input type="text" name="id" placeholder="example" required>
            <h3>Password</h3>
            <input type="password" name="password" placeholder="********" required>
            <h3>Name</h3>
            <input type="text" name="name" placeholder="example" required>
            <h3>E-mail</h3>
            <input type="text" name="email" placeholder="example@e_library.com" required>
            <div></div>
            <input id="submit" type="submit" value="Sign up">
          </form>
        </div>
        <footer>
          <?php include "footer.php";?>
        </footer>
      </section>
    </body>
</html>