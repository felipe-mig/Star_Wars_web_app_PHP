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

   $name = $_POST['name'];
   $affiliation = $_POST['affiliation'];
   $bio =  $_POST['bio'];
   $thumbernail =  $_POST['thumbernail'];
   $imageone =  $_POST['imageone'];
   $imagetwo =  $_POST['imagetwo'];

// control programming for episodes 
// Avoids the  "SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'episodeiv' cannot be null" error when trying to insert an empty variable
if($_POST['episodeiv']==NULL) {
    $_POST['episodeiv']="false";
}

if($_POST['episodev']==NULL) {
    $_POST['episodev']="false";
}

if($_POST['episodevi']==NULL) {
    $_POST['episodevi']="false";
}

$episodeiv =  $_POST['episodeiv'];
$episodev =  $_POST['episodev'];
$episodevi =  $_POST['episodevi'];


$insertCharacter = insertCharacter($dbConnect, $name, $affiliation, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo);




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


            <br><br><br>
        </div>   <!-- eo main right container -->
        </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>
    <script>

        function bounce(){
            window.location.href = "charactersPrivateSide.php#iconAdd"
        }

    </script>
</body>
</html>