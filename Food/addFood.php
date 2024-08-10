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

   if ($conn) {
      if (isset($_POST["food_name"]) && isset($_POST["food_type"]) && isset($_POST["price"])) {
         $food_name = $_POST["food_name"];
         $food_type = $_POST["food_type"];
         $price = $_POST["price"];
         $sql = "INSERT INTO food(name,type,price) VALUES('$food_name','$food_type','$price')";
         if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            echo "<script> alert('Insert Success') </script>";
         }
      }
   }
   ?>
</head>

<body>
   <a href="index.php">กลับหน้าฟอร์ม</a>
   <form method="post">

      <h2>ตารางรายการอาหาร</h2>
      <table border="1px" style="border-collapse: collapse;">
         <th>เลขรายการอาหาร</th>
         <th>ชื่อรายการอาหาร</th>
         <th>ประเภทรายการอาหาร</th>
         <th>ราคาอาหาร</th>
         <th>ลบรายการ</th>

         <?php
         $sql = "SELECT * FROM food";
         $result = mysqli_query($conn, $sql);
         while ($rs = mysqli_fetch_array($result)) {
            $id = $rs["id"];
            $name = $rs["name"];
            $type = $rs["type"];
            $price = $rs["price"];
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$type</td>";
            echo "<td>$price</td>";
            echo "<td><input type=checkbox name=check[] value=$id</td>";
            echo "</tr>";
         }
         ?>
      </table>
      <input type="submit" name="delete" value="ลบข้อมูล">
   </form>
   <?php
       if (isset($_POST["check"])) {
         foreach($_POST["check"] as $id) {
            $sql = "DELETE FROM food WHERE id = '$id'";
            mysqli_query($conn,$sql);
         }
      }
   ?>
   <br>
   <a href="editFood.php">แก้ไขข้อมูล</a>

</body>

</html>
