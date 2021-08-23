<?php 
    include "db.php";
?>

<?php 
    session_start();
    if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
    else $userId = "";
    if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
    else $userName = "";
?>

<!Doctype html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/generalBook.css?after">
        <link rel="stylesheet" type="text/css" href="../css/myBook.css?after">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <script type="text/javascript">
            function bookDeleteCheck(){
                if(confirm("Are you sure you want to delete it?")){
                    location.href = "/service/bookDeleteService.php?id=<?php echo($row['id']); ?>";
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <?php include "sideBar.php";?>
        <section class="home-section">
            <div class="text">
                <header>
                    <?php include "header.php"; ?>
                </header>
                <div class="line"></div>
                <div class="book-wrapper">
                                   
<?php 
    $results_per_page = 10;

    $sql = "SELECT b.id, b.image, b.title, b.author, b.description, b.registered_date
    FROM book as b
    LEFT JOIN user as u
    ON b.writer = u.idx
    WHERE u.id = '$userId'";
    $sqlResult = mysqli_query($conn, $sql);
    $sqlMatch = mysqli_num_rows($sqlResult);
    if($sqlMatch === 0){
?>
                </div>
<?php
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

        $query = $sql. " LIMIT " . $page_first_result . ',' . $results_per_page;
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
                        
                            <a href = "modifyBook.php?title=<?php echo($row['title']); ?>
                                       &author=<?php echo($row['author']); ?>
                                       &description=<?php echo($row['description']); ?>
                                       &registeredDate=<?php echo($row['registered_date']);?>
                                       &bookId=<?php echo($row['id']); ?>
                                       ">
                            <i class="fas fa-wrench update-icon"></i>
                            </a>
                        </div>
                        <div class="download">
                            <a href = "/service/deleteBookService.php?id=<?php echo($row['id']); ?>">
                            <i class="fas fa-trash-alt delete-icon"></i>
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
                  <a href = "myBook.php?page=<?php echo($page);?>"><?php echo($page);?></a>
<?php  
        }  
?>
                </div>
<?php
    }
?>  
                
            </div>
            <footer>
                <?php include "footer.php";?>
            </footer>
        </section>
    </body>
</html>