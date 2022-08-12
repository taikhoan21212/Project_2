
<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlns');
mysqli_set_charset($conn, 'UTF8');
if(mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}
?>