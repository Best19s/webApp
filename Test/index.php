<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form</title>
   <style>
      fieldset {
         width: 500px;
         padding: 20px;
      }

      #name,
      #email {
         width: 400px;
         margin: 5px;
      }

      #email {
         width: 375px;
      }

      th {
         padding: 10px;
      }

      tr td {
         padding: 5px;
      }
      #form2 {
         width: 540px;
         position: relative;
      }
      #delete {
         margin-top: 20px;
         position: absolute;
         right: 0;
      }
   </style>
   <?php
   $host = "localhost";
   $user = "root";
   $password = "";
   $dbname = "preTest_midterm";
   $conn = mysqli_connect($host, $user, $password, $dbname);

   if ($conn) {
      $sql = "SELECT * FROM customers";
      $result = mysqli_query($conn, $sql);
   }
   ?>
</head>

<body>
   <fieldset>
      <legend>เพิ่มข้อมูลลูกค้า</legend>
      <form action="addCustomer.php" method="POST">
         <label for="">ชื่อ:</label>
         <input type="text" name="input_name" id="name" required> <br>
         <label for="">อีเมลล์:</label>
         <input type="text" name="input_email" id="email" required>
         <input type="submit" name="submit" value="Submit" onclick="alert('Data Insert Successfully!')">
      </form>
   </fieldset>

   <form action="deleted.php" method="POST" id="form2">
      <h1>ตารางชื่อลูกค้า</h1>
      <table border="1px" style="border-collapse: collapse;">
         <tr>
            <th>หมายเลข</th>
            <th>ชื่อลูกค้า</th>
            <th>อีเมลล์</th>
            <th>วันที่เข้าใช้งาน</th>
            <th>ลบ</th>
         </tr>
         <?php

         while ($rs = mysqli_fetch_array($result)) {
            $id = $rs["id"];
            $name = $rs["name"];
            $email = $rs["email"];
            $date = $rs["date_register"];
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$email</td>";
            echo "<td>$date</td>";
            echo "<td><input type=checkbox name=delete[] value=$id></td>";
            echo "</tr>";
         }

         ?>
      </table>
      <input type="submit" value="Delete" id="delete" onclick="alert('Data Deleted!')">

   </form>


</body>

</html>
