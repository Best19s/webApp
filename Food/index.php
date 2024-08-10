<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Food Form</title>
</head>
<body>
   <form action="addFood.php" method="post">
      <h2>กรุณากรอกข้อมูลอาหาร</h2>
      <label for="name">ชื่ออาหาร:</label>
      <input type="text" name="food_name" required> <br>
      <p>ประเภทอาหาร</p>
      <label><input type="radio" name="food_type" value="เมนูทั่วไป" checked>เมนูทั่วไป</label> <br>
      <label><input type="radio" name="food_type" value="เมนูทั่วไป">เมนูเส้น</label> <br>
      <label><input type="radio" name="food_type" value="เมนูทั่วไป">เมนูทานเล่น</label> <br>
      <br>
      <label>ราคาอาหาร:</label>
      <input type="text" name="price" required> <br>
      <br>
      <input type="submit" value="เพิ่มเมนูอาหาร">
   </form>
   <br>
   <a href="addFood.php">ดูรายการอาหาร</a>


</body>
</html>
