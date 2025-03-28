<?php
session_start();
//$sessionId = session_id();
//echo '<p style="color:white;">' . $sessionId . '</p>';
include_once('functions/functions.php');
$dbConnect=dbLink();

if ($dbConnect){
    echo '<!---Database connection successful-->';
}

// showMem height and width are set to 0px to avoid overflow problems <----
showMem();

// holds the login through the sections
if($_SESSION['authenticate'] == 'yes'){
    $validate = true;
   } else {
    $validate = validateUser($dbConnect,$username, $pwd);
   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars TOT</title>
    <link rel="icon" href="images/favicon/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/93dcc073fd.js" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: mainTitles;
            src: url(fonts/SFDistantGalaxy.ttf);
        }
        @font-face {
            font-family: aLongTimeAgo;
            src: url(fonts/aLongTimeAgo.ttf);
        }
        @font-face {
            font-family: crawling;
            src: url(fonts/Trade\ GothicLTBoldNo2.ttf);
        }
        @font-face {
            font-family: episode;
            src: url(fonts/Trade\ Gothic\ LT\ Condensed\ No.\ 18.ttf);
        }
    </style>
</head>
<body>
    <nav>
         <!-- mobile responsive Nav Bar -->
        <?php if ($validate) {
            privateResponsiveNavBarIndex();    
        } else {
            publicResponsiveNavBarIndex();
        } 
        ?>

        <a href="#"><div class="logoContainer"></div></a>
        <br>
        <?php if ($validate) {
          privateNavBarIndex();

        }else {
          publicNavBarIndex();
        }
        ?>
        
        <footer>
            <a href="https://www.linkedin.com/in/felipeiglesiasgarcia/" target="_blank"><i class="bi bi-linkedin" id="linkedinicon"></i></a>
            <a href="https://github.com/felipe-mig" target="_blank"><i class="bi bi-github" id="giticon"></i></a>
            <p class="copyright">&copy; <span class="footerSpan">2024 Felipe Iglesias Garcia</span></p>
        </footer>
    </nav>

    <header>
        <h1>the original trilogy</h1>
    </header>


    <div class="wrapper"> 
        <!-- CONTENT GOES IN HERE -->
        <!-- main right container -->
        <div class="mainRightContainer">
                <!-- video -->
                <div class="videoContainer">
                    <video src="videos/mushup.mp4" poster="images/Main_Background orginal.jpg" autoplay controls muted></video>
                </div>
                <br><br id="homePointer">
                <!-- <h3 class="indexH3">Sections</h3> -->
                <div class="sectionTitleContainer">
                    <div class="gradientUnderlineLeft"></div>
                    <h3>sections</h3>
                    <div class="gradientUnderlineRight"></div>
                </div>
                <br>
                <div class="sectionsMainContainer">

                    <a href="pages/about.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/characters/lukeImg3.webp" alt="">
                            <h5>about</h5>
                        </div>
                    </a>

                    <a href="pages/movies.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/movies/trilogy.webp" alt="">
                            <h5>movies</h5>
                        </div>
                    </a>

                    <a href="pages/characters.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/characters/c3poImg1.webp" alt="">
                            <h5>characters</h5>
                        </div>
                    </a>

                    <a href="pages/ships.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/ships/snowspeeder Img2.webp" alt="">
                            <h5>ships</h5>
                        </div>
                    </a>

                    <a href="pages/planets.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/planets/Hoth Img1.webp" alt="">
                            <h5>planets</h5>
                        </div>
                    </a>

                    
                    <a href="pages/theforce.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/characters/yodaImg1.webp" alt="">
                            <h5>the force</h5>
                        </div>
                    </a>

                    <a href="pages/jedis.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/jedis/Master Yoda Img2.webp" alt="">
                            <h5>jedis</h5>
                        </div>
                    </a>

                    <a href="pages/siths.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/characters/darth-vaderImg1.webp" alt="">
                            <h5>siths</h5>
                        </div>
                    </a>

                    
                    <a href="pages/alienraces.php">
                        <div class="sectionsImgContainer">
                            <img class="sectionsImg" src="images/characters/chewbaccaImg2.webp" alt="">
                            <h5>alien races</h5>
                        </div>
                    </a>

                </div>
                <br><br><br>

        </div>   <!-- eo main right container -->
        </div> <!-- eo wrapper -->
    <script src="js/responsiveNavBar.js"></script>
</body>
</html>