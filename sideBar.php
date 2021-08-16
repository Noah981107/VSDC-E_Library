<link rel="stylesheet" href="/css/sidebar2.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php 
    session_start();
    if(isset($_SESSION["userId"])) $userId = $_SESSION["userId"];
    else $userId = "";
    if(isset($_SESSION["userName"])) $userName = $_SESSION["userName"];
    else $userName = "";
?>

<div class="sidebar">

    <div class="logo-details">
        <i class='bx bx-library icon' ></i>
        <div class="logo_name">E-Library</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>

    <ul class="nav-list">
        <li>
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>
        <li>
            <a href="../generalBook.php">
                <i class='bx bx-book' ></i>
                <span class="links_name">General Book</span>
            </a>
            <span class="tooltip">General Book</span>
        </li>
        <li>
            <a href="../finalProjectBook.php">
                <i class='bx bxs-book-bookmark' ></i>
                <span class="links_name">Final Project Book</span>
            </a>
            <span class="tooltip">Final Project Book</span>
        </li>
<?php 
        if(!$userId){
?>
            <li>
                <a href="../logIn.php">
                    <i class='bx bx-log-in' ></i>   
                    <span class="links_name">Log in</span>
                </a>
                <span class="tooltip">Login</span>
            </li>
            <li>
                <a href="../signUp.php">
                    <i class='bx bx-user-plus' ></i>
                    <span class="links_name">Sign in</span>
                </a>
                <span class="tooltip">Sign in</span>
            </li>
<?php
        }
        else{
?>
           <li>
                <a href="../register.php">
                    <i class='bx bx-cloud-upload' ></i>
                    <span class="links_name">Upload Book</span>
                </a>
                <span class="tooltip">Upload Book</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog' ></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
<?php
        }
?>
        <li class="profile">
            <div class="profile-details">
                <img src="profile.jpg" alt="profileImg">
                <div class="name_job">
                    <div class="name"></div>
                    <div class="job">Professor</div>
                </div>
            </div>
            <a href="logOut.php">
                <i class='bx bx-log-out' id="log_out" ></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
    });

    searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
    if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
    }
  }
</script>