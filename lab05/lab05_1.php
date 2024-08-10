<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form action="" method="POST">
      <fieldset>
         <label for="name">Enter your name:</label>
         <input type="text" name="name" required>
         <br>
         <label for="tel">Enter your phone:</label>
         <input type="number" name="tel" required>
         <br>
         <label for="km">Enter kilometers:</label>
         <input type="number" name="km" required>
         <br>
         <input type="submit" value="Submit">

         <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
               $name = $_POST["name"];
               $tel = $_POST["tel"];
               $km = $_POST["km"];

               function convert($km) {
                  return $km * 0.621371;
               }

               echo "<hr>";
               echo "Answer:";
               echo "<br>";
               echo "Name: ".$name;
               echo "<br>";
               echo "Phone: ".$tel;
               echo "<br>";
               echo "Convert kilometers to miles: ".convert($km);

            }
         ?>
      </fieldset>
   </form>
   
</body>
</html>