<?php 
    include "../db.php";
?>
<?php
    /* 검색 변수 */
    $category = $_GET['category'];
    $search = $_GET['search'];
    $type = $_GET['type'];
    switch($category){
        case "all" :
            $query = "SELECT * FROM book WHERE (title OR author LIKE '%$search%' 
                      OR title = '$search'
                      OR author = '$search')";
            break;
        case "title" :
            $query = "SELECT * FROM book WHERE (title LIKE '%$search%' 
                      OR title = '$search')";
            break;
        case "author" :
            $query = "SELECT * FROM book WHERE (author LIKE '%$search%' 
                      OR author = '$search')";
            break;
    }
    switch($type){
        case 0 : 
            $query2 = $query . " AND type = 0 " . "ORDER BY id";
            break;
        case 1 : 
            $query2 = $query . " AND type = 1 " . "ORDER BY id";
            break;
        case 2 :
            $query2 = $query . " ORDER BY id";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/generalBook.css?after">
    </head>
    <body>
        <?php include "../sideBar.php"?>
        <section class="home-section">
            <div class="text">
                <header>
                    <?php include "../header.php";?>
                </header>
                
<?php include "../search.php";?>
                <div class="line"></div>
<?php 
    $result = mysqli_query($conn, $query2);
    $resultNum = mysqli_num_rows($result);
?>
                <h1>A total of <?php echo($resultNum);?> books were found as a result of <?php echo($category);?> for <?php echo($search);?></h1>
<?php
    if($resultNum === 0){
        /*echo ("
            <script>
                window.alert('There is nothing you are looking for.')
                location.href = '../index.php'
            </script>
        ");*/
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

        $query3 = $query2." LIMIT " . $page_first_result . ',' . $results_per_page;

        $result2 = mysqli_query($conn, $query3);
?>
                <div class="book-wrapper">    
<?php
        while($row = mysqli_fetch_array($result2)){
?>
                     <div class="book">  
                        <div class="book-info">
                            <img width = "100" height = "150" src = "../bookImage/<?php echo($row['image']); ?>">
                            <div>
                                <div class="book-title">
                                    <?php echo($row['title']); ?>
                                </div>
                                <div class="book-authordate">
                                    <div class="book-author">
                                        <?php echo($row['author']); ?>  
                                    </div>
                                    <div class="book-date">
                                        <?php echo($row['registered_date']); ?>
                                    </div>
                                </div>
                                <div class="book-description">
                                    <?php echo($row['description']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="download">
                            <a href = "/service/downloadService.php?orig=<?php echo($row['file_orig_name']);?>&save=<?php echo($row['file_save_name']);?>">
                                <i class='bx bx-download download-icon'></i>
                            </a>
                        </div>
                    </div>   <!--여기가 bood div 닫히는곳-->
<?php            
        }
?>
                </div>
                <div class="page-number">
<?php
        for($page = 1; $page<= $number_of_page; $page++) {
?>
                    <a href = "searchService.php?category=<?php echo($category);?>&search=<?php echo($search); ?>&page=<?php echo($page);?>"><?php echo($page);?></a>
<?php
        }
?>
                </div>
<?php
    }
?>
            </div> <!--div.text-->
            <footer>
                <?php include "../footer.php";?>
            </footer>
        </section>
    </body>
</html>