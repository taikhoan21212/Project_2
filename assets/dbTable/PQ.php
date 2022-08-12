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
                    <th>MaCC</th> 
                    <th>MaNV</th> 
                    <th>NgayLam</th> 
                    <th>NgayNghiCP</th>
                    <th>NgayNghiKP</th>
                    <th><em class="fa fa-cog"></em></th> 
                </tr> 
            </thead> 
                <tbody>
                <?php
        include "../database/connect.php";
        $sql = "select * from bangchamcong";
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
                <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a> <a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
            </tr>
        <?php
        }
        ?>
        <?php mysqli_close($conn); ?>
            </tbody>
            <button type="button" class="btn btn-sm btn-primary btn-create js-btn-create">Thêm nhân viên</button>
        </table> 
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

            <div class="modal-body">
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-mancc"></i>
                    Mã chấm công
                    <input id="ticket-quatity" type="text" class="modal-input" placeholder="...">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-mnv"></i>
                    Mã nhân viên
                    <input id="ticket-email" type="email" class="modal-input" placeholder="...">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-ngl"></i>
                    Ngày làm
                    <input id="ticket-email" type="email" class="modal-input" placeholder="...">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-nncp"></i>
                    Ngày nghỉ có phép
                    <input id="ticket-email" type="email" class="modal-input" placeholder="...">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-nnkp"></i>
                    Ngày nghỉ không phép
                    <input id="ticket-email" type="email" class="modal-input" placeholder="...">
                </label>

                <button id="buy-ticket">Xác nhận
                    <i class="ti-check"></i>
                </button>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>