<!--Sign Up-->
<?php 
    include "../db.php";
?>
<?php 
    $id = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $registeredDate = date("Y-m-d (H:i)");
    
    //id 중복 검사
    $idCheck = "SELECT id FROM user WHERE id = '{$id}'";
    $idCheckResult = mysqli_query($conn,$idCheck);
    $idMatch = mysqli_num_rows($idCheckResult);
    if($idMatch >= 1){
        echo("
            <script>
                window.alert('ID is duplicated')
                history.go(-1)
            </script>
        ");
    }
    else{
        //email 중복 검사
        $emailCheck = "SELECT email FROM user WHERE email = '{$email}'";
        $emailCheckResult = mysqli_query($conn,$emailCheck);
        $emailMatch = mysqli_num_rows($emailCheckResult);
        if($emailMatch >= 1){
            echo("
                <script>
                    window.alert('E-mail is duplicated.')
                    history.go(-1)
                </script>
            ");
        }
        else {
            $sql = "INSERT INTO user(id, password, name, email, registered_date) 
            VALUES('{$id}', '{$password}', '{$name}', '{$email}', '{$registeredDate}')";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo ("
                <script>
                    window.alert('MemberShip Success!')
                    location.href = '../index.php'
                </script>
            ");
        }
    }
?>