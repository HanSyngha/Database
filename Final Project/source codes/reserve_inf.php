<html>
    <body>
    <center><br><br>
<?php
session_start();
$lid = $_SESSION["ses_lid"];
$conn = mysqli_connect(
  'localhost',
  'root',
  '123456',
  'skku_library');
$sql = "SELECT name,date,time from studyroom S, reserve R where R.lid = '".$lid."' AND S.rid = R.rid";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count<1)
{
     echo("<script>location.replace('no_reserve.php');</script>");
}
else
{
    while($row = mysqli_fetch_array($result))
    {
         echo($row[0]."<br>".$row[1] ." 일 : ".$row[2] ." 시에 예약되어있습니다.: ");
         echo("<br><br><br>");
    }
}
?>
<form action="my_page.php" method="POST">
<p><input type="submit" value = "마이페이지로 돌아가기"></p>
</form>
</center>
</body>
</html>