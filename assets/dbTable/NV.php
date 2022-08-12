<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <div class="panel-tbody">
        <table class="table table-striped table-bordered table-list"> 
            <thead>
            <?php
        session_start();
        include "../database/connect.php";
        $currentUser = $_SESSION['current_user'];
        include "../dbTable/checkLV.php";
        if($quyen == "a"){
            $sql = "select * from nhanvien;";
        }
        else if ($quyen == "c"){
            $sql = "select * from nhanvien where MaNV = '$khoa';";
            }
            ?> 
                <tr> 
                    <th class="hidden-xs">MaNV</th> 
                    <th>TenNV</th> 
                    <th>GioiTinh</th> 
                    <th>NamSinh</th> 
                    <th>DCTT</th>
                    <th>CMT</th>
                    <th>MaPB</th>
                    <th>MaCV</th>
                    <th>MaCC</th>
                    <th>MaLuong</th>
                    <th>GhiChu</th>
                    <?php if($quyen == "a"){?>
                    <th><em class="fa fa-cog"></em></th> <?php } ?>
                </tr> 
                </thead> 
                <tbody>
                
    <?php
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            $manv = $row["MaNV"];
            $tennv = $row["TenNV"];
            $gioitinh = $row["GioiTinh"];
            $namsinh = $row["Namsinh"];
            $dctt = $row["DCTT"];
            $cmt = $row["CMT"];
            $mapb = $row["MaPB"];
            $macv = $row["MaCV"];
            $macc = $row["MaCC"];
            $maluong = $row["MaLuong"];
            $ghichu = $row["GhiChu"];
        ?>
            <tr>
                <td><?php echo $manv ?></td>
                <td><?php echo $tennv ?></td>
                <td><?php echo $gioitinh ?></td>
                <td><?php echo $namsinh ?></td>
                <td><?php echo $dctt ?></td>
                <td><?php echo $cmt ?></td>
                <td><?php echo $mapb ?></td>
                <td><?php echo $macv ?></td>
                <td><?php echo $macc ?></td>
                <td><?php echo $maluong ?></td>
                <td><?php echo $ghichu ?></td>
                <?php if($quyen == "a"){?>
                <td align="center">
                    <button class="btn btn-default"><a class="fa fa-pencil" href="../add/editnv.php?updatenv=<?=$manv?>"></a></button> <a class="btn btn-danger"
                    onclick="reply_click(this.getAttribute('id'), this.getAttribute('data-value'))" id = "<?php echo $manv ?>" data-value="nhanvien"><em class="fa fa-trash"></em></a></td>
                    <?php } ?>
            </tr>
        <?php
        }
        ?>
        <?php mysqli_close($conn); ?>
            </tbody>
            <button type="button" class="btn btn-sm btn-primary btn-create js-btn-create">Thêm nhân viên</button>
        </table> 
    </div> 


    <?php 
    include "../database/connect.php";
            if (isset($_POST['sbm'])) {
                if(isset($_POST['Tennv']) && !empty($_POST['Tennv'])){
                $ten = $_POST['Tennv'];
                $gioitinh = $_POST['GioiTinh'];
                $namsinh = $_POST['Namsinh'];
                $dctt = $_POST['DCTT'];
                $cmt = $_POST['CMT'];
                // Thêm bản ghi vào cơ sở dữ liệu
                //$sql = "CALL taoma('Ngô Minh Quân','Nam','19/7/2002','Long An','1234567');";
                $sql1 = "CALL taoma('$ten','$gioitinh','$namsinh','$dctt','$cmt');";
                               if( $result1 = mysqli_query($conn,$sql1)) {
                                echo "them thanh cong <br>"; 
                }}} else "them that bai";
            ?>
    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

           
           
                
            <form method="POST" autocomplete="off" name="sbm">
            <header class="modal-header">
                <i class="ti-bag"></i>
                Thêm thông tin
            </header>

            <div class="modal-body">
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-tnv"> Tên nhân viên
</i>
                    <input id="ticket-quatity" type="text" class="modal-input" placeholder="..." name="Tennv" required>
                </label>
                <label for="ticket-quatity" class="modal-label">
                        <i class="i-gt">Giới tính</i>

                        <select name="GioiTinh" class="modal-input-ns" name="GioiTinh" required >
                        <option value="">--</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                        </select>                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-ns"></i>
                    Năm sinh
                    <input id="ticket-quatity" type="date" class="modal-input-ns" placeholder="..." name="Namsinh"required>
                </label>

                <label for="ticket-quatity" class="modal-label">
                    <i class="i-dtcc">DCTT</i>
                    <input id="ticket-quatity" type="text" class="modal-input-dtcc" placeholder="..." name="DCTT"required>
                </label>

                <label for="ticket-quatity" class="modal-label">
                    <i class="i-cmt"></i>
                    Chứng minh thư
                    <input id="ticket-quatity" type="text" class="modal-input-cmt" placeholder="..." name="CMT"required>
                </label>

                <button id="buy-ticket-nv" type="submit" name="sbm" >Xác nhận
                    <i class="fa-solid fa-check"></i> 
            </button>

            </div>
           </form>
        </div>
    </div>
    <script src="../js/main.js"></script>
    
    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

           
            <form method="POST" autocomplete="off" >
            <header class="modal-header">
                <i class="ti-bag"></i>
                Thêm thông tin
            </header>

            <div class="modal-body">
            <label for="ticket-quatity" class="modal-label">
                    <i class="i-tnv"> Tên nhân viên
</i>
                    <input id="ticket-quatity" type="text" class="modal-input" placeholder="..." name="Tennv" required>
                </label>
                <label for="ticket-quatity" class="modal-label">
                        <i class="i-gt">Giới tính</i>

                        <select name="GioiTinh" class="modal-input-ns" name="GioiTinh" required >
                        <option value="">--</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                        </select>                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-ns"></i>
                    Năm sinh
                    <input id="ticket-quatity" type="date" class="modal-input-ns" placeholder="..." name="Namsinh"required>
                </label>

                <label for="ticket-quatity" class="modal-label">
                    <i class="i-dtcc">DCTT</i>
                    <input id="ticket-quatity" type="text" class="modal-input-dtcc" placeholder="..." name="DCTT"required>
                </label>

                <label for="ticket-quatity" class="modal-label">
                    <i class="i-cmt"></i>
                    Chứng minh thư
                    <input id="ticket-quatity" type="text" class="modal-input-cmt" placeholder="..." name="CMT"required>
                </label>

                <button id="buy-ticket" type="submit" name="sbm" >Xác nhận
                    <i class="fa-solid fa-check"></i> 
                </button>   
            </div>
            </form>

        </div>
    </div>
    <script src="../js/edit.js"></script>
    <script src="../js/del.js"></script>
</body>
</html>