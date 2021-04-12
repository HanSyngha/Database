<html>
    <body>
    <center><br><br>
        <스터디룸 예약><br>
        예약을 원하시는 날짜를 선택해 주세요<br><br>
        <?php
        $now = date_create(date("y-m-d"));
        $date = date_create(date("y-m-d"));
        while(date_diff($now,$date)->format("%R%a")<5)
        {           
        ?>
            <form action="reserve_studyroom.php" method="POST">
                <input type='submit' name = 'date' value = '<?php echo $date->format("m-d") ?>'>
            </form>
        <?php
            date_add($date,date_interval_create_from_date_string("1 days"));
        }
        ?>
<form action="login_main.php" method="POST">
  <p><input type="submit" value = "메인 페이지로 돌아가기"></p>
</form>
    </center>
</body>
</html>

