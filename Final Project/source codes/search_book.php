<html>
    <body>
    <center><br><br>
<?php
$value=$_POST['value'];
$conn = mysqli_connect(
  'localhost',
  'root',
  '123456',
  'skku_library');
$sql = "SELECT bid,title,author,available,location FROM book WHERE title LIKE '%$value%' OR author LIKE '%$value%'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count<1)
{
     echo("<script>location.replace('no_result.php');</script>");
}
else
{
     while($row = mysqli_fetch_array($result))
     {
         echo("등록번호: ".$row[0]."<br>제목: ".$row[1] ."<br>저자: ".$row[2] ."<br>");
         echo( "보관 위치: ".$row[4]."<br><br>");
         if($row[3] == 0) 
         {
             echo(" 대출중 ");
             ?>
             <form action="waitbook.php" method="POST">
                 <input type="hidden" name="bid" value = "<?php echo "{$row[0]}";?>">
             <p><input type="submit" value = "예약하기"></p>
             </form><br><br>
             <?php
         }
         else{
             echo(" 대출가능 ");
             ?>
             <form action="rentbook.php" method="POST">
                 <input type="hidden" name="bid" value = "<?php echo "{$row[0]}";?>">
             <p><input type="submit" value = "대출하기"></p>
             </form><br><br>
 <?php
         }
     }
}
?>
</center>
</body>
</html>