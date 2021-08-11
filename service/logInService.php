<?php 
    $id = $_POST['id'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "000000", "e_library");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT id, password, name FROM e_library.user WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);  

    $num_match = mysqli_num_rows($result);

    if(!$num_match){
        echo("
            <script>
                window.alert('This ID is not registered!')
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
                    window.alert('Log In Success')
                    location.href = '../index.php';
                </script>
            ");
        }
        else{
            echo("
                <script>
                    window.alert('Your password is wrong!')
                    history.go(-1)
                </script>
            ");
            exit;
        }
    }
?>