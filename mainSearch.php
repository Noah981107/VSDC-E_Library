<div id="search_box">
    <form action = "/service/mainSearchService.php" method ="get">
        <select name = "category">
            <option value = "unifiedSearch">Unified Search</option>
            <option value = "title">Title</option>
            <option value = "author">Author</option>
        </select>
        <input type = "text" name = "search" size = "40" required = "required" /> 
        <button>search</button>
    </form>
</div>  