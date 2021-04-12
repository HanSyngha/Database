<html>
    <body>
    <center><br><br>
         <?php
         session_start();
        echo $_SESSION["ses_name"]." 님의 정보입니다.<br><br>";
        echo "아이디 : " .$_SESSION["ses_id"]."<br>";
        echo "비밀번호 : " .$_SESSION["ses_pw"]."<br>";
        ?>
<form action="rent_inf.php" method="POST">
  <p><input type="submit" value = "나의 도서 대여 정보"></p>
</form>  
 <form action="wait_inf.php" method="POST">
  <p><input type="submit" value = "나의 도서 예약 정보"></p>
</form>         
 <form action="reserve_inf.php" method="POST">
  <p><input type="submit" value = "나의 스터디룸 예약 정보"></p>
</form>          
<form action="login_main.php" method="POST">
  <p><input type="submit" value = "메인 페이지로 돌아가기"></p>
</form>
    </center>
</body>
</html>

 