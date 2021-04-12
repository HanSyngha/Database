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
$sql = "INSERT INTO rent(lid,bid,date) values ('".$lid."','".$bid."',NOW());";
$result = mysqli_query($conn, $sql);
$sql = "UPDATE book SET available = 0 where bid = '".$bid."';";
$result = mysqli_query($conn, $sql);
if($result != NULL)
{
    ?>
        도서 대여 완료 <br><br> 마이 페이지에서 확인할 수 있습니다 <br><br>
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
