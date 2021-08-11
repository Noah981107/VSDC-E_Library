<?php 
    $image = fopen($_FILES['image']['tmp_name'], 'rb');
    $title = $_POST['title'];
    $author = $_POST['author'];
    $file = fopen($_FILES['contents']['tmp_name'], 'rb');
    $registeredDate = date("Y-m-d (H:i)");

    $conn = mysqli_connect("localhost", "root", "000000", "e_library");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO e_library.book(image, title, author, contents, registered_date)
            VALUES('{$image}', '{$title}', '{$author}', '{$file}', '{$registeredDate}')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "
        <script>
            window.alert('Register Success!')
            location.href = '../index.php'
        </script>
    ";
?>
