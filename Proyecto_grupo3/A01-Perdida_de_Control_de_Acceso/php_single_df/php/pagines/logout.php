<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Desconectar</title>
   </head>
   <body>
   <h1>INTRANET. DESCONECTAR</h1>
   <?php
      session_start();
      if (isset($_SESSION['Ussr'])){
        session_unset();
        session_destroy();
        header("Location:index.php");
         exit();
     } else {
         header("Location:index.php");
         exit();
     }
    ?>
   </body>
</html>