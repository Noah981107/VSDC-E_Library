<?php 
    include "../db.php";
?>
<?php
    /* 검색 변수 */
    $category = $_GET['category'];
    $search = $_GET['search'];
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
            <?php include "../header.php";?>
        </header>
        <h1><?php echo $search; ?> search results in <?php echo $category; ?></h1>
        <?php
            $query = "SELECT * from book where $category like '%$search%' order by id DESC";
            $result = mysqli_query($conn, $query);

            $resultNum = mysqli_num_rows($result);
            if($resultNum === 0){
                echo ("
                    <script>
                        window.alert('There is nothing you are looking for.')
                        location.href = '../search.php'
                    </script>
                ");
            }
            else{
                while($row = mysqli_fetch_array($result)){
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

            }
        ?>
        <div id="search_box">
            <form action = "/service/searchService.php" method ="get">
            <select name = "category">
                <option value = "title">title</option>
                <option value = "author">author</option>
            </select>
            <input type = "text" name = "search" size = "40" required = "required" /> 
            <button>search</button>
        </div>
        </form>
        <footer>
            <?php include "../footer.php";?>
        </footer>
    </body>
</html>