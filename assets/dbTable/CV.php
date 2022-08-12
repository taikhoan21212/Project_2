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
                    <th>MaCV</th> 
                    <th>TenCV</th> 
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
                                    $sql = "select * from chucvu";
                            }else {                    $ktCV1 = mysqli_query($conn, "SELECT * FROM nhanvien WHERE MaNV = '$khoa';");
                                $ktCV2 = mysqli_fetch_assoc($ktCV1);
                                $cV = $ktCV2['MaCV'];
                                $sql = "SELECT * FROM chucvu where '$cV'= MaCV";}
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $macv = $row["MaCV"];
                    $tencv = $row["TenCV"];
                ?>
            <tr>
                <td><?php echo $macv ?></td>
                <td><?php echo $tencv ?></td>
                <td align="center"><a class="btn btn-default" href="../add/editcv.php?updatecv=<?=$macv?>"><em class="fa fa-pencil"></em></a> <a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
            </tr>
        <?php
        }
        ?>
        <?php mysqli_close($conn); ?>
            </tbody>
            <button type="button" class="btn btn-sm btn-primary btn-create js-btn-create">Thêm CHUCVU</button>
        </table>
    </div><?php
    include '../database/connect.php';
            if (isset($_POST['sbm']) ) {
                $macv = $_POST['MaCV'];
                $tencv = $_POST['TenCV'];
                // Thêm bản ghi vào cơ sở dữ liệu
                $sql1 = "INSERT into chucvu( MaCV ,TenCV ) Values ('$macv','$tencv');";
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
                <label for="ticket-email" class="modal-label">
                    <i class="i-mcv"></i>
                    Mã chức vụ
                    <input id="ticket-email" type="Text" class="modal-input" placeholder="..." name="MaCV">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-tcv"></i>
                    Tên chức vụ
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="TenCV">
                </label>

                <button id="btn-check" type="submit" name="sbm">Xác nhận
                    <i class="ti-check"></i>
                </button>
            </div>
        </form>
        </div>

    </div>
    
    <script src="../js/main.js"></script>
</body>
</html>