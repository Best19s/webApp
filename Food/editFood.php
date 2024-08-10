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
   $dbname = "pretest2_midterm";
   $conn = mysqli_connect($host, $user, $password, $dbname);
   ?>
</head>

<body>
   <form method="post">
      <h2>แก้ไขราคาอาหาร</h2>
      <label for="name">ชื่ออาหาร:</label>
      <select name="foods">
         <option value="เลือกอาหาร" disabled='disabled' selected>เลือกอาหาร</option>
      <?php
         if($conn) {
            $sql = "SELECT * FROM food";
            $result = mysqli_query($conn, $sql);
            while ($rs = mysqli_fetch_array($result)) {
               echo "<option name=foods[] value=$rs[name]>$rs[id].$rs[name]</option>";
            }
         }
      ?>
      </select>
      <br>
      <!-- <input type="text" name="food_name" required> <br> -->
      <label>ราคาอาหารใหม่:</label>
      <input type="text" name="price_new" required> <br>
      <br>
      <input type="submit" value="บันทึกราคาใหม่">
      <a href="addFood.php">กลับหน้ารายการอาหาร</a>
   </form>
   <?php

   if ($conn) {
      if (isset($_POST["foods"]) && isset($_POST["price_new"])) {
         $price = $_POST["price_new"];
         $food_name = $_POST["foods"];
         $sql = "UPDATE food SET price = $price WHERE name = '$food_name'";
         if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Update complete') </script>";
            header("Location: addFood.php");
         }
      }
   }
   mysqli_close($conn);
   ?>
</body>

</html>
