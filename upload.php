<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/upload.css?after">
    </head>
    <body>
        <?php include "sideBar.php";?>
        <section class="home-section"> 
            <div class="text">
                <header>
                    <?php include "header.php";?>
                </header>
                <div class="uploadForm">
                    <form action ="/service/uploadService.php" method="POST" enctype='multipart/form-data'>
                        <h3>Select Type</h3>
                        <select name = "type">
                            <option value = "general">General</option>
                            <option value = "finalProject">Final Project</option>
                        </select>
                        <h3>Title</h3>
                        <input type='text' name='title' required>
                        <h3>Author</h3>
                        <input type='text' name='author' required>
                        <h3>Description</h3>
                        <input type='text' name='description' maxlength = "40" required>
                        
                        <div class="filebox">
                            <input class="upload-name" value="파일선택" disabled="disabled">
                            <label for="ex_filename">업로드</label>
                            <input type="file" id="ex_filename" class="upload-hidden">
                        </div>


                        <h3>File</h3>
                        <div class="imgbox"> 
                        <label for="img">select img</label> 
                        <input type="img" id="img"> 
                        <input class="upload-name" value="...">
                        </div>
                        <div></div>
                        <input type='submit' value='Register Book Information'>
                        </TABLE>
                    </form>
                </div>
                <footer>
                    <?php include "footer.php";?>
                </footer>
            </div>
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