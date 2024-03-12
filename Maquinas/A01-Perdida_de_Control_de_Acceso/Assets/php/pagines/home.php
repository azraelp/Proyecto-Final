<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="styles.css" type="text/css"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <title>P&agrave;gina de Logejar</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #696969;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
   <body class="w3-gray">
   <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
         <a class="w3-bar-item w3-button w3-padding-large">
            <i class="fa fa-home w3-xxlarge"></i>
        </a>
        <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>Home</p>
        </a>
        <a class="w3-bar-item w3-button w3-padding-large">
            <i class="fa fa-home w3-xxlarge"></i>
        </a>
        <?php
        session_start();
        if (isset($_SESSION['Ussr'])){
                echo "<a href='admin.php' class='w3-bar-item w3-button w3-padding-large'>";
                echo "<i class='fa fa-home w3-xxlarge'></i>";
                echo "<p>shrek-master</p>";
                echo "</a>";
                echo "<a href='logout.php' class='w3-bar-item w3-button w3-padding-large'>";
                echo "<i class='fa fa-home w3-xxlarge'></i>";
                echo "<p>LOGOUT</p>";
                echo "</a>";
            } else { 
                echo "<a href='login.php' class='w3-bar-item w3-button w3-padding-large'>";
                echo "<i class='fa fa-home w3-xxlarge'></i>";
                echo "<p>LOGIN</p>";
                echo "</a>";
            };
        ?>
    </nav>
    <div class="w3-padding-large" id="main">
        <div class="w3-container w3-dark-grey">
            <div class="w3-panel ">
                <h1 class="w3-opacity">Admin Secret Web</h1>
            </div>
            <div class="w3-container w3-dark-grey">
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <br />
    <p>Author: shrek-master </p>
    </div>
        <?php
        if (isset($_GET['op'])) {
            if ($_GET['op'] == 'delok') {
                echo '<div class="alert alert-success">';
                echo '<strong><i class="glyphicon glyphicon-ok-circle"></i> Success!</strong> Registre eliminat correctament.';
                echo '</div>';
            }
            if ($_GET['op'] == 'upok'){
                echo '<div class="alert alert-success">';
                echo '<strong><i class="glyphicon glyphicon-ok-circle"></i> Success!</strong> Registre actualitzat correctament.';
                echo '</div>';
            }
            if ($_GET['op'] == 'errpeticio'){
                echo '<div class="alert alert-danger">';
                echo "<strong><i class='glyphicon glyphicon-exclamation-sign'></i> ERROR!</strong> S'ha produit un error en l'operació.";
                echo '</div>';
            }
        }
        ?>
    </div>
        </div>
    </div>
   </body>
</html>
