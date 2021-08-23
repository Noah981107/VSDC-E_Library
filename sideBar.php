<link rel="stylesheet" href="/css/sideBar2.css?after">
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
            <a href="../index.php">
                <i class='bx bx-home'></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
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
                <span class="tooltip">Log in</span>
            </li>
            <li>
                <a href="../signUp.php">
                    <i class='bx bx-user-plus' ></i>
                    <span class="links_name">Sign up</span>
                </a>
                <span class="tooltip">Sign up</span>
            </li>
<?php
        }
        else{
?>
           <li>
                <a href="../upload.php">
                    <i class='bx bx-cloud-upload' ></i>
                    <span class="links_name">Upload Book</span>
                </a>
                <span class="tooltip">Upload Book</span>
            </li>
            <li>
                <a href="../myBook.php">
                    <i class='bx bx-book-heart'></i>
                    <span class="links_name">My Book</span>
                </a>
                <span class="tooltip">My Book</span>
            </li>
            <li>
                <a href="../modifyUserAccount.php">
                    <i class='bx bxs-user-account' ></i>
                    <span class="links_name">My Account</span>
                </a>
                <span class="tooltip">My Account</span>
            </li>
            <li class="profile">
            <div class="profile-details">
                <div class="name_job">
                    <div class="name"><?php echo($userName)?></div>
                    <div class="job">Professor</div>
                </div>
            </div>
            <a href="logOut.php">
                <i class='bx bx-log-out' id="log_out" ></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
<?php
        }
?>
        
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
