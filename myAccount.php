
<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/home-section.css?after">
        <link rel="stylesheet" type="text/css" href="../css/myAccount.css?after">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <script type="text/javascript">
            function bookDeleteCheck(){
                if(confirm("Are you sure you want to delete your account? when you press the button below, your account, your books and all other data will be removed permanently and will not be recoverable. If you decide to create another account in the future, you cannot sign up with the same id again.")){
                    location.href = "/service/deleteUserAccountService.php?id=<?php echo($row['id']); ?>";
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        <title>VSDC E-Library</title>
    </head>
    
    <body>
        <?php include "sideBar.php"?>
        <section class="home-section">
            <div class="text">
                <header>
                    <?php include "header.php";?>
                </header>
                <div class="myAccount-wrapper">
                        <a href="/modifyUserAccount.php"><i class="fas fa-user-edit"></i></a>
                        <div class="space"></div>
                        <a href="#" onclick="bookDeleteCheck()"><i class="fas fa-user-slash"></i></a>
                    
                </div>
            </div>
            <footer>
                <?php include "footer.php";?>
            </footer>
        </section>
    </body>

</html>