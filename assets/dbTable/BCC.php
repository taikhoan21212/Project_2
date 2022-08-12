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
        $sql = "select * from bangchamcong";
    }else {
        $sql = "select * from bangchamcong where MaNV = '$khoa'";
    }?>
                <tr> 
                    <th>MaCC</th> 
                    <th>MaNV</th> 
                    <th>NgayLam</th> 
                    <th>NgayNghiCP</th>
                    <th>NgayNghiKP</th>
                    <?php if($quyen == "a"){?>
                    <th><em class="fa fa-cog"></em></th>  <?php}?>
               </tr> 
            </thead> 
                <tbody>
    <?php            
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $macc = $row["MaCC"];
            $manv = $row["MaNV"];
            $ngaylam = $row["NgayLam"];
            $ngaynghicp = $row["NgayNghiCP"];
            $ngaynghikp = $row["NgayNghiKP"];
        ?>
            <tr>
                <td><?php echo $macc ?></td>
                <td><?php echo $manv ?></td>
                <td><?php echo $ngaylam ?></td>
                <td><?php echo $ngaynghicp ?></td>
                <td><?php echo $ngaynghikp ?></td>
                <?php if($quyen == "a"){?>
                <td align="center"><a class="btn btn-default" href="../add/editbcc.php?updatecc=<?=$macc?>"><em class="fa fa-pencil"></em></a> 
                <a class="btn btn-danger" onclick="reply_click(this.getAttribute('id'), this.getAttribute('data-value'))" id = "<?php echo $macc ?>" data-value="chamcong"><em class="fa fa-trash"></em></a></td>
                <?php } ?></tr><?php } ?>
        
        
            </tbody>
            <button type="button" class="btn btn-sm btn-primary btn-create js-btn-create">Thêm Chấm Công</button>
        </table>
    </div>
    <?php 
            include '../database/connect.php';
            if (isset($_POST['sbm']) ) {
                $macc = $_POST['MaCC'];
                $manv = $_POST['MaNV'];
                $nl = $_POST['Ngaylam'];
                $nncp = $_POST['NgayNghiCP'];
                $nnkp = $_POST['NgayNghiKP'];

                // Thêm bản ghi vào cơ sở dữ liệu
                $sql1 = "INSERT INTO `bangchamcong`(`MaCC`, `MaNV`, `NgayLam`, `NgayNghiCP`, `NgayNghiKP`) VALUES
                 ('$macc','$manv','$nl','$nncp','$nnkp');";
                                $result1 = mysqli_query($conn,$sql1 );

            }
            ?>
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
                    <i class="i-mancc"></i>
                    Mã chấm công
                    <input id="ticket-quatity" type="text" class="modal-input" placeholder="..." name="MaCC">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-mnv"></i>
                    Mã nhân viên
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="MaNV">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-ngl"></i>
                    Ngày làm
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="Ngaylam">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-nncp"></i>
                    Ngày nghỉ có phép
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="NgayNghiCP">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-nnkp"></i>
                    Ngày nghỉ không phép
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="NgayNghiKP">
                </label>

                <button id="buy-ticket-nv" type="submit" name="sbm" >Xác nhận
                    <i class="ti-check"></i>
                </button>
            </div>
                        </form>
        </div>
        <?php mysqli_close($conn); ?>
        <?php
        }
        ?>
    </div>
    <script src="../js/main.js"></script>
    <script src="../js/del.js"></script>
</body>
</html>