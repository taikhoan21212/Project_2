<?php
if ((isset($_GET['id']) && !empty($_GET['id']))&&(isset($_GET['value']) && !empty($_GET['value']))) {
include "./assets/database/connect.php";
$id = $_GET['id'];
$tab = $_GET['value'];

if($tab == "nhanvien"){
  $sql = "DELETE FROM nhanvien WHERE nhanvien.MaNV = '$id'";
  $lk ="NV";
}elseif ($tab == "phongban"){
  $sql = "DELETE FROM phongban WHERE phongban.MaPB = '$id'";
  $lk ="PB";
}elseif ($tab == "luong"){
  $sql = "DELETE FROM luong WHERE luong.Maluong = '$id'";
  $lk ="Luong";
}elseif($tab == "chamcong"){
  $sql = "DELETE FROM bangchamcong WHERE bangchamcong.MaCC = '$id'";
  $lk ="BCC";
}elseif($tab == "chucvu"){$sql = "DELETE FROM chucvu WHERE chucvu.MaCV = '$id'";
  $lk ="CV";
}else {$sql = "DELETE FROM quanlytaikhoan WHERE quanlytaikhoan.MaNV = '$id'";
  $lk ="qltk";}
$result = mysqli_query($conn,$sql);
if(!$result){
  echo "<script type=\"text/javascript\">alert('Không thể xóa $id')
        window.location.replace('./assets/dbTable/$lk.php');</script>";
  }else {
    echo "<script type=\"text/javascript\">alert('Xóa thành công $id')
    window.location.replace('./assets/dbTable/$lk.php');</script>";
  }
}
?>
 