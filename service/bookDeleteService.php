<?php
    include "../db.php";

    $bookId = $_GET['id'];

    $sql = "DELETE FROM book WHERE id = '$bookId'";
    mysqli_close($conn, $sql);
    mysqli_close($conn);

    echo("
        <script>
            history.go(-1)
        </script>
    ");
?>
