<?php 
    include "../db.php";
?>
<?php 
    $id = $_POST['id'];
    $password = $_POST['password'];

    $sql = "SELECT id, password, name FROM user WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);  
    $num_match = mysqli_num_rows($result);

    if($num_match <= 0){
        echo("
            <script>
                history.go(-1)
            </script>
        ");
    }
    else{
        $row = mysqli_fetch_array($result);
        $db_password = $row["password"];
        if(password_verify($password, $db_password)){
            session_start();
            $_SESSION["userId"] = $row["id"];
            $_SESSION["userName"] = $row["name"];
            echo("
                <script>
                    location.href = '../index.php';
                </script>
            ");
        }
        else{
            echo("
                <script>
                    history.go(-1)
                </script>
            ");
            exit;
        }
    }
?>