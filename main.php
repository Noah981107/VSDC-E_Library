<?php 
  include "db.php";
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8" content="text/html">
        <link rel="stylesheet" type="text/css" href="../css/main.css?after">
    </head>
    <body>
<?php 
  $type = 2;
  include "search.php";
?>
<?php 
  $sql = "SELECT * FROM book WHERE type= 0 order by rand() limit 4";
  $result = mysqli_query($conn, $sql);
?>        
          <div class="today">Today's Recommendation!</div>
          <div class="recommend-wrapper">
            <div class="type-name">General Book</div>
            <div class="recommend-general">
<?php
  $num = mysqli_num_rows($result);
  for($i=0; $i<$num; $i++){
  $row = mysqli_fetch_array($result);
?>   
              <div class="recommend-book">
                <a href = "/service/downloadService.php?orig=<?php echo($row['file_orig_name']);?>&save=<?php echo($row['file_save_name']);?>">
                  <img  width = "130" height = "170" src = "../bookImage/<?php echo($row['image']); ?>">
                </a>
                <div class="title"><?php echo($row['title']);?></div>
                <div class="author"><?php echo($row['author']);?></div>
              </div>
<?php
  } 
?>
            </div>
          </div>
          
          <div class="recommend-wrapper">
            <div class="type-name">Final Project Book</div>
            <div class="recommend-project">
<?php
  $sql = "SELECT * FROM book WHERE type= 1 order by rand() limit 3";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
?>
            <div class="recommend-book">
                <a href = "/service/downloadService.php?orig=<?php echo($row['file_orig_name']);?>&save=<?php echo($row['file_save_name']);?>">
                  <img  width = "130" height = "170" src = "../bookImage/<?php echo($row['image']); ?>">
                </a>
                <div class="title"><?php echo($row['title']);?></div>
                <div class="author"><?php echo($row['author']);?></div>
              </div>
<?php
  }
?>
            </div>
          </div>
    </body>
</html>