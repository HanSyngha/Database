<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SKKU Library </title>
  </head>
  <body>
  <center>
      <div>SKKU Library ( Made by 한승하(2016311821))</div><br>
     <?php
        echo "안녕하세요 ".$_SESSION["ses_name"]." 님!";   
        ?><br><br>
      <div> <a href="library.php"><도서검색></a> </div><br>
      <div> <a href="studyroom.php"><스터디룸 예약></a> </div><br>
      <div> <a href="my_page.php"><마이페이지></a> </div><br>
      <div> <a href="logout_phase.php"><로그아웃></a> </div><br>
  </center>
  </body>
</html>