<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="../fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <header class="modal-header">
                <i class="ti-bag"></i>
                Thêm thông tin
            </header>
            
            <?php           
            include '../database/connect.php';
            $Manv = $_GET["updatenv"];
            $sql = "select * from nhanvien where MaNV='$Manv';";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
                $manv = $row["MaNV"];
                $tennv = $row["TenNV"];
                $gioitinh = $row["GioiTinh"];
                $namsinh = $row["Namsinh"];
                $dctt = $row["DCTT"];
                $cmt = $row["CMT"];
                $mapb = $row["MaPB"];
                $ghichu = $row["GhiChu"];
            $sql1 = "select MaPB from phongban";
            $result2 = mysqli_query($conn,$sql1);
            

            if(isset($_POST['update_sbm'])){
                $MaNV = $_POST["MaNV"];
                $TenNV = $_POST["Tennv"];
                $GioiTinh = $_POST["GioiTinh"];
                $Namsinh = $_POST["namsinh"];
                $DCTT = $_POST["DCTT"];
                $CMT = $_POST["CMT"];
                $MaPB = $_POST["MaPB"];
                $GhiChu = $_POST["GhiChu"];
                
                $query = "UPDATE `nhanvien` SET `MaNV`='$MaNV',
                `TenNV`='$TenNV',
                `GioiTinh`='$GioiTinh',
                `Namsinh`='$Namsinh',
                `DCTT`='$DCTT',
                `CMT`='$CMT',
                `MaPB`='$MaPB',
                `GhiChu`='$GhiChu' 
                WHERE 'MaNV' = '$Manv'"; 
                $result4 = mysqli_query($conn,$query);
                if($result4){
                    echo "<script type=\"text/javascript\">alert('Update thành công $Manv')
    window.location.replace('../dbTable/NV.php');</script>";
                }
                else
                { echo "<script type=\"text/javascript\">alert('Update không thành công $Manv')
                    window.location.replace('../dbTable/NV.php');</script>";
                }
             }
            
            {?>
            <form method="post" autocomplete="off" enctype="multipart/form-data">                
                <label for="" class="modal-label">
                    <i class="i-tnv">Mã nhân viên</i>
                    <input id="ticket-quatity" type="text" class="modal-input-ns" value="<?php echo $manv ?>" name='MaNV' required>
                </label>
                <label for="" class="modal-label">
                    <i class="i-tnv">Tên nhân viên</i>
                    <input id="ticket-quatity" type="text" class="modal-input-ns" value=" <?php echo $tennv ?> " name='Tennv' required>
                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-gt">Giới tính</i>
                    <select name="GioiTinh" class="modal-input-ns" name="GioiTinh" required>
                    <option value="<?= $gioitinh?>"> <?php echo $gioitinh?></option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                    </select>                </label>
                <label for="ticket-quatity" class="modal-label" ">
                    <i class="i-tnv">Năm Sinh</i>
                    <input id="ticket-quatity" type = "date" class="modal-input-ns" value='<?=  $namsinh ?>' name="namsinh" required >
                </label>
                <label for="ticket-quatity" class="modal-label" >
                    <i class="i-ns">DTCC</i>       
                    <input id="ticket-quatity" type = "text" class="modal-input-ns" value='<?php echo $dctt ?>' name="DCTT" required >
                </label>
                <label for="ticket-quatity" class="modal-label" >
                    <i class="i-cmt">Chứng minh thư</i>
                    <input id="ticket-quatity" type="text" class="modal-input-dtcc" value='<?php echo $cmt ?>' name="CMT" required>
            </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-gt">Mã Phòng Ban</i>
                    <select class="modal-input-ns" name="MaPB">
                        <option value='<?php $mapb ?>'><?php echo $mapb ?></option>
                        <?php foreach($result2 as $key => $value) {?>
                        <option value="<?=$value['MaPB']; ?>"> <?=$value['MaPB']?> </option>
                        <?php } ?>
                    </select>
                    <label for="ticket-quatity" class="modal-label" >
                    <i class="i-cmt">Ghi Chú</i>
                    <input id="ticket-quatity" type="text" class="modal-input-dtcc" value='<?php echo $ghichu ?>' name="GhiChu" >       
                        </label>
                <button id="buy-ticket" type="submit" name="update_sbm">
                        Xác Nhận
                    <?php } ?>
                </button>
                </form>
            </div>
    <script src="./js/main.js"></script>
</body>
</html>