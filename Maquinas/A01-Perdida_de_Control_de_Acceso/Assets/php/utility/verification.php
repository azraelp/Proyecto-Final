<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Pagina de Verificacio</title>
   </head>
   <body>
      <?php
    include "config.php"; //include - require

    // Create Conn
    $conn = new mysqli($SERVER_NAME, $USER_DB, $PASS_DB, $DB_NAME, $DB_PORT);

    // Check Conn
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

    $sql = "SELECT user, passwd FROM people WHERE user='" . $USER_FORM ."'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($PASS_FORM == $row['passwd']) {
        //if (password_verify($PASS_FORM,$row['Pass'])) {
            echo "user valid";
            echo "<br />";
            session_start();
            $_SESSION["Ussr"] = $_POST["sUser"];
            echo "Session var is: " . $_SESSION["Ussr"];
            echo "<br />";
            //
            header("Location:../pagines/home.php");
        } elseif (isset($PASS_VULN)) { 
            echo "user valid -- recuperado";
            echo "<br />";
            session_start();
            $_SESSION["Ussr"] = $_POST["sUser"];
            echo "Session var is: " . $_SESSION["Ussr"];
            echo "<br />";
            //
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

    mysqli_close($conn);
    

      ?>
   </body>
</html>