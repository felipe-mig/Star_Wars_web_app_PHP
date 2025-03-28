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


$id = $_GET['id'];
$name = returnJediDetails($dbConnect, $id, 'name');
$bio = returnJediDetails($dbConnect, $id, 'bio');
$lightsaber = returnJediDetails($dbConnect, $id, 'lightsaber');
$episodeiv = returnJediDetails($dbConnect, $id, 'episodeiv');
$episodev = returnJediDetails($dbConnect, $id, 'episodev');
$episodevi = returnJediDetails($dbConnect, $id, 'episodevi');
$thumbernail = returnJediDetails($dbConnect, $id, 'thumbernail');
$imageone = returnJediDetails($dbConnect, $id, 'imageone');
$imagetwo = returnJediDetails($dbConnect, $id, 'imagetwo');


// control programming for appearances managment
if ($episodeiv === 'true') {
    $episodeiv = '<br> Star Wars Episode IV: A New Hope <br>';
} else{
    $episodeiv = '';
}

if ($episodev === 'true') {
    $episodev = '<br> Star Wars Episode V: The Empire Strikes Back <br>';
}else{
    $episodev = '';
}

if ($episodevi === 'true') {
    $episodevi = '<br> Star Wars Episode VI: Return Of The Jedi <br>';
}else{
    $episodevi = '';
}


// image selection dropdown
$directory = '../images/jedis';
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
                <div class="sectionTitleContainer" style="margin-bottom: 2.5vh;">
                    <div class="gradientUnderlineLeft"></div>
                    <h3>edit</h3>
                    <div class="gradientUnderlineRight"></div>
                </div>

                <form class="formDetailsMainContainer" action="jediUpdateAction.php" method="POST">
                    <div class="updateSlideshowContainer">
                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <div class="updateImageThumbernailContainer">
                            <img class="updateImageThumbernail" src="../images/jedis/<?php echo $thumbernail; ?>" alt="thumbernail">
                            <select class="inputUpdateImg" name="thumbernail" id="filesThumber" required>
                                <option value="" disabled selected hidden>Select thumbernail</option>
                                <?php
                                    foreach ($files as $file) {
                                        // Skip current and parent directory 
                                        if ($file !== '.' && $file !== '..') {
                                            $selected = ""; 
                                            if ($file === $thumbernail) { $selected = "selected"; 
                                            }  echo "<option value=\"" . $file . "\" " . $selected . ">" . $file . "</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="updateImageSlideOneContainer">
                            <img class="updateImageSlideOne" src="../images/jedis/<?php echo $imageone; ?>" alt="image1">
                            <select class="inputUpdateImg" name="imageone" id="files1" required>
                                <option value="" disabled selected hidden>Select image 1</option>
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
                        </div>

                        <div class="updateImageSlideTwoContainer">
                            <img class="updateImageSlideTwo" src="../images/jedis/<?php echo $imagetwo; ?>" alt="image2">
                            <select class="inputUpdateImg" name="imagetwo" id="files2" required>
                                <option value="" disabled selected hidden>select image 2</option>
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
                        </div> 

                    </div>
                    <div class="bioContainer">
                        <br>
                        <input class="updateBioTitle" type="text" name="name" value="<?php echo $name;?>">
                        <br>
                        <textarea class="updateBioP" type="text" name="bio"><?php echo $bio;?></textarea>
                    </div>
                    <div class="episodesAppearancesContainer">

                        <h6 class="extraDetailsHeader">Appearances:</h6>
                        <div class="checkboxContainer">
                            <!-- control programming for managing the apperance checkboxes -->

                            <input type="checkbox" name="episodeiv" value="true" <?php if ($episodeiv) { echo 'checked'; }?> >
                            <label class="labelCheckbox">episode IV</label>
               
                            <input type="checkbox" name="episodev" value="true" <?php if ($episodev) { echo 'checked'; }?> >
                            <label class="labelCheckbox">episode V</label>
                    
                            <input type="checkbox" name="episodevi" value="true" <?php if ($episodevi) { echo 'checked'; }?> >
                            <label class="labelCheckbox">episode VI</label>
                         </div>



                    </div>

                    <div class="radioButtonContainerDetails">

                        <h6 class="extraDetailsHeader" style="margin-bottom: 1vh;">Light Saber:</h6>
                        <input  type="radio" name="lightsaber" value="blue" <?php if ($lightsaber == 'blue') { echo 'checked'; }?> >
                        <label class="labelCheckbox">
                            <div class="lightSaberLeftPart1JediForm"></div>
                            <div class="lightSaberBlueLeftPart2JediForm"></div>
                            <p class="mobileViewRadio">Blue</p>
                        </label>

                        <input  type="radio" name="lightsaber" value="green" <?php if ($lightsaber == 'green') { echo 'checked'; }?> >
                        <label class="labelCheckbox">
                            <div class="lightSaberLeftPart1JediForm"></div>
                            <div class="lightSaberGreenLeftPart2JediForm"></div>
                            <p class="mobileViewRadio">Green</p>
                        </label>

                    </div>

                    <br>
                    <div class="updateConfirmButtonsContainer">
                        <a href="jedisPrivateSide.php"><div class="updateCancelButton">Cancel</div></a>
                        <input class="updateSaveButton" type="submit" value="Save changes"> 

                    </div>
                </form> <!-- eo form -->
                <br><br><br>
        </div> <!-- eo main right container -->
        </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>
</body>
</html>



   

 
