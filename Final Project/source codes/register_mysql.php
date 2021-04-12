<?php
$id=$_POST['Id'];
$pw=$_POST['Password'];
$name=$_POST['name'];
if($id==NULL || $pw==NULL || $name==NULL)
{
    echo("<script>location.replace('NULL_input.php');</script>");
}
$conn = mysqli_connect('localhost','root','123456','skku_library');
$sql="SELECT * from Register WHERE id = '$id'";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
    echo("<script>location.replace('exsisting_id.php');</script>");
}
else
{
    $sql="INSERT INTO register (id,password,name) VALUES ('$id','$pw','$name')";
    $result2 = $conn->query($sql);
    if($result2)
    {
        echo("<script>location.replace('register_complete.php');</script>");
    }
}
?>

