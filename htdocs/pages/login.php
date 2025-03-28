<?php
session_start();
//$sessionId = session_id();
//echo '<p style="color:white;">' . $sessionId . '</p>';
session_unset(); // tells the browser to remove the current session id
session_destroy();  // clears the session cache
session_regenerate_id(true); // creates a new session id for the next person logging in
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



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Star Wars TOT</title>
    <link rel="icon" href="../images/favicon/favicon.ico" />
    <link rel="stylesheet" href="../css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <script
      src="https://kit.fontawesome.com/93dcc073fd.js"
      crossorigin="anonymous"
    ></script>
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
    <!-- nav bar -->
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

    </nav>   <!-- eo nav bar -->

    <div class="wrapper">
      <!-- CONTENT GOES IN HERE -->
      <!-- main right container -->
      <div class="mainRightContainer">
        <form  action="dashboard.php" method="post" style="margin-top: 5vh;">
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
                value=""
                class="name-text"
                placeholder="Username"
            >
            <input
                type="password"
                name="pwd"
                value=""
                class="text"
                placeholder="Password"
            >
            <!-- <select name="position">
                <option value="" disabled selected hidden>Select a position</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="member">Member</option>
            </select> -->
            <!-- <span id="login-span"></span> -->
            <input type="submit" value="Log in" id="login-submit-button" style="font-size:1em;">
        </form>

        <br ><br ><br >
      </div>
      <!-- eo main right container -->
    </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>
  </body>
</html>
