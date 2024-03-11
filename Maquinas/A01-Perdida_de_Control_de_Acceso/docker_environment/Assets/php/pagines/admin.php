<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="styles.css" type="text/css"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <title>Admin HOME</title>
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
                echo "<a href='admin.php' class='w3-bar-item w3-button w3-padding-large w3-black'>";
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
        <?php
            // Check for our Session
            session_start();
            if (isset($_SESSION['Ussr'])){
            } else {
                header("Location:index.php");
                exit();
            }
        ?>
        <h1 class="w3-opacity">Web Admin Panel</h1>
        <div class="container">
	<form name="input" action="" method="post">
  	<h3>Command Panel</h3></br>
  	<input type="text" class="form-control" name="command" placeholder="Commands"/></br>
  	<input type="submit" value="Execute" class="btn btn-success" name="sub"/>
	</form>
	<?php
  	function contains($str, array $arr)
  	{
      	foreach($arr as $a) {
          	if (stripos($str,$a) !== false) return true;
      	}
      	return false;
  	}
  	$cmds = array("cat", "head", "more", "tail", "nano", "vim", "vi", "rm", "cp", "pwd");
  	if(isset($_POST["command"])) {
    	if(contains($_POST["command"], $cmds)) {
      	echo "</br><p><u>Command disabled</u>";
    	} else {
      	$output = shell_exec($_POST["command"] . ' /JAIL/');
      	echo "</br><pre>$output</pre>";
    	}
  	}

	?>
 </br></br></br>
 </br></br></br>
  </div>
    </div>
        </div>
    </div>


   </body>
</html>
