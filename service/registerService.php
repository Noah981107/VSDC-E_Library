<?php 
    if(isset($_FILES['image'])){
        echo "<pre>";
        print_r($_FILES['image']);
        echo "</pre>";

        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error =  $_FILES['image']['error'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $registeredDate = date("Y-m-d (H:i)");

        if($error === 0){
            if($img_size > 125000){
                echo("
                <script>
                    window.alert('Sorry, Your file is too large');
                    history.go(-1)
                </script>
                ");
            }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //png
                $img_ex_lc = strtolower($img_ex); //png

                $allowed_exs = array("jpg", "jpeg", "png");

                if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc; // 랜덤 16진수로 변경
                    $img_upload_path = '../bookImage/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    
                    $conn = mysqli_connect("localhost", "root", "000000", "e_library");
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $sql = "INSERT INTO book(image, title, author, registered_date)
                            VALUES('{$new_img_name}', '{$title}', '{$author}', '{$registeredDate}')";
                    mysqli_query($conn, $sql);
                    echo("
                        <script>
                            window.alert('Register Success!')
                            location.href = '../index.php'
                        </script>
                    ");
                }
                else {
                    echo("
                        <script>
                            window.alert('You can't upload files of this type!');
                            history.go(-1)
                        </script>
                    "); 
                }
            }
        }
        else {
            echo("
            <script>
                window.alert('Sorry, Unkown error occurred!');
                history.go(-1)
            </script>
            ");            
        }
    }
    else {
        echo "hello";
    }
?>
