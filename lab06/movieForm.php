<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      body {
         font-family: Helvetica;
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%,-50%);
      }
      form {
         background-color: #ecebe8;
         width: 450px;
         padding: 15px;
         border-radius: 12px;
         border: 2px solid #000;
      }
      .btn {
         padding-top: 20px;
      }
      h2 {
         text-align: center;
      }
      
   </style>
   <?php
   $host = "localhost";
   $user = "root";
   $password = "";
   $dbname = "lab06sec1";
   $conn = mysqli_connect($host, $user, $password, $dbname);
   ?>

</head>
<body>
   <form action="check.php" method="POST">
      <h2>Movie Form</h2>
      <?php
      if($conn) {
         $sql = "SELECT * FROM movies";
         $result = mysqli_query($conn,$sql);

         while($rs = mysqli_fetch_array($result)) {
            $id = $rs["movie_id"];
            $watched = $rs["watched"];
            if($rs["watched"]==1){
               echo "<input type=checkbox checked disabled name=movies[] value=$id>";
               echo $rs["movie_title"]."<br>";

            }
            else {
               echo "<input type=checkbox name=movies[] value=$id>";
               echo $rs["movie_title"]."<br>";
            }
         }
         mysqli_close($conn);
      }
      else {
         echo "Error!";
         exit;
      }

      ?>
      <div class="btn">
         <input type="submit" value="Check">
         <input type="submit" name="clear" value="Clear">
      </div>
   </form>
</body>
</html>
