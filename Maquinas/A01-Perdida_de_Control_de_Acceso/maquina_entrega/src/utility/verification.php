<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Pagina de Verificacio</title>
   </head>
   <body>
      <?php

    $USER_FORM = $_POST["sUser"];
    $PASS_FORM = $_POST["sPassword"];
    $PASS_VULN = $_POST["sPassword2"];

    if (isset($PASS_VULN)) { 
        echo "user valid -- recuperado";
        echo "<br />";
        session_start();
        $_SESSION["Ussr"] = $_POST["sUser"];
        echo "Session var is: " . $_SESSION["Ussr"];
        echo "<br />";
        //
        header("Location:../pagines/home.php");
    }

    echo $PASS_VULN;

    if ($USER_FORM == "web-admin") {
        if ($PASS_FORM == "Admin1234567") {
        //if (password_verify($PASS_FORM,$row['Pass'])) {
            echo "user valid";
            echo "<br />";
            session_start();
            $_SESSION["Ussr"] = $_POST["sUser"];
            echo "Session var is: " . $_SESSION["Ussr"];
            echo "<br />";
            header("Location:../pagines/home.php");
        } else {
            echo "Invalid Password";
            header("Location:../pagines/login.php?err=1");
            exit();
        }
    } else {
        echo "Invalid User";
        header("Location:../pagines/login.php?err=2");
        exit();
    }

      ?>
   </body>
</html>