<?php 
    include "db.php";
?>

<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/generalBook.css?after">
    </head>
    <body>
        <?php include "sideBar.php";?>
        <section class="home-section">
            <div class="text">
                <header>
                    <?php include "header.php"; ?>
                </header>
<?php
    //$type = 0;
    //include "search.php"; 
?>
                <div class="book-wrapper">
                    <a href = "/service/withdrawService.php"><i class='bx bxs-door-open'></i></a> <!--여기 추가함 (회원탈퇴 아이콘)-->
                
<?php 
    $results_per_page = 10;

    $sql = "SELECT * FROM book WHERE type = 0";
    $sqlResult = mysqli_query($conn, $sql);
    $sqlMatch = mysqli_num_rows($sqlResult);
    if($sqlMatch === 0){
        echo ("
            This page is empty
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
                    <div class="book">  
                        <div class="book-info">
                            <img width = "100" height = "150" src = "../bookImage/<?php echo($row['image']); ?>">
                            <div>
                                <div class="book-title">
                                    <?php echo($row['title']); ?>
                                </div>
                                <div class="book-author">
                                    <?php echo($row['author']); ?>  
                                </div>
                                <div class="book-date">
                                    <?php echo($row['registered_date']); ?>
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
                  <a href = "generalBook.php?page=<?php echo($page);?>"><?php echo($page);?></a>
<?php  
        }  
?>
                </div>
<?php
    }
?>  
                <footer>
                    <?php include "footer.php";?>
                </footer>
            </div>
        </section>
    </body>
</html>