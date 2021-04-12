<?php
$id=$_POST['Id'];
$pw=$_POST['Password'];
if($id==NULL || $pw==NULL)
{
    echo("<script>location.replace('login_NULL_input.php');</script>");
}
$conn = mysqli_connect('localhost','root','123456','skku_library');
$sql="SELECT * from Register WHERE id = '$id' AND password = '$pw'";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION["ses_id"] = $id;
    $_SESSION["ses_pw"] = $pw;
    $_SESSION["ses_name"] = $row['name'];
    $_SESSION["ses_lid"] = $row['lid'];
    echo("<script>location.replace('login_main.php');</script>");
}
else
{
    echo("<script>location.replace('unexsisting_id.php');</script>");
}
?>

