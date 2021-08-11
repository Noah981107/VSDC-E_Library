<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php include "header.php";?>
        </header>
        <form action ="/service/registerService.php" method="POST" enctype='multipart/form-data'>
            <INPUT TYPE=hidden name=mode value=insert>
            <TABLE>
                <TR> <TD>Image to upload : </TD>
                <TD><input type='file' name='image' required></TD></TR>
                <TR> <TD>Title : </TD>
                <TD><input type='text' name='title' required></TD></TR>
                <TR> <TD>Author : </TD>
                <TD><input type='text' name='author' required></TD></TR>
                <TR> <TD>Contents of the book : </TD>
                <TD><input type='file' name='contents' required></TD></TR>
                <TR> <TD colspan = 2>
                <input type='submit' value='Register Book Information'></TD></TR>
            </TABLE>
        </form>
        <footer>
            <?php include "footer.php";?>
        </footer>
    </body>

</html>