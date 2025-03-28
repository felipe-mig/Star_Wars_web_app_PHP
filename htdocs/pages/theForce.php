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

// holds the login through the sections
if($_SESSION['authenticate'] == 'yes'){
    $validate = true;
   } else {
    $validate = validateUser($dbConnect,$username, $pwd);
   }





$id = 1;
$about = returnForceDetails($dbConnect, $id, 'about');
$imageone =  returnForceDetails($dbConnect, $id, 'imageone');
$imagetwo =  returnForceDetails($dbConnect, $id, 'imagetwo');

?>


<!DOCTYPE html>
<html lang="en">
<head>
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
        <?php if ($validate) {
          privateNavBar();
        }else {
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
            <div class="sectionTitleContainer">
                <div class="gradientUnderlineLeft"></div>
                <h3>the force</h3>
                <div class="gradientUnderlineRight"></div>
            </div>
            <!-- <br> -->


                <!-- video -->

                    <video class="theForceVideo" src="../videos/theforce1.mp4" poster="images/Main_Background orginal.jpg" autoplay controls muted></video>

                <br>
                <div class="sectionsMainContainer">

                    <div class="theForceDetailsMainContainer">

                        <div class="theForceBioContainer">

                            <div class="theForcelighSabersContainer">
                                <div class="theForceLightSaberLeftPart1"></div>
                                <div class="theForceLightSaberLeftPart2"></div>
                                <div class="theForceLightSabeRightPart2"></div>
                                <div class="theForceLightSaberRightPart1"></div>
                            </div>
                            <br>
                            <br>
                            <p> <?php echo $about ?> </p>
                        </div>

                        <div class="theForceslideshowContainer">
                            <img class="theForceImageSlides" src="../images/theforce/<?php echo $imageone ?>" alt="leaf on the ground">
                            <img class="theForceImageSlides" src="../images/theforce/<?php echo $imagetwo ?>" alt="lake surrounded by mountains">
              
                            <!-- I would recommend to replace these 'span' elements with 'img' files
                            for each the left and right arrow that fits your project, and size accordingly.
                            I've shown 'span' elements because I didn't want to upload files. -->
                            <span  id ="leftArrow" class="slideshowArrow">&#8249;</span>
                            <span  id ="rightArrow" class="slideshowArrow">&#8250;</span>
                            
                            <div class="slideshowCircles">
                            <!-- Filled 'dot' class is set to first image in slideshow, and then via Javascript the filled 'dot' class follows the current image.
                            Make sure you match the number of these 'circle' span elements to the number of images in your slideshow. -->
                                <span class="circle dot"></span>
                                <span class="circle"></span>
                            </div>
                        </div>

                    </div>

                <br><br><br>

                <!-- <div class="moviesContainer">
                    <div class="movie1"></div>
                    <div class="movie2"></div>
                    <div class="movie3"></div>
                </div> -->
        </div>   <!-- eo main right container -->
        </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>
    <script src="../js/theForceSlideshowImg.js"></script>
</body>