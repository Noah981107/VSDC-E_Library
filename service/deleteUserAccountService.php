<?php 
    include "../db.php";
?>
<?php 
    session_start();
    if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
    else $userId = "";
    if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
    else $userName = "";

    //echo($userId);
    //echo($userName);

    $sql1 = "DELETE FROM book WHERE writer = (SELECT Idx FROM user WHERE id = '$userId')";
    
    $sql2 = "DELETE FROM user WHERE id = '$userId'";

    //echo($sql1);
    //echo($sql2);

    mysqli_query($conn, $sql1);
    mysqli_query($conn, $sql2);
    mysqli_close($conn);
    
    session_start();
    unset($_SESSION["userId"]);
    unset($_SESSION["userName"]);
    echo("
        <script>
            location.href = '../index.php';
        </script>
    ");
?>