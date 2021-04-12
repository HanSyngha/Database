<html>
    <body>
    <center><br><br>
<?php
$bid=$_POST['bid'];
$conn = mysqli_connect(
  'localhost',
  'root',
  '123456',
  'skku_library');
 session_start();
 $lid = $_SESSION["ses_lid"];
 $sql = "SELECT bid from waiting where bid ='".$bid."';";
$count = mysqli_num_rows(mysqli_query($conn, $sql)) + 1;

$sql2 = "INSERT INTO waiting(lid,bid,priority) values ('".$lid."','".$bid."','".$count."');";
$result2 = mysqli_query($conn, $sql2);
if($result2 != NULL)
{
    ?>
        도서 예약 완료 <br><br> 마이 페이지에서 확인할 수 있습니다 <br><br>
    <form action="my_page.php" method="POST">
  <p><input type="submit" value = "마이페이지"></p>
</form>
  <form action="library.php" method="POST">
  <p><input type="submit" value = "다른 도서 검색"></p>
</form>      
   <?php
}
?>
    </center>
</body>
</html>
