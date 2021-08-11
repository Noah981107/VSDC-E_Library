<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
    </head>
    <body>
      <header>
        <?php include "header.php"; ?>
      </header>
      <form action="/service/signUpService.php" method="POST">
        <p>Id : <input type="text" name="id" placeholder="Id" required></p>
        <p>Password : <input type="password" name="password" placeholder="Password" required></p>
        <p>Name : <input type="text" name="name" placeholder="Name" required></p>
        <p>E-mail : <input type="text" name="email1" placeholder="E-Mail" required>@<input type="text" name="email2" placeholder="domain" required></p>
        <p><input type="submit" value="submit"></p>
      </form>
      <footer>
            <?php include "footer.php";?>
        </footer>
    </body>
</html>