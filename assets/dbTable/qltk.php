<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    
    <table class="table table-striped table-bordered table-list"> 
        <thead>
        <?php
        session_start();
        include "../database/connect.php";
        $currentUser = $_SESSION['current_user'];
        include "../dbTable/checkLV.php";
        $sql = "SELECT * FROM quanlytaikhoan;";
        ?>
            <tr>  
                <th>MaNV</th> 
                <th>Username</th>
                <th>Pass</th>
                <th>Quyền hạn</th>
                <th><em class="fa fa-cog"></em></th>
            </tr> 
        </thead> 
            <tbody>
            <?php
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $manv = $row["MaNV"];
            $Username = $row["Usename"];
            $pass = $row["Password"];
            $quyen = $row["Quyenhan"];
        ?> 
            <tr>
                <td><?php echo $manv ?></td>
                <td><?php echo $Username ?></td>
                <td><?php echo $pass ?></td>
                <td><?php echo $quyen ?></td>
                <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a> 
                <a class="btn btn-danger" onclick="reply_click(this.getAttribute('id'), this.getAttribute('data-value'))" id = "<?php echo $manv ?>" data-value="quanlytaikhoan" ><em class="fa fa-trash"></em></a></td>
            </tr>
        <?php
        }
        ?>
        <?php mysqli_close($conn); ?>
        </tbody>
        
    </table>
    <button type="button" class="btn btn-sm btn-primary btn-create js-btn-create" >Thêm mới</button>
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
            <form action="CV.php" method="POST">
                        <div class="input-form">
                            <span>MaNV</span>
                            <input type="text" name="manv" id="">
                        </div>
                        <div class="input-form">
                            <span>TenCV</span>
                            <input type="text" name="tencv" id="">
                        </div><br>
                        <div class="input-form">
                            <input type="submit" value="Thêm" >
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <script src="../../js/add.js"></script>
    <script src="../../js/del.js"></script>
</body>
</html>