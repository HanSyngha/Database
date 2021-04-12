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
$sql = "SELECT B.bid,title,author,date FROM book B, rent R WHERE B.bid = R.bid AND R.lid = '".$lid."' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count<1)
{
     echo("<script>location.replace('no_rent.php');</script>");
}
else
{
     $now = date_create(date("y-m-d"));
    echo("오늘 날짜 : ".$now->format("y-m-d")."<br><br>");
    echo("<대여 도서 목록> <br><br><br>");
     while($row = mysqli_fetch_array($result))
     {
         echo("등록번호: ".$row[0]."<br>제목: ".$row[1] ."<br>저자: ".$row[2] ."<br> 대출일: ".$row[3]);
         $date = date_create($row[3]);
         date_add($date,date_interval_create_from_date_string("15 days"));
         echo("<br>반납일: ".date_format($date,"Y-m-d")."<br>");
         $diff=date_diff($now,$date);
         if($diff->format("%R%a")<0)
         {
             echo $diff->format("<br><< %a 일 연체중 >><br><br>");
             $money = $diff->format("%a") * 100;
             echo ("현재까지 연체료는 ".$money."원 입니다<br>(연체료는 하루당 100원 입니다)<br>");
         }
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