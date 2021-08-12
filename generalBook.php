<?php 
    include "db.php";
?>

<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
    </head>
    <body>
        <header>
            <?php include "header.php"; ?>
        </header>
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
                        echo($row['id']. ' '); 
                        echo "<img src = '../bookImage/{$row['image']}'>";
                        echo($row['title'] .' ' . $row['author'].' ');
                        echo "<a href = '/service/downloadService.php?orig={$row['file_orig_name']}&save={$row['file_save_name']}'><input type='button' value='download'></a>"."</br>"; 
                    }  
                    for($page = 1; $page<= $number_of_page; $page++) {  
                        echo '<a href = "generalBook.php?page=' . $page . '">' . $page . ' </a>';  
                    }  
                }
            ?>  
        </div>
        <footer>
            <?php include "footer.php";?>
        </footer>
    </body>
</html>