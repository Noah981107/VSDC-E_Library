<?php
    include "../db.php";

    $bookId = $_GET['id'];

    $query = "SELECT image, file_save_name FROM book WHERE id = '$bookId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $image_name = $row['image'];
    $file_name = $row['file_save_name']; 

    unlink("../bookImage/$image_name");
    unlink("../bookPdf/$file_name");

    $sql = "DELETE FROM book WHERE id = '$bookId'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    echo("
        <script>
            history.go(-1)
        </script>
    ");
?>