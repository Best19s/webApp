<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php
      $sec_in_day = 60*60*24;
      $now = strtotime("now"); //เวลาต้อนนี้
      $expried = strtotime($_POST['expired']); //เวลาที่กรอกเข้ามา
      if($expried<$now) {
         echo "สินค้าหมดอายุ";
      }
      else {
         $num_days = ceil(($expried-$now)/$sec_in_day);
         if($num_days==0) {
            echo "สินค้าจะหมดอายุวันนี้";
         }
         else {
            echo "สินค้าจะหมดอายุภายใน $num_days วัน";
         }
      }
   ?>
</body>
</html>
