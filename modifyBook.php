<?php 
    $title = $_GET['title'];
    $author = $_GET['author'];
    $description = $_GET['description'];
    $registeredDate = $_GET['registeredDate'];
    $bookId = $_GET['bookId'];
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/upload.css?after">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
            $(document).ready(function(){ var fileTarget = $('.filebox .upload-hidden'); 
            fileTarget.on('change', function(){ // 값이 변경되면 
                if(window.FileReader){ // modern browser 
                    var filename = $(this)[0].files[0].name; 
                } else { // old IE 
                    var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출 
                } // 추출한 파일명 삽입 
                    $(this).siblings('.upload-name').val(filename); 
                }); 
            });

        </script>
    </head>
    <body>
        <?php include "sideBar.php";?>
        <section class="home-section"> 
            <div class="text">
                <header>
                    <?php include "header.php";?>
                </header>
                <div class="uploadForm">
                    <form action ="/service/modifyBookService.php" method="POST" enctype='multipart/form-data'>
                        <h5>Type</h5>
                        <select name = "type">
                            <option value = "general">General</option>
                            <option value = "finalProject">Final Project</option>
                        </select>
                        <h5>Title</h5>
                        <input type='text' name='title' value=<?php echo($title); ?> required>
                        <h5>Author</h5>
                        <input type='text' name='author' value=<?php echo($author); ?> required>
                        <h5>Description</h5>
                        <textarea name="description" cols="30" rows="10" maxlength="80"> <?php echo($description); ?> </textarea>
                        
                        <h5>Image</h5>
                        <div class="filebox"> 
                            <input class="upload-name" value="select image" disabled="disabled"> 
                            <label for="image">browse</label> 
                            <input type="file" id="image" name="image" class="upload-hidden" required> 
                        </div>

                        <h5>File</h5>
                        <div class="filebox"> 
                            <input class="upload-name" value="select file" disabled="disabled"> 
                            <label for="file">browse</label> 
                            <input type="file" id="file" name="file" class="upload-hidden" required> 
                        </div>

                        <input type = "hidden" name = "bookId" value = <?php echo($bookId); ?> /> 

                        <div></div>
                        <input type='submit' id="submit" value='Modify Book Information'>
                        </TABLE>
                    </form>
                </div>
                
            </div>
            <footer>
                <?php include "footer.php";?>
            </footer>
        </section>
        <script>
            $(document).ready(function(){ var fileTarget = $('.filebox .upload-hidden'); fileTarget.on('change', function(){ // 값이 변경되면 
                if(window.FileReader){ // modern browser 
                    var filename = $(this)[0].files[0].name; 
                } 
                else { // old IE 
                    var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출 
                } 
                // 추출한 파일명 삽입 
                $(this).siblings('.upload-name').val(filename); }); });

        </script>
    </body>
</html>