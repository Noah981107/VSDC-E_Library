<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8" content = "text/html">
    </head>
    <body>
        <header>
            <?php include "header.php";?>
        </header>
        <div id="search_box">
            <form action = "/service/searchService.php" method ="get">
            <select name = "category">
                <option value = "title">title</option>
                <option value = "author">author</option>
            </select>
            <input type = "text" name = "search" size = "40" required = "required" /> 
            <button>search</button>
        </div>  
        </form>
        <footer>
            <?php include "footer.php";?>
        </footer>
    </body>

</html>