<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php include "sideBar.php";?>
        <div class = "main"> 
            <header>
                <?php include "header.php";?>
            </header>
            <form action ="/service/registerService.php" method="POST" enctype='multipart/form-data'>
                <INPUT TYPE=hidden name=mode value=insert>
                <TABLE>
                    <TR> 
                        <TD>Select Type : </TD>
                        <TD>
                            <select name = "type">
                                <option value = "general">General</option>
                                <option value = "finalProject">Final Project</option>
                            </select>
                        </TD>
                    </TR>
                    <TR> <TD>Title : </TD>
                    <TD><input type='text' name='title' required></TD></TR>
                    <TR> <TD>Author : </TD>
                    <TD><input type='text' name='author' required></TD></TR>
                    <TR> <TD>Image to upload : </TD>
                    <TD><input type='file' name='image' required></TD></TR>
                    <TR> <TD>File to upload : </TD>
                    <TD><input type='file' name='file' required></TD></TR>
                    <TR> <TD colspan = 2>
                    <input type='submit' value='Register Book Information'></TD></TR>
                </TABLE>
            </form>
            <footer>
                <?php include "footer.php";?>
            </footer>
        </div>
    </body>
</html>