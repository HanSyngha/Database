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
$sql = "SELECT B.bid,title,author,priority FROM book B, waiting W WHERE B.bid = W.bid AND W.lid = '".$lid."' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count<1)
{
     echo("<script>location.replace('no_wait.php');</script>");
}
else
{
     $now = date_create(date("y-m-d"));
    echo("오늘 날짜 : ".$now->format("y-m-d")."<br><br>");
    echo("<예약 도서 목록> <br><br><br>");
     while($row = mysqli_fetch_array($result))
     {
         echo("등록번호: ".$row[0]."<br>제목: ".$row[1] ."<br>저자: ".$row[2] ."<br> 예약순위: ".$row[3]);
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