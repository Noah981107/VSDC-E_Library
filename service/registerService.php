<?php 
    include "../db.php";
?>
<?php 
    if(isset($_FILES['image']) && isset($_FILES['file'])){


        $type = $_POST['type'];
        $title = $_POST['title'];
        $author = $_POST['author'];
    
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_error =  $_FILES['image']['error'];

        $file_name = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_error = $_FILES['file']['error'];

        $registeredDate = date("Y-m-d (H:i)");

        if($img_error === 0 && $file_error === 0){
            if($img_size > 125000){
                echo("
                <script>
                    window.alert('Sorry, Your image file is too large');
                    history.go(-1)
                </script>
                ");
            }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //png
                $img_ex_lc = strtolower($img_ex); //png

                $allowed_img_exs = array("jpg", "jpeg", "png");

                if(in_array($img_ex_lc, $allowed_img_exs)){

                    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION); // pdf
                    $file_ex_lc = strtolower($file_ex);

                    if($file_ex_lc === "pdf"){
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc; // 랜덤 16진수로 변경
                        $img_upload_path = '../bookImage/'.$new_img_name;
                        move_uploaded_file($img_tmp_name, $img_upload_path);

                        $new_file_name = uniqid("PDF-", true).'.'.$file_ex_lc;
                        $file_upload_path = '../bookPdf/'.$new_file_name;
                        move_uploaded_file($file_tmp_name, $file_upload_path);

                        if($type === 'general'){
                            $type = 0;
                        }
                        else{
                            $type = 1;
                        }

                        $sql = "INSERT INTO book(type, image, file_orig_name, file_save_name, title, author, registered_date)
                        VALUES('{$type}','{$new_img_name}', '{$file_name}', '{$new_file_name}', '{$title}', '{$author}', '{$registeredDate}')";
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
                                window.alert('It is not an pdf file');
                                history.go(-1)
                            </script>
                        "); 
                    }
                }
                else {
                    echo("
                        <script>
                            window.alert('It is not an image file');
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
