<!--회원 가입-->
<?php 
    $id = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $password = password_hash($password, PASSWORD_BCRYPT);

    $email = $email1."@".$email2;
    $registeredDate = date("Y-m-d (H:i)");
    

    //db.연결
    $conn = mysqli_connect("localhost", "root", "000000", "e_library");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //id 중복 검사
    $idCheck = "SELECT id FROM e_library.user WHERE id = '{$id}'";
    $idResult = mysqli_query($conn,$idCheck);
    if($idResult == null){
        echo("
            <script>
                window.alert('ID is duplicated')
                history.go(-1)
            </script>
        ");
    }
    else{
        $emailCheck = "SELECT email FROM e_library.user WHERE email = '{$email}'";
        $emailResult = mysqli_query($conn,$emailCheck);
        if($emailResult == null){
            echo("
            <script>
                window.alert('E-mail is duplicated.')
                history.go(-1)
            </script>
        ");
        }
        else{
            $sql = "INSERT INTO e_library.user(id, password, name, email, registered_date) 
            VALUES('{$id}', '{$password}', '{$name}', '{$email}', '{$registeredDate}')";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo "
                <script>
                    window.alert('MemberShip Success!')
                    location.href = '../index.php'
                </script>
            ";
        }
    }
?>