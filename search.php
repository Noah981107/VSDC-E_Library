<head>
    <script src="https://kit.fontawesome.com/4c0b35c1e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/search.css">
</head>


<div class="wrapper">
    <form id="content" action = "/service/searchService.php" method ="get"> 
        <select name = "category">
            <option value = "all">All</option>
            <option value = "title">Title</option>
            <option value = "author">Author</option>
        </select>
        <input type = "text" name = "search" size = "40" required = "required" />
        <input type = "hidden" name = "type" value = <?php echo($type); ?> /> 
        <button type="submit" class="search" id="search-btn"><i class="fas fa-search fa-2x"></i></button>
    </form>
</div>