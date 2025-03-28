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


// image selection dropdown
$directory = '../images/theforce';
$files = scandir($directory);


    
$id = $_GET['id'];
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

            <form class="addCharacterForm" action="theForceUpdateAction.php" method="post">

                <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label class="regularLabel">about:</label>
                <textarea type="text" name="about" required maxlength="1500"><?php echo $about; ?></textarea>
                <br>
                <br>

                <label class="regularLabel">image 1:</label>
                <label class="smallLabel"> To add new images follow this path:</label>
                <label class="smallLabel" style="font-style: italic;">htdocs\images\theforce</label>
                <label class="smallLabel"> Current image: <span style="font-weight: bold;"><?php echo $imageone ?> </span></label>
                <select name="imageone" id="files1" required>
                    <option value="" disabled selected hidden><?php echo $imageone ?></option>
                    <?php
                        foreach ($files as $file) {
                            // Skip current and parent directory 
                            if ($file !== '.' && $file !== '..') {
                                $selected = ""; 
                                if ($file === $imageone) { $selected = "selected"; 
                                }  echo "<option value=\"" . $file . "\" " . $selected . ">" . $file . "</option>";
                            }
                        }
                    ?>
                </select>
                <br>
                <label class="regularLabel">image 2:</label>
                <label class="smallLabel"> To add new images follow this path:</label>
                <label class="smallLabel" style="font-style: italic;">htdocs\images\theforce</label>
                <label class="smallLabel"> Current image: <span style="font-weight: bold;"><?php echo $imagetwo ?></span></label>
                <select name="imagetwo" id="files2" required>
                    <option value="" disabled selected hidden><?php echo $imagetwo ?></option>
                    <?php
                        foreach ($files as $file) {
                            // Skip current and parent directory 
                            if ($file !== '.' && $file !== '..') {
                                $selected = ""; 
                                if ($file === $imagetwo) { $selected = "selected"; 
                                }  echo "<option value=\"" . $file . "\" " . $selected . ">" . $file . "</option>";
                            }
                        }
                    ?>
                </select>
                <br>                    
                <input type="submit" value="Update" id="createSubmitButton" />
            </form>
                <br><br><br>
        </div>   <!-- eo main right container -->
        </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>
    <script src="../js/theForceSlideshowImg.js"></script>
</body>
</html>