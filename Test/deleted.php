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

         if (isset($_POST["delete"])) {
            foreach($_POST["delete"] as $id) {
               $sql = "DELETE FROM customers WHERE id = $id";
               $result = mysqli_query($conn,$sql);
            }
         }
      }
   }
   mysqli_close($conn);
   echo "<script> alert('Data Deleted Successfully!') </script>";
   echo "<script> window.location.href = 'index.php'</script>";

   ?>
</head>

<body>

</body>

</html>
