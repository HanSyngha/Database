<html>
    <body>
    <center><br><br>
        <b><b>원하시는 시간을 선택해 주세요 </b></b>( 1회 예약시 사용시간은 1시간 입니다 ) <br><br>
<?php
$value=$_POST['date'];
$conn = mysqli_connect(
  'localhost',
  'root',
  '123456',
  'skku_library');
$sql = "SELECT rid,name FROM studyroom;";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
    echo("<b>< ".$row[1]." ></b><br><br>");
    $sql2 = "SELECT time FROM reserve WHERE rid = '".$row[0]."' AND date ='".$value."';";
    $cur_time = date_create("11:00");
    for ($x = 0; $x <= 7; $x++)
    {
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_array($result2))
        {
           if(date_create($row2[0]) == $cur_time)
           {
               echo $cur_time->format("H:i")."시는 이미 예약되었습니다 <br><br>";
               date_add($cur_time,date_interval_create_from_date_string("1 HOUR"));
               continue;
           }
        }
         ?>
            <form action="reserve_studyroom_mysql.php" method="POST">
                <?php echo '<input type="hidden" name="date" value="'.$value.'">';
                echo '<input type="hidden" name="rid" value="'.$row[0].'">';?>
                <input type='submit' name = 'time' value = '<?php echo($cur_time->format("H:i")) ?>'>
            </form>
        <?php
        date_add($cur_time,date_interval_create_from_date_string("1 HOUR"));
    }
}


?>
    </center>
</body>
</html>