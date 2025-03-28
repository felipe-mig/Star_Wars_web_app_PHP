<?php
session_start();
//$sessionId = session_id();
//echo '<p style="color:white;">' . $sessionId . '</p>';
include_once('../functions/functions.php');
$dbConnect=dbLink();

if ($dbConnect){
    echo '<!---Database connection successful-->';
}


// showMem height and width are set to 0px to avoid overflow problems <----
showMem();


$username = $_POST['username'];
$pwd = $_POST['pwd'];


// Check if the user is already logged in
if($_SESSION['id'] == NULL){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
}


 // Validate user credentials
$validate = validateUser($dbConnect, $username, $pwd);


// holds the login through the sections
if($_SESSION['authenticate'] == 'yes'){
    $validate = true;
   } else {
    $validate = validateUser($dbConnect,$username, $pwd);
   }


$Headerusername = $_SESSION['username'];


   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars TOT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars TOT</title>
    <link rel="icon" href="../images/favicon/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/93dcc073fd.js" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: mainTitles;
            src: url(../fonts/SFDistantGalaxy.ttf);
        }
        @font-face {
            font-family: aLongTimeAgo;
            src: url(../fonts/aLongTimeAgo.ttf);
        }
        @font-face {
            font-family: crawling;
            src: url(../fonts/Trade\ GothicLTBoldNo2.ttf);
        }
        @font-face {
            font-family: episode;
            src: url(../fonts/Trade\ Gothic\ LT\ Condensed\ No.\ 18.ttf);
        }
    </style>
</head>
<body>
    <nav>

         <!-- mobile responsive Nav Bar -->
        <?php if ($validate) {
            privateResponsiveNavBar();    
        } else {
            publicResponsiveNavBar();
        } 
        ?>  <!-- eo mobile responsive Nav Bar -->
        <a href="../index.php"><div class="logoContainer"></div></a>
        <br>
        <?php
        
        if ($validate){
            privateNavBar(); 
        } else {
            publicNavBar();
        } 

        ?>

        <footer>
            <a href="https://www.linkedin.com/in/felipeiglesiasgarcia/" target="_blank"><i class="bi bi-linkedin" id="linkedinicon"></i></a>
            <a href="https://github.com/felipe-mig" target="_blank"><i class="bi bi-github" id="giticon"></i></a>
            <p class="copyright">&copy; <span class="footerSpan">2024 Felipe Iglesias Garcia</span></p>
        </footer>
    </nav>

    <!-- <header>
        <h1>the original trilogy</h1>
    </header> -->


    <div class="wrapper"> 
        <!-- CONTENT GOES IN HERE -->
        <!-- main right container -->
        <div class="mainRightContainer">
            <br>
            <?php

                if ($validate) {
                    echo '
                        <div class="sectionTitleContainer">
                            <div class="gradientUnderlineLeft"></div>
                            <h3>'.$Headerusername.' dashboard</h3>
                            <div class="gradientUnderlineRight"></div>
                        </div>
                        <br>
                        <div class="sectionsMainContainer">

                            <a href="moviesPrivateSide.php">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/movies/trilogy.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>movies</h5>
                                </div>
                            </a>

                            <a href="charactersPrivateSide.php">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/characters/c3poImg1.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>characters</h5>
                                </div>
                            </a>

                            <a href="shipsPrivateSide.php">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/ships/snowspeeder Img2.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>ships</h5>
                                </div>
                            </a>

                            <a href="planetsPrivateSide.php">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/planets/Hoth Img1.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>planets</h5>
                                </div>
                            </a>

                            
                            <a href="theForceUpdate.php?id=1">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/characters/yodaImg1.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>the force</h5>
                                </div>
                            </a>

                            <a href="jedisPrivateSide.php">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/jedis/Master Yoda Img2.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>jedis</h5>
                                </div>
                            </a>

                            <a href="sithsPrivateSide.php">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/characters/darth-vaderImg1.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>siths</h5>
                                </div>
                            </a>

                            
                            <a href="alienRacesPrivateSide.php">
                                <div class="adminSectionsImgContainer">
                                    <img class="sectionsImg" src="../images/characters/chewbaccaImg2.webp" alt="">
                                    <h5 class="dashboardH5"><i class="fa-solid fa-pen" id="iconEditAdminDash"></i>alien races</h5>
                                </div>
                            </a>

                        </div>
                    ';
                    } else {
                        echo '        
                            <form  action="dashboard.php" method="post">
                                    <div class="theForcelighSabersContainerLogin">
                                        <div class="theForceLightSaberLeftPart1Login"></div>
                                        <div class="theForceLightSaberLeftPart2Login"></div>
                                        <div class="theForceLightSabeRightPart2Login"></div>
                                        <div class="theForceLightSaberRightPart1Login"></div>
                                    </div>
                                <a href="../index.php"><div class="login-form-logo"></div></a>
                                <input
                                    type="text"
                                    name="username"
                                    value=" ' . $username . ' "
                                    class="name-text"
                                >
                                <input
                                    type="password"
                                    name="pwd"
                                    value=" ' . $pwd . ' "
                                    class="text"
                                >
                                <p class="loginErrorMessage">Invalid username or password</p>
                                <input type="submit" value="Log In" id="login-submit-button" style="font-size:1em;">
                            </form>
                        ';
                    }

            ?>

        </div>   <!-- eo main right container -->
        </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>
</body>
</html>
