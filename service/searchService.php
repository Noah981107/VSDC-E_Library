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
            $sql = "SELECT * from book where $category like '%$search%' order by id DESC";
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
                $board = mysqli_fetch_assoc($sqlResult);
                while($sqlMatch > 0){
                    $sqlMatch -= 1;
                    $image = $board['image'];
                    echo "<img src = '../bookImage/$image'>";
                    echo "title : ".$board['title']." "."author : ".$board['author']."</br>";
                    session_start();
                    $_SESSION["file_orig_name"] = $board['file_orig_name'];
                    $_SESSION["file_save_name"] = $board['file_save_name'];
                    echo "<a href = 'downloadService.php'><input type='button' value='download'></a>";
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