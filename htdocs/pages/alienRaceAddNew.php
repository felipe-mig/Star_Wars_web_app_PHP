<?php
session_start();
//$sessionId = session_id();
//echo '<p style="color:white;">' . $sessionId . '</p>';
include_once('../functions/functions.php');
$dbConnect=dbLink();

if ($dbConnect){
    echo '<!---Database connection successful-->';
}

error_reporting(E_ALL); 
ini_set('display_errors', 1); 


// showMem height and width are set to 0px to avoid overflow problems <----
showMem();


// holds the login through the sections
if($_SESSION['authenticate'] == 'yes'){
    $validate = true;
   } else {
    $validate = validateUser($dbConnect,$username, $pwd);
   }


// image selection dropdown
$directory = '../images/alienraces';
$files = scandir($directory);


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
<body onload="bounce()">
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

        <div class="sectionTitleContainer">
                <div class="gradientUnderlineLeft"></div>
                <h3>add alien race</h3>
                <div class="gradientUnderlineRight"></div>
            </div>

            <form class="addCharacterForm" action="alienRaceAddNewAction.php" method="post">


                <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/wookie.png); height: 14vh"></div></a>

                <label class="regularLabel">name:</label>
                <input class="inputRegular" type="text" name="name" required/>
                <br>  

                <label class="regularLabel">Bio:</label>
                <textarea type="text" name="bio" required maxlength="1000"></textarea>
                <br>
                <br>

                <label class="regularLabel">Appearances:</label>

                <div class="checkboxContainer">
                    <input  type="checkbox" name="episodeiv" value="true">
                    <label class="labelCheckbox">episode IV</label>
               

               
                    <input  type="checkbox" name="episodev" value="true">
                    <label class="labelCheckbox">episode V</label>
               

               
                    <input  type="checkbox" name="episodevi" value="true">
                    <label class="labelCheckbox">episode VI</label>
                </div>
                <br>
                <br>

                <label class="regularLabel" style="text-transform:none">Thumbernail Image</label>
                <label class="smallLabel"> To add new images follow this path: <br> <span style="font-style: italic;">htdocs\images\alienraces </span><br> Should have no background (png or webp)</label>
                <!-- <input class="inputRegular" type="text" name="thumbernail" required placeholder="image.png"> -->
                <select name="thumbernail" id="files">
                    <option value="" disabled selected hidden>Select</option>
                    <?php
                        foreach ($files as $file) {
                            // Skip current and parent directory 
                            if ($file !== '.' && $file !== '..') {
                                echo "
                                    <option value=\"$file\">$file</option>
                                    ";
                            }
                        }
                    ?>
                </select>
                <br>
                <label class="regularLabel">image 1:</label>
                <label class="smallLabel"> To add new images follow this path: <br> <span style="font-style: italic;">htdocs\images\alienraces </span></label>
                <!-- <input class="inputRegular" type="text" name="imageone" required placeholder="image1.webp"> -->
                <select name="imageone" id="files">
                    <option value="" disabled selected hidden>Select</option>
                    <?php
                        foreach ($files as $file) {
                            // Skip current and parent directory 
                            if ($file !== '.' && $file !== '..') {
                                echo "
                                    <option value=\"$file\">$file</option>
                                    ";
                            }
                        }
                    ?>
                </select>
                <br>
                <label class="regularLabel">image 2:</label>
                <label class="smallLabel"> To add new images follow this path: <br> <span style="font-style: italic;">htdocs\images\alienraces </span></label>
                <!-- <input class="inputRegular" type="text" name="imagetwo" required placeholder="image2.webp"> -->
                <select name="imagetwo" id="files">
                    <option value="" disabled selected hidden>Select</option>
                    <?php
                        foreach ($files as $file) {
                            // Skip current and parent directory 
                            if ($file !== '.' && $file !== '..') {
                                echo "
                                    <option value=\"$file\">$file</option>
                                    ";
                            }
                        }
                    ?>
                </select>
                
                <br>
                      

                <input type="submit" value="Add" id="createSubmitButton" />
            </form>

            <br><br><br>
        </div>   <!-- eo main right container -->
        </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>
</body>
</html>