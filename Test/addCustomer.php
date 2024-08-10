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
      $dbname = "preTest_midterm";
      $conn = mysqli_connect($host, $user, $password, $dbname);

      if ($conn) {
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
               $name = $_POST["input_name"];
               $email = $_POST["input_email"];
               $date_time = date("Y-m-d H:i:s", time());
               $sql = "INSERT INTO customers(name,email,date_register) VALUES ('$name','$email','$date_time')";
               $last_id = mysqli_insert_id($conn);
               $result = mysqli_query($conn,$sql);
            }
         }
      }
      mysqli_close($conn);
      // header("Location: index.php");
      // echo "<script> alert('Data Insert Successfully!') </script>";
      echo "<script> window.location.href = 'index.php'</script>";
   ?>

</head>
<body>
</body>
</html>
