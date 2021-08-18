<?php 
    include "../db.php";
?>
<?php 
    session_start();
    if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
    else $userId = "";
    if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
    else $userName = "";

    $password = $_POST['password'];

    $email = $_POST['email'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $modifiedDate = date("Y-m-d (H:i)");

    $sql = "UPDATE user
            SET password = '$password', email = '$email', modified_date = '$modifiedDate'
            WHERE id = '$userId'";
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