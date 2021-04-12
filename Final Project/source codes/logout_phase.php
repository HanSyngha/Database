<?php
session_start();
unset( $_SESSION['ses_id']);
unset( $_SESSION['ses_pw']);
unset( $_SESSION['ses_name']);
session_destroy();
echo("<script>location.replace('index.php');</script>");
?>