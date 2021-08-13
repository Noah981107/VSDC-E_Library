<?php 
    include "../db.php";
?>
<?php
    /* 검색 변수 */
    $category = $_GET['category'];
    $search = $_GET['search'];
    switch($category){
        case "unifiedSearch" :
            $query = "SELECT * FROM book WHERE title OR author LIKE '%$search%' ORDER BY id";
            break;
        case "title" :
            $query = "SELECT * FROM book WHERE title LIKE '%$search%' ORDER BY id";
            break;
        case "author" :
            $query = "SELECT * FROM book WHERE author LIKE '%$search%' ORDER BY id";
            break;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
        <link rel="stylesheet" type="text/css" href="../css/header.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
    </head>
    <body>
        <header>
            <div><?php include "../header.php";?></div>
            <div><?php include "../mainSearch.php"; ?></div>
        </header>
        <?php 
            $result = mysqli_query($conn, $query);
            $resultNum = mysqli_num_rows($result);
        ?>
        <h1>A total of <?php echo($resultNum);?> books were found as a result of <?php echo($category);?> for <?php echo($search);?></h1>
        <?php
            if($resultNum === 0){
                echo ("
                    <script>
                        window.alert('There is nothing you are looking for.')
                        location.href = '../index.php'
                    </script>
                ");
            }
            else{
                $results_per_page = 10;
                $number_of_page = ceil($resultNum / $results_per_page);

                if (!isset ($_GET['page']) ) {  
                    $page = 1;    
                } else {  
                    $page = $_GET['page'];  
                }  

                $page_first_result = ($page-1) * $results_per_page; 

                $query2 = $query." LIMIT " . $page_first_result . ',' . $results_per_page;
                echo($query2);
                $result2 = mysqli_query($conn, $query2);
                while($row = mysqli_fetch_array($result2)){
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
                    <a href = "mainSearchService.php?category=<?php echo($category);?>&search=<?php echo($search); ?>&page=<?php echo($page);?>"><?php echo($page);?></a>
        <?php
                }
            }
        ?>
        <footer>
            <?php include "../footer.php";?>
        </footer>
    </body>
</html>