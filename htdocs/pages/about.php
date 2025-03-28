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
  
        /* ---------- ABOUT ---------- */
        
        .mainRightContainerAbout{

           /* border: 1px solid yellowgreen; */ 

            margin-right: 0;

            padding: 0;

            height: 90vh;

            width: 88%;

            overflow: hidden;

            position: relative;

            position: absolute;

            bottom: 0;

            left: 15%;

        }



/* intro A long time ago... */

.introContainer {
    /* border: 1px solid red; */
    position: absolute;
    z-index: 1;
    font-family: aLongTimeAgo;
    top: 40%; /* Center vertically */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%);
  }
  
  .intro {
    /* border: 1px solid green; */
    font-size: 200%;
    font-weight: 400;
    color: #04d8ed;
    /* color: cyan; */
    text-shadow: -2px 0 2px blue;
    opacity: 0;
    animation: intro 6s ease-out 1s;
  }
  
  @keyframes intro {
    0% {
      opacity: 0;
    }
    20% {
      opacity: 1;
    }
    90% {
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  }
  
  
  
  /* crawling letters */
  
  .star-wars {
    /* border: 3px solid red; */
  
    position: relative;
  
    width: 100%;
  
    height: 100%;
  
    perspective: 400px;
  
    overflow-y: hidden;
  }
  
  
  .crawl {
    /* border: 1px solid cyan; */
  
    position: absolute;
  
    bottom: -200%; /* Start from below the screen */
  
    width: 100%;
  /* aligns it to the center */
    transform-origin: 50% 100%; 
  
    animation: crawl 60s linear;
  
    font-size: 200%;
  
  }
  
  .crawl > .title {
    font-size: 90%;
    text-align: justify;
  }
  
  .crawl > .title h1 {
    color: rgb(255, 233, 31);
  
    margin: 0;
  
    text-transform: uppercase;
  
    font-family: aLongTimeAgo;
  
    letter-spacing: normal;
  
    font-size: 250%;
  }
  
  .crawl > .title p {
    color: rgb(255, 233, 31);
  
    text-transform: uppercase;
  
    font-family: episode;
  
    font-size: 350%;
  
    text-align: center;
  }
  
  .crawl p {
    font-family: aLongTimeAgo;
  
    width: 80%;
  
    margin: 0 auto;
  
    color: rgb(255, 233, 31);
  
    font-size: 200%;
  
    line-height: 1.4;
  
    text-align: justify;
  }
  
  @keyframes crawl {
    0% {
      bottom: -238%; /* time for crawl letters appears on screen */
  
      transform: rotateX(20deg) translateZ(0);
  
      opacity: 1;
    }
  
    50% {
      opacity: 1;
    }
  
    75% {
      opacity: 1;
    }
    80% {
      opacity: 1;
    }
    
    100% {
      bottom: 100%;
  
      transform: rotateX(25deg) translateZ(-500px);
  
      opacity: 0;
    }
  }
/* --------------------------- MEDIA QUERIES Microsoft Surface Laptop ---------------------------*/
  @media screen and (max-width: 1280px){
    @keyframes crawl {
    0% {
      bottom: -318%;
  
      transform: rotateX(20deg) translateZ(0);
  
      opacity: 1;
    }
  
    50% {
      opacity: 1;
    }
  
    75% {
      opacity: 1;
    }
    80% {
      opacity: 1;
    }
    
    100% {
      bottom: 100%;
  
      transform: rotateX(25deg) translateZ(-500px);
  
      opacity: 0;
    }
  }
}

/* --------------------------- MEDIA QUERIES 4K 27" 16:9 ---------------------------*/

@media screen and (min-width: 1800px) {
  @keyframes crawl {
    0% {
      bottom: -150%;
  
      transform: rotateX(20deg) translateZ(0);
  
      opacity: 1;
    }
  
    50% {
      opacity: 1;
    }
  
    75% {
      opacity: 1;
    }
    80% {
      opacity: 1;
    }
    
    100% {
      bottom: 100%;
  
      transform: rotateX(25deg) translateZ(-500px);
  
      opacity: 0;
    }
  }
}
}
  
  /* ---------- eo ABOUT ---------- */

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
        <div class="mainRightContainerAbout">
                <br><br>

                <div class="introContainer">
                    <div class="intro">
                      A long time ago, in a galaxy far,<br> far away....
                    </div>
                </div> 

                <div class="star-wars">

                    <div class="crawl" id="crawl">
            
                        <div class="title">
            
                            <h1>Episodes IV  V  VI</h1>
                            <br>
                            <p>the original trilogy</p>
            
                        </div>
                        <br>
                        <p>The original Star Wars trilogy, formerly marketed as the Star Wars Trilogy (and colloquially referred to as the 'original trilogy'), is the first set of three films produced in the Star Wars franchise, an American space opera created by George Lucas. It was produced by Lucasfilm and distributed by 20th Century Fox, and consists of Star Wars (1977), The Empire Strikes Back (1980), and Return of the Jedi (1983).
                        </p>
                    </div>
            
                </div>
                <br><br><br>


        </div>   <!-- eo main right container -->
        
        <!-- Mobile Phone Screen -->

        <div class="aboutMobileContainer">
            <br><br>
            <h2 class="aboutIntroMobile">A long time ago, in a galaxy far,</h2>
            <h2 class="aboutIntroMobile">far away....</h2>
            <br><br><br>
            <p class="crawlingMobile">The original Star Wars trilogy, formerly marketed as the Star Wars Trilogy (and colloquially referred to as the 'original trilogy'), is the first set of three films produced in the Star Wars franchise, an American space opera created by George Lucas. It was produced by Lucasfilm and distributed by 20th Century Fox, and consists of Star Wars (1977), The Empire Strikes Back (1980), and Return of the Jedi (1983). Beginning in medias res, the original trilogy serves as the second act of the nine-episode Skywalker Saga. It was followed by a prequel trilogy between 1999 and 2005, and a sequel trilogy between 2015 and 2019. Collectively, they are referred to as the "Skywalker Saga" to distinguish them from spin-off films set within the same universe.
            </p>
        </div>



        </div> <!-- eo wrapper -->
    <script src="../js/responsiveNavBar.js"></script>


    <script>

        function setCrawlAnimation() {

            const crawl = document.getElementById('crawl');

            crawl.style.animation = 'crawl 60s linear';

        }


        function createCrawlText(title, subtitle, paragraphs) {

            const crawl = document.getElementById('crawl');

            crawl.innerHTML = `

                <div class="title">

                    <h1>${title}</h1>

                    <p>${subtitle}</p>

                </div>

                ${paragraphs.map(paragraph => `<p>${paragraph}</p>`).join('')}

            `;

        }


        document.addEventListener('DOMContentLoaded', (event) => {

            const title = "Episode IV";

            const subtitle = "A NEW HOPE";

            const paragraphs = [

                <p>"It is a period of civil war. Rebel spaceships, striking from a hidden base, have won their first victory against the evil Galactic Empire. During the battle, Rebel spies managed to steal secret plans to the Empire's ultimate weapon, the DEATH STAR, an armored space station with enough power to destroy an entire planet.",

                "Pursued by the Empire's sinister agents, Princess Leia races home aboard her starship, custodian of the stolen plans that can save her people and restore freedom to the galaxy..."</p>

            ];

            

            createCrawlText(title, subtitle, paragraphs);

            setCrawlAnimation();

        });

    </script>
</body>
</html>