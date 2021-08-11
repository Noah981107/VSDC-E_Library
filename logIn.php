<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
    </head>
    <body>
      <header>
        <?php include "header.php";?>
      </header>
      <form action="/service/logInService.php" method="POST">
        <p>Id : <input type="text" name="id" placeholder="id" required></p>
        <p>Password : <input type="password" name="password" placeholder="password" required></p>
        <p><input type="submit" value="submit"></p>
      </form>
      <footer>
            <?php include "footer.php";?>
      </footer>
    </body>
</html>