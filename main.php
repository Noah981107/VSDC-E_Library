<!Doctype html>
<html>
    <head>
        <meta charset="utf-8" content="text/html">
        <link rel="stylesheet" type="text/css" href="./css/main.css">
    </head>
    <body>
      <?php 
        /*$conn = mysqli_connect("localhost", "root", "000000", "e_library");
        if (mysqli_connect_errno())
        {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "SELECT * FROM book ORDER BY id DESC";
        $res = mysqli_query($conn,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($images = mysqli_fetch_assoc($res)){
      ?>
          <div class="alb">
            <img src="bookImage/<?=$images['image']?>">
          </div>
          <div>
            <?php 
              echo $images['title'];
            ?>
          </div>
          <div>
            <?php 
              echo $images['author'];
            ?>
          </div>
      <?php 
          }
        }*/
      ?>
      <p>This is Main</p>
    </body>
</html>