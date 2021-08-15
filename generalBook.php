<?php 
    include "db.php";
?>

<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
    </head>
    <body>
        <?php include "sideBar.php";?>
        <div class = "main">
            <header>
                <?php include "header.php"; ?>
            </header>
            <div>
                <?php
                    $type = 0;
                    include "search.php"; 
                ?>
            </div>
            <div>
                <?php 
                    $results_per_page = 10;

                    $sql = "SELECT * FROM book WHERE type = 0";
                    $sqlResult = mysqli_query($conn, $sql);
                    $sqlMatch = mysqli_num_rows($sqlResult);
                    if($sqlMatch === 0){
                        echo ("
                            <script>
                                window.alert('There is nothing you are looking for.')
                                location.href = '../search.php'
                            </script>
                        ");
                    }
                    else{
                        $number_of_page = ceil ($sqlMatch / $results_per_page);

                        if (!isset ($_GET['page']) ) {  
                            $page = 1;    
                        } else {  
                            $page = $_GET['page'];  
                        }  

                        $page_first_result = ($page-1) * $results_per_page; 

                        $query = "SELECT * FROM book WHERE type = 0 LIMIT " . $page_first_result . ',' . $results_per_page;
                        $result = mysqli_query($conn, $query); 

                        while ($row = mysqli_fetch_array($result)) {
                ?>
                            <div>
                                <img width = "100" height = "145" src = "../bookImage/<?php echo($row['image']); ?>">
                            </div>
                            <div>
                                <?php echo($row['title']); ?>
                            </div>
                            <div>
                                <?php echo($row['author']); ?>  
                            </div>
                            <div>
                                <a href = "/service/downloadService.php?orig=
                                            <?php echo($row['file_orig_name']);?>
                                            &save=<?php echo($row['file_save_name']);?>">
                                    <input type ="button" value = "download">
                                </a>
                            </div>
                <?php 
                        }  
                        for($page = 1; $page<= $number_of_page; $page++) {  
                ?>
                            <a href = "generalBook.php?page=<?php echo($page);?>"><?php echo($page);?></a>
                <?php  
                        }  
                    }
                ?>  
            </div>
            <footer>
                <?php include "footer.php";?>
            </footer>
        </div>
    </body>
</html>