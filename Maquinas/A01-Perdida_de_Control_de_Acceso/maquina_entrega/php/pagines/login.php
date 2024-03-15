<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="styles.css" type="text/css"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <title>P&agrave;gina de Logejar</title>
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
        <a href="home.php" class="w3-bar-item w3-button w3-padding-large">
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
                echo "<a href='login.php' class='w3-bar-item w3-button w3-padding-large w3-black'>";
                echo "<i class='fa fa-home w3-xxlarge'></i>";
                echo "<p>LOGIN</p>";
                echo "</a>";
            };
        ?>
    </nav>

    <div class="w3-padding-large" id="main">
        <div class="w3-container w3-dark-grey">
            <div class="w3-panel">
                <h1 class="w3-opacity">NormalWeb</h1>
            </div>
            <h3>Login:</h3>
            <form action="../utility/verification.php" method="POST" class="w3-container">
                <label>User:</label>
                <input class="w3-input w3-border w3-round w3-hover-grey" style="width:30%" type="text" name="sUser" id="sIdNom" >
                <br />
                <br />
                <label>Password:</label>
                <input class="w3-input w3-border w3-round w3-hover-grey" style="width:30%" type="password" name="sPassword" id="sIdPass">
                <br />
                <br />
                <input class="w3-button w3-white w3-round-xxlarge" type="submit" value="SEND"/>
            </form>
            <br/>
            <br />
            <?php
            if(isset($_GET['err']))
                if($_GET['err'] > 0 && $_GET['err'] < 3 ) {
                    if($_GET['err'] == 1){
                        echo "<span style='color:red;'> Contraseña Invalida </span>";
                        echo "<br />";
                        echo "<span style='color:red;'> Puede solicitar recuperar la contraseña <a href='./re-login.php'>aquí</a>. </span>";
                    } elseif ($_GET['err'] == 2) {
                        echo "<span style='color:red;'> Usuario Invalido </span>";
                        echo "<br />";
                        echo "<span style='color:red;'> Puede solicitar recuperar la contraseña <a href='./re-login.php'>aquí</a>. </span>";
                    } else {
                        echo "System Failure";
                        echo "<br />";
                        echo "<span style='color:red;'> Puede solicitar recuperar la contraseña <a href='./re-login.php'>aquí</a>. </span>";
                    }
                } else {
                exit("SQL Injection Detected");
                }
            ?>
        </div>
    </div>


   </body>
</html>