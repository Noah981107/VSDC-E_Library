<?php 
    include "../db.php";
?>
<?php 
    session_start();
    if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
    else $userId = "";
    if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
    else $userName = "";

    $sql = "DELETE FROM user WHERE id = '$userId'";
    mysqli_query($conn, $sql);
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