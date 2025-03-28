<?php
// -------------------- FUNCTIONS -------------------- \\



# - function dbLink() <-- Connects with the database

# - function showMem() <-- shows the POST, GET and SESSION memory

# - function validateUser() <-- validates the login credentials agains the database.

# - function publicNavBarIndex() <-- public side nav bar for index section

# - function publicResponsiveNavBarIndex() <-- public side nav bar for index section for mobile

# - function private NavBarIndex() <-- private side nav bar for index section

# - function publicResponsiveNavBarIndex() <-- public side nav bar for index section for mobile

# - function privateResponsiveNavBarIndex() <-- private side nav bar for index section for mobile

# - function publicResponsiveNavBar() <-- public side nav bar for mobile

# - function privateResponsiveNavBar() <-- private side nav bar for mobile

# - function publicNavBar() <-- public side nav bar 

# - function privateNavBar() <-- private side nav bar

# - function listCharacterPublicSide($dbConnect) <-- reads the chatacters table from the database, showing the card. Sort by recenlty added

# - function listCharacterPrivateSide($dbConnect) <-- allows the user to see edit and delete icons on a record sorted by recently added

# - function returnCharacterDetails($dbConnect, $id, $fieldName) <-- displays the details of characters 

# - function searchCharacterPublicSide($dbConnect, $keyword, $succesfullSearch) <-- Search Bar to return records when searching by name in on public side

# - function searchCharacterPrivateSide($dbConnect, $keyword, $succesfullSearch) <-- Search Bar to return records when searching by name in on private side

# - function insertCharacter($dbConnect, $name, $affiliation, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo) <-- insert character record

# - function updateCharacter($dbConnect,$id, $name, $affiliation, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo) <-- updates the characters

# - function deleteCharacter($dbConnect, $id) <-- deletes character

# - function listCharacterPrivateSideSortZ_A($dbConnect) <-- sorts charecter in by name DESC

# - function listCharacterPrivateSideSortA_Z($dbConnect) <-- sorts charecter in by name ASC

# - function listCharacterPrivateSideSortOlder($dbConnect) <-- sorts by older records 

# - function listCharacterPrivateSideSortGalacticEmpire($dbConnect) <-- sorts by Galactic Empire in ASC name

# - function listCharacterPrivateSideSortRebelAlliance($dbConnect) <-- sorts by Rebel Alliance in ASC name

# - function charactersSortByDropdownPublic() <-- Sort by Dropdown public side 

# - function charactersSortByDropdownPrivate() <-- Sort by Dropdown private side 



// ---------------------------------------------------- \\


function dbLink(){
    $db_user = "mri"; //User used in mysql
    $db_pass = "password"; //password used in mysql
    $db_host = "localhost";
    $db = "starwarsdb"; // database in mysql
    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db",$db_user,$db_pass);
    } catch (Exception $e){
        echo 'Unable to access database';
        exit;
    }
    error_reporting(0); // Hides the error messages
    return $db;
}
$dbConnect = dbLink(); // Should be run on each page not in the functions file.


// ----> !!! is set to 1px height to HIDDE it. This avoids overflow problems !!! <-----
 function showMem(){
    echo '<div>';
            echo '<div style="position:absolute; background-color: rgba(0, 0, 0, 0.9); height: 0px; width:0px; margin-top: 0vh; left: 80%; margin-bottom: 0vh;  color: rgba(0, 255, 6, 0.8); border-top-right-radius: 15px; border-bottom-left-radius: 1px; border-top-left-radius: 1px; border-bottom-right-radius: 15px; font-family: Impact; font-size: 1em; letter-spacing: 0.25em; text-transform: uppercase; padding-left: 1vw; padding-right: 1vw; z-index:3;">';
                echo '<pre>';
                echo '<br>';
                echo '<h5 style="all:unset;font-size: 1.25em;  letter-spacing: 0.25em;">SHOW MEMORY</h5>';
                echo '<br>';
                echo '<h5 style=" all:unset; font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Get Memory</h5>';
                print_r($_GET);
                echo '<br>';
                echo '<h5 style=" all:unset; font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Post Memory</h5>';
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';
                echo '<br>';
                echo '<h5 style=" all:unset; font-size: 1.1em; letter-spacing: 0.25em; text-transform: uppercase;">Session Memory</h5>';
                print_r($_SESSION);
                echo '<br>';
                echo '</pre>';
                echo '<br>';
            echo '</div>';
    
}


//Validate User 
function validateUser($dbConnect, $username, $pwd){    
    $sql = "SELECT * FROM users"; // this is the name of the table
    foreach ($dbConnect->query($sql) as $row) {        
        if ($username == $row['username'] && $pwd == $row['password']) {
            $_SESSION['username'] = $username; // this needs to be the same name as we have in the input tag of our form 
            $_SESSION['pwd'] = $pwd;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['authenticate'] = 'yes';
            return true;
        }
    }
    return false;
}


//Public nav-bar Index
function publicNavBarIndex(){

    echo '
    <a href="pages/login.php?logout=logout"><p class="navBarPLogin"><i class="fa-regular fa-user" id="loginIcon"></i>Login</p></a>
    <br>
    <a href="#"><p class="navBarP"><i class="fa-solid fa-house"></i>home</p></a>
    <a href="pages/about.php"><p class="navBarP"><i class="fa-brands fa-rebel"></i>about</p></a>
    <a href="pages/movies.php"><p class="navBarP"><i class="fa-solid fa-film"></i>movies</p></a>
    <a href="pages/characters.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>characters</p></a>
    <a href="pages/ships.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>ships</p></a>
    <a href="pages/planets.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>planets</p></a>
    <a href="pages/theForce.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>the force</p></a>
    <a href="pages/jedis.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>jedis</p></a>
    <a href="pages/siths.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>siths</p></a>
    <a href="pages/alienRaces.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>alien races</p></a>
    ';    
}

function publicResponsiveNavBarIndex() {
    echo '
            <ul class="nav-menu">
            <div class="itemsMainContianer">
                <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-house" style="margin-right: 1.5vw;"></i>Home</a>
                </li>
                <li class="nav-item">
                <a href="pages/about.php" class="nav-link"><i class="fa-brands fa-rebel" style="margin-right: 1.5vw;"></i>About</a>
                </li>
                <li class="nav-item">
                <a href="pages/movies.php" class="nav-link"><i class="fa-solid fa-film" style="margin-right: 1.5vw;"></i>Movies</a>
                </li>
                <li class="nav-item">
                <a href="pages/characters.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Characters</a>
                </li>
                <li class="nav-item">
                <a href="pages/ships.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Ships</a>
                </li>
                <li class="nav-item">
                <a href="pages/planets.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Planets</a>
                </li>
                <li class="nav-item">
                <a href="pages/theForce.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>The Force</a>
                </li>
                <li class="nav-item">
                <a href="pages/jedis.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Jedis</a>
                </li>
                <li class="nav-item">
                <a href="pages/siths.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Siths</a>
                </li>
                <li class="nav-item">
                <a href="pages/alienraces.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Alien Races</a>
                </li>
            </div>
            <a href="index.php"><div class="logoMillenium"></div></a>    
        </ul>  
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <a href="pages/login.php"><p class="navBarLoginMobile"><i class="fa-regular fa-user" id="loginIcon"></i></p></a>
    ';
}
//Private nav-bar Index
function privateNavBarIndex(){

    echo '
    <a href="pages/logout.php"><p class="navBarPLogin"><i class="fa-solid fa-right-from-bracket"></i>Logout</p></a>
    <a href="pages/dashboard.php"><p class="navBarPLogin"><i class="fa-solid fa-pen"></i>Dashboard</p></a>
    <br>
    <a href="#"><p class="navBarP"><i class="fa-solid fa-house"></i>home</p></a>
    <a href="pages/about.php"><p class="navBarP"><i class="fa-brands fa-rebel"></i>about</p></a>
    <a href="pages/movies.php"><p class="navBarP"><i class="fa-solid fa-film"></i>movies</p></a>
    <a href="pages/characters.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>characters</p></a>
    <a href="pages/ships.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>ships</p></a>
    <a href="pages/planets.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>planets</p></a>
    <a href="pages/theForce.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>the force</p></a>
    <a href="pages/jedis.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>jedis</p></a>
    <a href="pages/siths.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>siths</p></a>
    <a href="pages/alienRaces.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>alien races</p></a>
    ';
    
}

function privateResponsiveNavBarIndex(){
    echo '
    <ul class="nav-menu">
    <div class="itemsMainContianer">
        <li class="nav-item">
        <a href="pages/dashboard.php" class="nav-link" style="color: rgba(254, 212, 8, 0.9);"><i class="fa-solid fa-pen" style="margin-right: 1.5vw; color: rgba(254, 212, 8, 0.9);"></i>Dashboard</a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link"><i class="fa-solid fa-house" style="margin-right: 1.5vw;"></i>Home</a>
        </li>
        <li class="nav-item">
        <a href="pages/about.php" class="nav-link"><i class="fa-brands fa-rebel" style="margin-right: 1.5vw;"></i>About</a>
        </li>
        <li class="nav-item">
        <a href="pages/movies.php" class="nav-link"><i class="fa-solid fa-film" style="margin-right: 1.5vw;"></i>Movies</a>
        </li>
        <li class="nav-item">
        <a href="pages/characters.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Characters</a>
        </li>
        <li class="nav-item">
        <a href="pages/ships.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Ships</a>
        </li>
        <li class="nav-item">
        <a href="pages/planets.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Planets</a>
        </li>
        <li class="nav-item">
        <a href="pages/theForce.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>The Force</a>
        </li>
        <li class="nav-item">
        <a href="pages/jedis.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Jedis</a>
        </li>
        <li class="nav-item">
        <a href="pages/siths.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Siths</a>
        </li>
        <li class="nav-item">
        <a href="pages/alienraces.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Alien Races</a>
        </li>
    </div>
    <a href="pages/dashboard.php"><div class="logoMillenium"></div></a>    
</ul>  
<div class="hamburger">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</div>

<a href="pages/login.php"><p class="navBarLogoutMobile"><i class="fa-solid fa-right-from-bracket" id="loginIcon"></i></p></a>
';
}

//Public nav-bar
function publicNavBar(){

    echo '
    <a href="login.php"><p class="navBarPLogin"><i class="fa-regular fa-user" id="loginIcon"></i>Login</p></a>
    <br>
    <a href="../index.php#homePointer"><p class="navBarP"><i class="fa-solid fa-house"></i>home</p></a>
    <a href="about.php"><p class="navBarP"><i class="fa-brands fa-rebel"></i>about</p></a>
    <a href="movies.php"><p class="navBarP"><i class="fa-solid fa-film"></i>movies</p></a>
    <a href="characters.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>characters</p></a>
    <a href="ships.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>ships</p></a>
    <a href="planets.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>planets</p></a>
    <a href="theForce.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>the force</p></a>
    <a href="jedis.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>jedis</p></a>
    <a href="siths.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>siths</p></a>
    <a href="alienRaces.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>alien races</p></a>
    ';
    
}

function publicResponsiveNavBar() {
    echo '
            <ul class="nav-menu">
            <div class="itemsMainContianer">
                <li class="nav-item">
                <a href="../index.php" class="nav-link"><i class="fa-solid fa-house" style="margin-right: 1.5vw;"></i>Home</a>
                </li>
                <li class="nav-item">
                <a href="about.php" class="nav-link"><i class="fa-brands fa-rebel" style="margin-right: 1.5vw;"></i>About</a>
                </li>
                <li class="nav-item">
                <a href="movies.php" class="nav-link"><i class="fa-solid fa-film" style="margin-right: 1.5vw;"></i>Movies</a>
                </li>
                <li class="nav-item">
                <a href="characters.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Characters</a>
                </li>
                <li class="nav-item">
                <a href="ships.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Ships</a>
                </li>
                <li class="nav-item">
                <a href="planets.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Planets</a>
                </li>
                <li class="nav-item">
                <a href="theForce.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>The Force</a>
                </li>
                <li class="nav-item">
                <a href="jedis.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Jedis</a>
                </li>
                <li class="nav-item">
                <a href="siths.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Siths</a>
                </li>
                <li class="nav-item">
                <a href="alienraces.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Alien Races </a>
                </li>
            </div>
            <a href="../index.php"><div class="logoMillenium"></div></a>    
        </ul>  
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <a href="login.php"><p class="navBarLoginMobile"><i class="fa-regular fa-user" id="loginIcon"></i></p></a>
    ';
}



//Private nav-bar
function privateNavBar(){

    echo '
    <a href="logout.php?logout=logout"><p class="navBarPLogin"><i class="fa-solid fa-right-from-bracket"></i>Logout</p></a>
    <a href="dashboard.php"><p class="navBarPLogin"><i class="fa-solid fa-pen"></i></i>Dashboard</p></a>
    <br>
    <a href="../index.php#homePointer"><p class="navBarP"><i class="fa-solid fa-house"></i>home</p></a>
    <a href="about.php"><p class="navBarP"><i class="fa-brands fa-rebel"></i>about</p></a>
    <a href="movies.php"><p class="navBarP"><i class="fa-solid fa-film"></i>movies</p></a>
    <a href="characters.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>characters</p></a>
    <a href="ships.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>ships</p></a>
    <a href="planets.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>planets</p></a>
    <a href="theForce.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>the force</p></a>
    <a href="jedis.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>jedis</p></a>
    <a href="siths.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>siths</p></a>
    <a href="alienRaces.php"><p class="navBarP"><i class="fa-solid fa-layer-group"></i>alien races</p></a>
    '; 
}

function privateResponsiveNavBar() {
    echo '
            <ul class="nav-menu" style="color: ">
            <div class="itemsMainContianer">
                <li class="nav-item">
                <a href="dashboard.php" class="nav-link" style="color: rgba(254, 212, 8, 0.9);"><i class="fa-solid fa-pen" style="margin-right: 1.5vw; color: rgba(254, 212, 8, 0.9);"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                <a href="../index.php" class="nav-link"><i class="fa-solid fa-house" style="margin-right: 1.5vw;"></i>Home</a>
                </li>
                <li class="nav-item">
                <a href="about.php" class="nav-link"><i class="fa-brands fa-rebel" style="margin-right: 1.5vw;"></i>About</a>
                </li>
                <li class="nav-item">
                <a href="movies.php" class="nav-link"><i class="fa-solid fa-film" style="margin-right: 1.5vw;"></i>Movies</a>
                </li>
                <li class="nav-item">
                <a href="characters.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Characters</a>
                </li>
                <li class="nav-item">
                <a href="ships.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Ships</a>
                </li>
                <li class="nav-item">
                <a href="planets.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Planets</a>
                </li>
                <li class="nav-item">
                <a href="theForce.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>The Force</a>
                </li>
                <li class="nav-item">
                <a href="jedis.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Jedis</a>
                </li>
                <li class="nav-item">
                <a href="siths.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Siths</a>
                </li>
                <li class="nav-item">
                <a href="alienraces.php" class="nav-link"><i class="fa-solid fa-layer-group" style="margin-right: 1.5vw;"></i>Alien Races</a>
                </li>
            </div>
            <a href="dashboard.php"><div class="logoMillenium"></div></a>    
        </ul>  
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <a href="login.php"><p class="navBarLogoutMobile"><i class="fa-solid fa-right-from-bracket" id="loginIcon"></i></p></a>
    ';
}


// -------------------- CHARACTERS -------------------- \\

// Characters Sort by Dropdown
function charactersSortByDropdownPublic(){
    echo '
        <li><a href="characters.php">Recently added</a></li>
        <li><a href="charactersPublicSideSortOlder.php">Older</a></li>
        <li><a href="charactersPublicSideSortA_Z.php">A-Z</a></li>
        <li><a href="charactersPublicSideSortZ_A.php">Z-A</a></li>
        <li><a href="charactersPublicSideSortRebelAlliance.php">Rebel alliance</a></li>
        <li><a href="charactersPublicSideSortGalacticEmpire.php">Galactic Empire</a></li>
    ';
}

// Characters Sort by Dropdown
function charactersSortByDropdownPrivate(){
    echo '
        <li><a href="charactersPrivateSide.php">Recently added</a></li>
        <li><a href="charactersPrivateSideSortOlder.php">Older</a></li>
        <li><a href="charactersPrivateSideSortA_Z.php">A-Z</a></li>
        <li><a href="charactersPrivateSideSortZ_A.php">Z-A</a></li>
        <li><a href="charactersPrivateSideSortRebelAlliance.php">Rebel alliance</a></li>
        <li><a href="charactersPrivateSideSortGalacticEmpire.php">Galactic Empire</a></li>
    ';
}

// list character
function listCharacterPublicSide($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="characterDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="recon trooper">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listCharacterPrivateSide($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="characterUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="characterDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listCharacterPublicSideSortOlder($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="characterDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="recon trooper">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}


function listCharacterPrivateSideSortOlder($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="characterUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="characterDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listCharacterPublicSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="characterDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="recon trooper">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listCharacterPrivateSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="characterUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="characterDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listCharacterPublicSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="characterDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="recon trooper">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listCharacterPrivateSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM characters ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="characterUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="characterDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listCharacterPublicSideSortGalacticEmpire($dbConnect){
    $sql = "SELECT * FROM characters WHERE affiliation = 'Galactic Empire' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="characterDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="recon trooper">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listCharacterPrivateSideSortGalacticEmpire($dbConnect){
    $sql = "SELECT * FROM characters WHERE affiliation = 'Galactic Empire' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="characterUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="characterDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listCharacterPublicSideSortRebelAlliance($dbConnect){
    $sql = "SELECT * FROM characters WHERE affiliation = 'Rebel Alliance' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="characterDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="recon trooper">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listCharacterPrivateSideSortRebelAlliance($dbConnect){
    $sql = "SELECT * FROM characters WHERE affiliation = 'Rebel Alliance' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="characterUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="characterDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

// Search Bar function Characters Public Side
function searchCharacterPublicSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `characters` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
            <a href="characterDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="recon trooper">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="../index.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Characters was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// Search Bar function Characters Private Side
function searchCharacterPrivateSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `characters` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
             <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="characterUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/characters/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="characterDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Characters was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}




// read the details of the characters from the database 
function returnCharacterDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM characters"; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}


//Create Character 
function insertCharacter($dbConnect, $name, $affiliation, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);
    
    //Match database fields with database structure, match fields with :labels
    $sql = "INSERT INTO characters (id, name, affiliation, bio, episodeiv, episodev, episodevi, thumbernail, imageone, imagetwo) VALUES (NULL,:na, :af, :bi, :iv, :v, :vi, :th, :i1, :i2);";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":na", $name); // Create one of these for each database field
    $query->bindParam(":af", $affiliation);
    $query->bindParam(":bi", $bio);
    $query->bindParam(":iv", $episodeiv);
    $query->bindParam(":v", $episodev);
    $query->bindParam(":vi", $episodevi);
    $query->bindParam(":th", $thumbernail);
    $query->bindParam(":i1", $imageone);
    $query->bindParam(":i2", $imagetwo);
    $result = $query->execute();
    return $result;

    try {
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Update Character
function updateCharacter($dbConnect,$id, $name, $affiliation, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    $sql = $dbConnect->prepare("UPDATE characters SET
         name = :na, 
         affiliation = :af,
         bio = :bi,
         episodeiv = :iv,
         episodev = :v,
         episodevi = :vi,
         thumbernail = :th,
         imageone = :i1,
         imagetwo = :i2
    WHERE id = :id"); 

    $sql->bindValue(':id', $id); //links id to content
    $sql->bindValue(':na', $name); //links label to content
    $sql->bindValue(':af', $affiliation); //links label to content
    $sql->bindValue(':bi', $bio);
    $sql->bindValue(':iv', $episodeiv);
    $sql->bindValue(':v', $episodev);
    $sql->bindValue(':vi', $episodevi);
    $sql->bindValue(':th', $thumbernail);
    $sql->bindValue(':i1', $imageone);
    $sql->bindValue(':i2', $imagetwo);
  
    $sql->execute(); 

      // allows to display message if update succesfull
      try {
        $result = $sql->execute();
        return $result; // Returns true if the update was successful, false otherwise
        // catch (Exception $e) <-- Error handling, log the error or display a message
    } catch (Exception) {
        
        return false;
    }
}

// Delete Character
function deleteCharacter($dbConnect, $id) {// each field to be deleted is passed in as a parameter and the linked via a :label
    $sql = "DELETE FROM characters WHERE id = :id"; // deletes 1 row via id
    $query = $dbConnect->prepare($sql); // saniteses data
    $query->bindParam(':id', $id); // links the data to id
    $query->execute(); // runs the delete   

}

// -------------------- eo CHARACTERS -------------------- \\


// -------------------- SHIPS -------------------- \\

// ships Sort by Dropdown
function shipsSortByDropdownPublic(){
    echo '
        <li><a href="ships.php">Recently added</a></li>
        <li><a href="shipsPublicSideSortOlder.php">Older</a></li>
        <li><a href="shipsPublicSideSortA_Z.php">A-Z</a></li>
        <li><a href="shipsPublicSideSortZ_A.php">Z-A</a></li>
        <li><a href="shipsPublicSideSortRebelAlliance.php">Rebel alliance</a></li>
        <li><a href="shipsPublicSideSortGalacticEmpire.php">Galactic Empire</a></li>
    ';
}

// ships Sort by Dropdown
function shipsSortByDropdownPrivate(){
    echo '
        <li><a href="shipsPrivateSide.php#iconAdd">Recently added</a></li>
        <li><a href="shipsPrivateSideSortOlder.php#iconAdd">Older</a></li>
        <li><a href="shipsPrivateSideSortA_Z.php#iconAdd">A-Z</a></li>
        <li><a href="shipsPrivateSideSortZ_A.php#iconAdd">Z-A</a></li>
        <li><a href="shipsPrivateSideSortRebelAlliance.php#iconAdd">Rebel alliance</a></li>
        <li><a href="shipsPrivateSideSortGalacticEmpire.php#iconAdd">Galactic Empire</a></li>
    ';
}

// list ship
function listShipPublicSide($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="shipDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listShipPrivateSide($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="shipUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="shipDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listShipPublicSideSortOlder($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="shipDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listShipPrivateSideSortOlder($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="shipUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="shipDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listShipPublicSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="shipDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listShipPrivateSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="shipUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="shipDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listShipPublicSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="shipDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listShipPrivateSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM ships ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="shipUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="shipDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listShipPublicSideSortRebelAlliance($dbConnect){
    $sql = "SELECT * FROM ships WHERE affiliation = 'Rebel Alliance' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="shipDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listShipPrivateSideSortRebelAlliance($dbConnect){
    $sql = "SELECT * FROM ships WHERE affiliation = 'Rebel Alliance' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="shipUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="shipDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listShipPublicSideSortGalacticEmpire($dbConnect){
    $sql = "SELECT * FROM ships WHERE affiliation = 'Galactic Empire' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="shipDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listShipPrivateSideSortGalacticEmpire($dbConnect){
    $sql = "SELECT * FROM ships WHERE affiliation = 'Galactic Empire' ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="shipUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="shipDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

// Search Bar function Ships Public Side
function searchShipPublicSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `ships` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
             <a href="shipDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="../index.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in ships was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// Search Bar function Ships Private Side
function searchShipPrivatecSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `ships` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
             <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="shipUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/ships/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="shipDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in ships was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// read ship details from the database 
function returnShipDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM ships"; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}

//Create Ship 
function insertShip($dbConnect, $name, $affiliation, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    //Match database fields with database structure, match fields with :labels
    $sql = "INSERT INTO ships (id, name, affiliation, bio, episodeiv, episodev, episodevi, thumbernail, imageone, imagetwo) VALUES (NULL,:na, :af, :bi, :iv, :v, :vi, :th, :i1, :i2);";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":na", $name); // Create one of these for each database field
    $query->bindParam(":af", $affiliation);
    $query->bindParam(":bi", $bio);
    $query->bindParam(":iv", $episodeiv);
    $query->bindParam(":v", $episodev);
    $query->bindParam(":vi", $episodevi);
    $query->bindParam(":th", $thumbernail);
    $query->bindParam(":i1", $imageone);
    $query->bindParam(":i2", $imagetwo);
    $result = $query->execute();
    return $result;

    try {
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Update Ship
function updateShip($dbConnect,$id, $name, $affiliation, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    $sql = $dbConnect->prepare("UPDATE ships SET
         name = :na, 
         affiliation = :af,
         bio = :bi,
         episodeiv = :iv,
         episodev = :v,
         episodevi = :vi,
         thumbernail = :th,
         imageone = :i1,
         imagetwo = :i2
    WHERE id = :id"); 

    $sql->bindValue(':id', $id); //links id to content
    $sql->bindValue(':na', $name); //links label to content
    $sql->bindValue(':af', $affiliation); //links label to content
    $sql->bindValue(':bi', $bio);
    $sql->bindValue(':iv', $episodeiv);
    $sql->bindValue(':v', $episodev);
    $sql->bindValue(':vi', $episodevi);
    $sql->bindValue(':th', $thumbernail);
    $sql->bindValue(':i1', $imageone);
    $sql->bindValue(':i2', $imagetwo);
  
    $sql->execute(); 

      // allows to display message if update succesfull
      try {
        $result = $sql->execute();
        return $result; // Returns true if the update was successful, false otherwise
        // catch (Exception $e) <-- Error handling, log the error or display a message
    } catch (Exception) {
        
        return false;
    }
}

//Delete Ship
function deleteShip($dbConnect, $id) {// each field to be deleted is passed in as a parameter and the linked via a :label
    $sql = "DELETE FROM ships WHERE id = :id"; // deletes 1 row via id
    $query = $dbConnect->prepare($sql); // saniteses data
    $query->bindParam(':id', $id); // links the data to id
    $query->execute(); // runs the delete   

}


// -------------------- eo SHIPS -------------------- \\


// -------------------- PLANETS -------------------- \\

// planets Sort by Dropdown
function planetsSortByDropdownPublic(){
    echo '
        <li><a href="planets.php">Recently added</a></li>
        <li><a href="planetsPublicSideSortOlder.php">Older</a></li>
        <li><a href="planetsPublicSideSortA_Z.php">A-Z</a></li>
        <li><a href="planetsPublicSideSortZ_A.php">Z-A</a></li>
    ';
}

// planets Sort by Dropdown
function planetsSortByDropdownPrivate(){
    echo '
        <li><a href="planetsPrivateSide.php#iconAdd">Recently added</a></li>
        <li><a href="planetsPrivateSideSortOlder.php#iconAdd">Older</a></li>
        <li><a href="planetsPrivateSideSortA_Z.php#iconAdd">A-Z</a></li>
        <li><a href="planetsPrivateSideSortZ_A.php#iconAdd">Z-A</a></li>
    ';
}

// list planet
function listPlanetPublicSide($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="planetDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listPlanetPrivateSide($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="planetUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="planetDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listPlanetPublicSideSortOlder($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="planetDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listPlanetPrivateSideSortOlder($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="planetUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="planetDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listPlanetPublicSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="planetDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listPlanetPrivateSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="planetUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="planetDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listPlanetPublicSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="planetDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listPlanetPrivateSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM planets ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="planetUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="planetDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

// Search Bar function Planets Public Side
function searchPlanetPublicSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `planets` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <a href="planetDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="../index.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Planets was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// Search Bar function Planets Private Side
function searchPlanetPrivateSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `planets` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="planetUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/planets/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="planetDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Planets was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// read the planet details from the database 
function returnPlanetDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM planets"; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}

//Create Planet
function insertPlanet($dbConnect, $name, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    //Match database fields with database structure, match fields with :labels
    $sql = "INSERT INTO planets (id, name, bio, episodeiv, episodev, episodevi, thumbernail, imageone, imagetwo) VALUES (NULL,:na, :bi, :iv, :v, :vi, :th, :i1, :i2);";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":na", $name); // Create one of these for each database field
    $query->bindParam(":bi", $bio);
    $query->bindParam(":iv", $episodeiv);
    $query->bindParam(":v", $episodev);
    $query->bindParam(":vi", $episodevi);
    $query->bindParam(":th", $thumbernail);
    $query->bindParam(":i1", $imageone);
    $query->bindParam(":i2", $imagetwo);
    $result = $query->execute();
    return $result;

    try {
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Update Planet
function updatePlanet($dbConnect,$id, $name, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    $sql = $dbConnect->prepare("UPDATE planets SET
         name = :na, 
         bio = :bi,
         episodeiv = :iv,
         episodev = :v,
         episodevi = :vi,
         thumbernail = :th,
         imageone = :i1,
         imagetwo = :i2
    WHERE id = :id"); 

    $sql->bindValue(':id', $id); //links id to content
    $sql->bindValue(':na', $name); //links label to content
    $sql->bindValue(':bi', $bio);
    $sql->bindValue(':iv', $episodeiv);
    $sql->bindValue(':v', $episodev);
    $sql->bindValue(':vi', $episodevi);
    $sql->bindValue(':th', $thumbernail);
    $sql->bindValue(':i1', $imageone);
    $sql->bindValue(':i2', $imagetwo);
  
    $sql->execute(); 

      // allows to display message if update succesfull
      try {
        $result = $sql->execute();
        return $result; // Returns true if the update was successful, false otherwise
        // catch (Exception $e) <-- Error handling, log the error or display a message
    } catch (Exception) {
        
        return false;
    }
}

//Delete Planet
function deletePlanet($dbConnect, $id) {// each field to be deleted is passed in as a parameter and the linked via a :label
    $sql = "DELETE FROM planets WHERE id = :id"; // deletes 1 row via id
    $query = $dbConnect->prepare($sql); // saniteses data
    $query->bindParam(':id', $id); // links the data to id
    $query->execute(); // runs the delete   

}

// -------------------- eo PLANETS -------------------- \\


// -------------------- JEDIS -------------------- \\

// jedis Sort by Dropdown
function jedisSortByDropdownPublic(){
    echo '
        <li><a href="jedis.php">Recently added</a></li>
        <li><a href="jedisPublicSideSortOlder.php">Older</a></li>
        <li><a href="jedisPublicSideSortA_Z.php">A-Z</a></li>
        <li><a href="jedisPublicSideSortZ_A.php">Z-A</a></li>
    ';
}

// jedis Sort by Dropdown
function jedisSortByDropdownPrivate(){
    echo '
        <li><a href="jedisPrivateSide.php#iconAdd">Recently added</a></li>
        <li><a href="jedisPrivateSideSortOlder.php#iconAdd">Older</a></li>
        <li><a href="jedisPrivateSideSortA_Z.php#iconAdd">A-Z</a></li>
        <li><a href="jedisPrivateSideSortZ_A.php#iconAdd">Z-A</a></li>
    ';
}

// list ship
function listJediPublicSide($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="jediDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

// read jedi details from the database 
function returnJediDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM jedis"; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}

function listJediPrivateSide($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="jediUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="jediDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listJediPublicSideSortOlder($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="jediDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listJediPrivateSideSortOlder($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="jediUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="jediDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listJediPublicSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="jediDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listJediPrivateSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="jediUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="jediDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listJediPublicSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="jediDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listJediPrivateSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM jedis ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="jediUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="jediDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

// Search Bar function Jedis Public Side
function searchJediPublicSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `jedis` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <a href="jediDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="../index.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Jedis was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// Search Bar function Jedis Private Side
function searchJediPrivateSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `jedis` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="jediUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/jedis/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="jediDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Jedis was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

//Create Jedi
function insertJedi($dbConnect, $name, $lightsaber, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    //Match database fields with database structure, match fields with :labels
    $sql = "INSERT INTO jedis (id, name, lightsaber, bio, episodeiv, episodev, episodevi, thumbernail, imageone, imagetwo) VALUES (NULL,:na, :li, :bi, :iv, :v, :vi, :th, :i1, :i2);";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":na", $name); // Create one of these for each database field
    $query->bindParam(":li", $lightsaber);
    $query->bindParam(":bi", $bio);
    $query->bindParam(":iv", $episodeiv);
    $query->bindParam(":v", $episodev);
    $query->bindParam(":vi", $episodevi);
    $query->bindParam(":th", $thumbernail);
    $query->bindParam(":i1", $imageone);
    $query->bindParam(":i2", $imagetwo);
    $result = $query->execute();
    return $result;

    try {
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Update Jedi
function updateJedi($dbConnect,$id, $name, $lightsaber, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    $sql = $dbConnect->prepare("UPDATE jedis SET
         name = :na, 
         lightsaber = :li,
         bio = :bi,
         episodeiv = :iv,
         episodev = :v,
         episodevi = :vi,
         thumbernail = :th,
         imageone = :i1,
         imagetwo = :i2
    WHERE id = :id"); 

    $sql->bindValue(':id', $id); //links id to content
    $sql->bindValue(':na', $name); //links label to content
    $sql->bindValue(':li', $lightsaber); //links label to content
    $sql->bindValue(':bi', $bio);
    $sql->bindValue(':iv', $episodeiv);
    $sql->bindValue(':v', $episodev);
    $sql->bindValue(':vi', $episodevi);
    $sql->bindValue(':th', $thumbernail);
    $sql->bindValue(':i1', $imageone);
    $sql->bindValue(':i2', $imagetwo);
  
    $sql->execute(); 

      // allows to display message if update succesfull
      try {
        $result = $sql->execute();
        return $result; // Returns true if the update was successful, false otherwise
        // catch (Exception $e) <-- Error handling, log the error or display a message
    } catch (Exception) {
        
        return false;
    }
}

//Delete Jedi
function deleteJedi($dbConnect, $id) {// each field to be deleted is passed in as a parameter and the linked via a :label
    $sql = "DELETE FROM jedis WHERE id = :id"; // deletes 1 row via id
    $query = $dbConnect->prepare($sql); // saniteses data
    $query->bindParam(':id', $id); // links the data to id
    $query->execute(); // runs the delete   

}


// -------------------- eo JEDIS -------------------- \\



// -------------------- SITHS -------------------- \\


// siths Sort by Dropdown
function sithsSortByDropdownPublic(){
    echo '
        <li><a href="siths.php">Recently added</a></li>
        <li><a href="sithsPublicSideSortOlder.php">Older</a></li>
        <li><a href="sithsPublicSideSortA_Z.php">A-Z</a></li>
        <li><a href="sithsPublicSideSortZ_A.php">Z-A</a></li>
    ';
}

// siths Sort by Dropdown
function sithsSortByDropdownPrivate(){
    echo '
        <li><a href="sithsPrivateSide.php#iconAdd">Recently added</a></li>
        <li><a href="sithsPrivateSideSortOlder.php#iconAdd">Older</a></li>
        <li><a href="sithsPrivateSideSortA_Z.php#iconAdd">A-Z</a></li>
        <li><a href="sithsPrivateSideSortZ_A.php#iconAdd">Z-A</a></li>
    ';
}

function listSithPublicSide($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="sithDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listSithsPrivateSide($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="sithUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="sithDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listSithPublicSideSortOlder($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="sithDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listSithsPrivateSideSortOlder($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="sithUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="sithDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listSithPublicSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="sithDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listSithsPrivateSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="sithUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="sithDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listSithPublicSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="sithDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listSithsPrivateSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM siths ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="sithUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="sithDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

// Search Bar function Siths Public Side
function searchSithPublicSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `siths` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <a href="sithDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="../index.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Siths was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// Search Bar function Siths Private Side
function searchSithPrivateSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `siths` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="sithUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/siths/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="sithDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Siths was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// read sith details from the database 
function returnSithDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM siths"; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}

//Create Sith
function insertSith($dbConnect, $name, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);
    
    //Match database fields with database structure, match fields with :labels
    $sql = "INSERT INTO siths (id, name, bio, episodeiv, episodev, episodevi, thumbernail, imageone, imagetwo) VALUES (NULL,:na, :bi, :iv, :v, :vi, :th, :i1, :i2);";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":na", $name); // Create one of these for each database field
    $query->bindParam(":bi", $bio);
    $query->bindParam(":iv", $episodeiv);
    $query->bindParam(":v", $episodev);
    $query->bindParam(":vi", $episodevi);
    $query->bindParam(":th", $thumbernail);
    $query->bindParam(":i1", $imageone);
    $query->bindParam(":i2", $imagetwo);
    $result = $query->execute();
    return $result;

    try {
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Update Sith
function updateSith($dbConnect,$id, $name, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    $sql = $dbConnect->prepare("UPDATE siths SET
         name = :na, 
         bio = :bi,
         episodeiv = :iv,
         episodev = :v,
         episodevi = :vi,
         thumbernail = :th,
         imageone = :i1,
         imagetwo = :i2
    WHERE id = :id"); 

    $sql->bindValue(':id', $id); //links id to content
    $sql->bindValue(':na', $name); //links label to content
    $sql->bindValue(':bi', $bio);
    $sql->bindValue(':iv', $episodeiv);
    $sql->bindValue(':v', $episodev);
    $sql->bindValue(':vi', $episodevi);
    $sql->bindValue(':th', $thumbernail);
    $sql->bindValue(':i1', $imageone);
    $sql->bindValue(':i2', $imagetwo);
  
    $sql->execute(); 

      // allows to display message if update succesfull
      try {
        $result = $sql->execute();
        return $result; // Returns true if the update was successful, false otherwise
        // catch (Exception $e) <-- Error handling, log the error or display a message
    } catch (Exception) {
        
        return false;
    }
}

//Delete Sith
function deleteSith($dbConnect, $id) {// each field to be deleted is passed in as a parameter and the linked via a :label
    $sql = "DELETE FROM siths WHERE id = :id"; // deletes 1 row via id
    $query = $dbConnect->prepare($sql); // saniteses data
    $query->bindParam(':id', $id); // links the data to id
    $query->execute(); // runs the delete   

}

// -------------------- eo SITHS -------------------- \\


// -------------------- ALIEN RACES -------------------- \\

// siths Sort by Dropdown
function alienRacesSortByDropdownPublic(){
    echo '
        <li><a href="alienRaces.php">Recently added</a></li>
        <li><a href="alienRacesPublicSideSortOlder.php">Older</a></li>
        <li><a href="alienRacesPublicSideSortA_Z.php">A-Z</a></li>
        <li><a href="alienRacesPublicSideSortZ_A.php">Z-A</a></li>
    ';
}

// alienRaces Sort by Dropdown
function alienRacesSortByDropdownPrivate(){
    echo '
        <li><a href="alienRacesPrivateSide.php#iconAdd">Recently added</a></li>
        <li><a href="alienRacesPrivateSideSortOlder.php#iconAdd">Older</a></li>
        <li><a href="alienRacesPrivateSideSortA_Z.php#iconAdd">A-Z</a></li>
        <li><a href="alienRacesPrivateSideSortZ_A.php#iconAdd">Z-A</a></li>
    ';
}

// list planet
function listAlienPublicSide($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="alienRaceDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listAlienPrivateSide($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY id DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="alienRaceUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="alienRaceDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listAlienPublicSideSortOlder($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="alienRaceDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listAlienPrivateSideSortOlder($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="alienRaceUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="alienRaceDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listAlienPublicSideSortSortA_Z($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY  TRIM(name) ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="alienRaceDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listAlienPrivateSideSortA_Z($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY TRIM(name) ASC ";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="alienRaceUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="alienRaceDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

function listAlienPublicSideSortSortZ_A($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="alienRaceDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
}

function listAlienPrivateSideSortZ_A($dbConnect){
    $sql = "SELECT * FROM alienraces ORDER BY TRIM(name) DESC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="alienRaceUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="alienRaceDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}

// Search Bar function Alien Races Public Side
function searchAlienRacePublicSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `alienraces` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <a href="alienRaceDetails.php?id=' . $row['id'] . '">
                <div class="dataCardContainer" >
                    <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                    <div class="name">
                        <p class="character-name">'.$row['name'].'</p>
                    </div>
                </div>
            </a>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="../index.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Alien Races was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// Search Bar function Alien Races Private Side
function searchAlienRacePrivateSide($dbConnect, $keyword, $succesfullSearch){
    $sql = "SELECT * FROM `alienraces` WHERE `name` LIKE '%$keyword%'";
    $succesfullSearch = false;
    foreach ($dbConnect->query($sql) as $row){
        $succesfullSearch = true;
        echo '
           <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="alienRaceUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/alienraces/'.$row['thumbernail'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['name'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="alienRaceDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    if (!$succesfullSearch) {
        echo '
            <div class="noResultsMessageContainer">
                    <a href="dashboard.php"><div class="addNewFormLogo" style="background-image: url(../images/logo/yoda.png);   height: 17vh; "></div></a>
                    <p class="noResultsMessage1">The greatest teacher, failure is.</p>
                    <br>
                    <p class="noResultsMessage2">Found, "'.$keyword.'" in Alien Races was not. Make another search or check the spelling, you should.</p>
            </div>
        ';
    }  
}

// read the planet details from the database 
function returnAlienDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM alienraces"; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}

//Create Alien
function insertAlien($dbConnect, $name, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){

    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    //Match database fields with database structure, match fields with :labels
    $sql = "INSERT INTO alienraces (id, name, bio, episodeiv, episodev, episodevi, thumbernail, imageone, imagetwo) VALUES (NULL,:na, :bi, :iv, :v, :vi, :th, :i1, :i2);";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":na", $name); // Create one of these for each database field
    $query->bindParam(":bi", $bio);
    $query->bindParam(":iv", $episodeiv);
    $query->bindParam(":v", $episodev);
    $query->bindParam(":vi", $episodevi);
    $query->bindParam(":th", $thumbernail);
    $query->bindParam(":i1", $imageone);
    $query->bindParam(":i2", $imagetwo);
    $result = $query->execute();
    return $result;

    try {
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Update Alien
function updateAlien($dbConnect,$id, $name, $bio, $episodeiv, $episodev, $episodevi, $thumbernail, $imageone, $imagetwo){
    // Convert name input data to lowercase to avoid problems when sorting by name
    $name = strtolower($name);

    $sql = $dbConnect->prepare("UPDATE alienraces SET
         name = :na, 
         bio = :bi,
         episodeiv = :iv,
         episodev = :v,
         episodevi = :vi,
         thumbernail = :th,
         imageone = :i1,
         imagetwo = :i2
    WHERE id = :id"); 

    $sql->bindValue(':id', $id); //links id to content
    $sql->bindValue(':na', $name); //links label to content
    $sql->bindValue(':bi', $bio);
    $sql->bindValue(':iv', $episodeiv);
    $sql->bindValue(':v', $episodev);
    $sql->bindValue(':vi', $episodevi);
    $sql->bindValue(':th', $thumbernail);
    $sql->bindValue(':i1', $imageone);
    $sql->bindValue(':i2', $imagetwo);
  
    $sql->execute(); 

      // allows to display message if update succesfull
      try {
        $result = $sql->execute();
        return $result; // Returns true if the update was successful, false otherwise
        // catch (Exception $e) <-- Error handling, log the error or display a message
    } catch (Exception) {
        
        return false;
    }
}

//DeleteAlien
function deleteAlien($dbConnect, $id) {// each field to be deleted is passed in as a parameter and the linked via a :label
    $sql = "DELETE FROM alienraces WHERE id = :id"; // deletes 1 row via id
    $query = $dbConnect->prepare($sql); // saniteses data
    $query->bindParam(':id', $id); // links the data to id
    $query->execute(); // runs the delete   

}

// -------------------- eo ALIEN RACES -------------------- \\


// -------------------- THE FORCE -------------------- \\

// read the force details from the database 
function returnForceDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM theforce LIMIT 1 "; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}

//Update force
function updateForce($dbConnect,$id, $about, $imageone, $imagetwo){
    $sql = $dbConnect->prepare("UPDATE theforce SET
         about = :ab, 
         imageone = :i1,
         imagetwo = :i2
    WHERE id = :id"); 

    $sql->bindValue(':id', $id); //links id to content
    $sql->bindValue(':ab', $about); //links label to content
    $sql->bindValue(':i1', $imageone);
    $sql->bindValue(':i2', $imagetwo);
  
    $sql->execute(); 

      // allows to display message if update succesfull
      try {
        $result = $sql->execute();
        return $result; // Returns true if the update was successful, false otherwise
        // catch (Exception $e) <-- Error handling, log the error or display a message
    } catch (Exception) {
        
        return false;
    }
}

// -------------------- eo THE FORCE -------------------- \\



// -------------------- MOVIES -------------------- \\

function listMoviePublicSide($dbConnect){
    $sql = "SELECT * FROM movies";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <a href="movieDetails.php?id=' . $row['id'] . '">
                <div class="moviesImgContainer">
                    <br>
                    <h2 >'.$row['title'].'</h2>
                    <br>
                    <img class="movieImg" src="../images/movies/'.$row['posterimage'].'" alt="">
                </div>
            </a>
        ';
    }
}

function listMoviePrivateSide($dbConnect){
    $sql = "SELECT * FROM movies ORDER BY id ASC";
    foreach ($dbConnect->query($sql) as $row){
        echo '
            <div class="dataCardContainerPrivate"> 
                <div class="loggedInOptions">
                    <div class="editDeleteContainer">
                        <a href="movieUpdate.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen" id="iconEdit2"></i></a>
                        <i class="fa-solid fa-trash" id="iconTrash"></i>  
                    </div>
                </div>
                <img class="cardImg" src="../images/movies/'.$row['posterimage'].'" alt="thumbernail">
                <div class="namePrivate">
                    <p class="character-name">'.$row['title'].'</p>
                </div>
                <!-- DELETE modal container -->
                <div id="modal" class="modal-container">
                    <div class="modal-content">
                        <!-- <h2>Delete Confirmation</h2> -->
                        <p class="confirmation-message">
                            Are you sure you want to permanently delete this record?
                        </p>
                        <form class="button-container" action="movieDeleteAction.php">
                        <input type="hidden" name="id" value="'.$row ['id'].'">
                            <p id="cancelBtn" class="cancel-button">Cancel</p>
                            <button type="submit" id="deleteBtn" class="button delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
}


function returnMovieDetails($dbConnect, $id, $fieldName){
    $sql = "SELECT * FROM movies"; //select all from the database table
    foreach ($dbConnect->query($sql) as $row) {  // stick all datbase row data into a row array
        if ($id == $row['id']) {
            return $row[$fieldName];
        } 
    }
}

//Create Movie
function insertMovie($dbConnect, $title, $intro, $sypnosis, $posterimage, $background, $imageone, $imagetwo){
    //Match database fields with database structure, match fields with :labels
    $sql = "INSERT INTO movies (id, title, intro, sypnosis, posterimage, background, imageone, imagetwo) VALUES (NULL,:ti, :in, :sy, :po, :ba, :i1, :i2);";
    $query = $dbConnect->prepare($sql);
    $query->bindParam(":ti", $title); // Create one of these for each database field
    $query->bindParam(":in", $intro);
    $query->bindParam(":sy", $sypnosis);
    $query->bindParam(":po", $posterimage);
    $query->bindParam(":ba", $background);
    $query->bindParam(":i1", $imageone);
    $query->bindParam(":i2", $imagetwo);
    $result = $query->execute();
    return $result;

    try {
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function updateMovie($dbConnect, $id, $title, $intro, $sypnosis, $posterimage, $background, $imageone, $imagetwo){
    //Match database fields with database structure, match fields with :labels
            $sql = $dbConnect->prepare("UPDATE movies SET
            title = :ti, 
            intro = :in,
            sypnosis = :sy,
            posterimage = :po,
            background = :ba,
            imageone = :i1,
            imagetwo = :i2
        WHERE id = :id"); 
    $sql->bindValue(':id', $id); //links id to content
    $sql->bindParam(":ti", $title); // Create one of these for each database field
    $sql->bindParam(":in", $intro);
    $sql->bindParam(":sy", $sypnosis);
    $sql->bindParam(":po", $posterimage);
    $sql->bindParam(":ba", $background);
    $sql->bindParam(":i1", $imageone);
    $sql->bindParam(":i2", $imagetwo);

    $sql->execute();

    try {
        $result = $sql->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Delete Movie
function deleteMovie($dbConnect, $id) {// each field to be deleted is passed in as a parameter and the linked via a :label
    $sql = "DELETE FROM movies WHERE id = :id"; // deletes 1 row via id
    $query = $dbConnect->prepare($sql); // saniteses data
    $query->bindParam(':id', $id); // links the data to id
    $query->execute(); // runs the delete 
}  


?>



