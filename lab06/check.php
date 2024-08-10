<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <?php

      $host = "localhost";
      $user = "root";
      $password = "";
      $dbname = "lab06sec1";
      $conn = mysqli_connect($host, $user, $password, $dbname);

      if($conn) {
         if(isset($_POST["movies"])) {
            foreach($_POST["movies"] as $movie_id) {
               $sql = "UPDATE movies SET watched = 1 WHERE movie_id = '$movie_id'";
               mysqli_query($conn, $sql);
            }
         }
         elseif(isset($_POST["clear"])) {
            $sql = "UPDATE movies SET watched = 0";
            mysqli_query($conn, $sql);
         }
         // if($_SERVER["REQUEST_METHOD"] == "POST") {
         // }
         mysqli_close($conn);
         header("Location: movieForm.php");
      }
   ?>
</head>
<body>

</body>
</html>
