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
                <tr> 
                    <th>MaPB</th> 
                    <th>TenPB</th>
                    <th><em class="fa fa-cog"></em></th> 
                </tr> 
            </thead> 
                <tbody>
                <?php
        session_start();
        include "../database/connect.php";
        $currentUser = $_SESSION['current_user'];
        include "../dbTable/checkLV.php";
        if($quyen == "a"){
            $sql = "select * from phongban;";}
        elseif($quyen =="c"){
                    $ktMapb1 = mysqli_query($conn, "SELECT * FROM nhanvien WHERE MaNV = '$khoa';");
                    $ktMapb2 = mysqli_fetch_assoc($ktMapb1);
            $mapb = $ktMapb2['MaPB'];
            $sql = "select * from phongban where '$mapb'= MaPB;";
            }
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $mapb = $row["MaPB"];
            $tenpb = $row["TenPB"];
        ?>
            <tr>
                <td><?php echo $mapb ?></td>
                <td><?php echo $tenpb ?></td>
                <td align="center"><a class="btn btn-default" href=" ../add/editpb.php?updatepb=<?=$mapb?>"><em class="fa fa-pencil"></em></a> <a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
            </tr>
        <?php
        }
        ?>
        <?php mysqli_close($conn); ?> 
            </tbody>
            <button type="button" class="btn btn-sm btn-primary btn-create js-btn-create">Thêm PB</button>
        </table> 
    </div>
    <?php 
            include '../database/connect.php';
            if (isset($_POST['sbm']) ) {
                $mapb = $_POST['MaPB'];
                $tenpb = $_POST['TenPB'];
                // Thêm bản ghi vào cơ sở dữ liệu
                $sql1 = "INSERT into phongban( MaPB ,TenPB ) Values ('$mapb','$tenpb');";
                                $result1 = mysqli_query($conn,$sql1 );

            }
            ?>
    </div>

                     <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <header class="modal-header">
                <i class="ti-bag"></i>
                Thêm thông tin
            </header>
            <form method="POST" autocomplete="off">
            <div class="modal-body">
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Mã phòng ban
                    <input id="ticket-quatity" type="text" class="modal-input" placeholder="..." name="MaPB" required>
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-tnv"></i>
                    Tên phòng ban
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="TenPB" required>
                </label>

                <button id="btn-check" type="submit" name="sbm" >
                    <i class="ti-check">Xác nhận</i>
                </button>
            </div>
            </form>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>