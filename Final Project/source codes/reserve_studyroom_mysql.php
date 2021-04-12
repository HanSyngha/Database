<html>
    <body>
    <center><br><br>
<?php
$date=$_POST['date'];
$rid=$_POST['rid'];
$time=$_POST['time'];
session_start();
$conn = mysqli_connect(
  'localhost',
  'root',
  '123456',
  'skku_library');
$sql = "INSERT Into reserve (lid,rid,date,time) values (".$_SESSION["ses_lid"].",".$rid.",'".$date."','".$time."');";
$result = mysqli_query($conn, $sql);
?>
        <?php echo($date." 일".$time." 시<br>");?>스터디룸 예약 완료되었습니다. <br><br> 마이 페이지에서 확인할 수 있습니다 <br><br>
    <form action="my_page.php" method="POST">
  <p><input type="submit" value = "마이페이지"></p>
</form>
</center>
</body>
</html>

