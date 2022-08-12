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
                    <th>Maluong</th> 
                    <th>Thang</th> 
                    <th>LuongCB</th> 
                    <th>PCXang</th>
                    <th>PCAnTrua</th>
                    <th>PCKhac</th>
                    <th>BHYT</th>
                    <th>BHXH</th>
                    <th>MaThue</th>
                    <th ><em class="fa fa-cog"></em></th> 
                </tr> 
            </thead> 
                <tbody>
                    <?php
        session_start();
        include "../database/connect.php";
        $currentUser = $_SESSION['current_user'];
        include "../dbTable/checkLV.php";
        if($quyen == "a"){
            $sql = "select * from luong";
        }elseif($quyen =="c"){
            $ktMaluong1 = mysqli_query($conn, "SELECT * FROM nhanvien WHERE MaNV = '$khoa';");
             $ktMaluong2 = mysqli_fetch_assoc($ktMaluong1);
           $luong = $ktMaluong2['MaLuong'];
            $sql = "select * from luong where '$luong'= Maluong;";
            }
                                    
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $maluong = $row["Maluong"];
            $thang = $row["Thang"];
            $luongcb = $row["LuongCB"];
            $pcxangp = $row["PCXang"];
            $pcantrua = $row["PCAnTrua"];
            $pckhac = $row["PCKhac"];
            $bhyt = $row["BHYT"];
            $bhxh = $row["BHXH"];
            $mathue = $row["MaThue"];
        ?>
            <tr>
                <td><?php echo $maluong ?></td>
                <td><?php echo $thang ?></td>
                <td><?php echo number_format($luongcb,2)?></td>
                <td><?php echo number_format($pcxangp,2) ?></td>
                <td><?php echo number_format($pcantrua,2) ?></td>
                <td><?php echo number_format($pckhac,2) ?></td>
                <td><?php echo number_format($bhyt,2) ?></td>
                <td><?php echo number_format($bhxh,2) ?></td>
                <td><?php echo $mathue ?></td>
                <td align="center"><a class="btn btn-default" href = "../add/editluong.php?updateluong=<?=$maluong?>"
><em class="fa fa-pencil"></em></a> <a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
                
            </tr>
        <?php
        }
        ?>
        <?php mysqli_close($conn); ?>
            </tbody>
            <button type="button" class="btn btn-sm btn-primary btn-create js-btn-create">Thêm Lương</button>
        </table>
    </div>

    <?php 
    include "../database/connect.php";
            if (isset($_POST['sbm'])) {
             
                    $maLuong = $_POST["Maluong"];
                    $Thang = $_POST["thang"];
                    $Luongcb = $_POST["LuongCB"];
                    $Pcxang = $_POST["PCXang"];
                    $Pcantrua = $_POST["PCAnTrua"];
                    $Pckhac = $_POST["PCKhac"];
                    $Bhyt = $_POST["BHYT"];
                    $Bhxh = $_POST["BHXH"];
                    $Mathue = $_POST["MaThue"];
                // Thêm bản ghi vào cơ sở dữ liệu
                $sql1 = "INSERT INTO `luong`(`Maluong`, `Thang`, `LuongCB`, `PCXang`, `PCAnTrua`, `PCKhac`, `BHYT`, `BHXH`, `MaThue`) VALUES 
                ('$maLuong','$Thang','$Luongcb','$Pcxang','$Pcantrua','$Pckhac','$Bhyt','$Bhxh','$Mathue' )";
                               if( $result1 = mysqli_query($conn,$sql1)) {
                                echo "them thanh cong <br>"; 
                }} else "them that bai";
            ?> 

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
                    <i class="i-ml"></i>
                    Mã lương
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="Maluong">
                </label>

                <label for="ticket-quatity" class="modal-label">
                        <i class="i-gt">Tháng</i>
                <select class="modal-input-ns" name="thang" required >

                        <option value="">--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        </select>                </label>
                </label>
                <label for="ticket-email" class="modal-label">
                    <i class="i-mt"></i>
                    Lương CB
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="LuongCB">
                </label>
                <label for="ticket-email" class="modal-label">
                    <i class="i-lcb"></i>
                    Phụ Cấp Xăng
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="PCXang">
                </label>
                <label for="ticket-email" class="modal-label">
                    <i class="i-ml"></i>
                    Phụ Cấp Ăn Trưa
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="PCAnTrua">
                </label>
                <label for="ticket-email" class="modal-label">
                    <i class="i-ml"></i>
                    Phụ Cấp Khác
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="PCKhac">
                </label>
                <label for="ticket-email" class="modal-label">
                    <i class="i-ml"></i>
                    Bảo hiểm y tế
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="BHYT">
                </label>
                <label for="ticket-email" class="modal-label">
                    <i class="i-bhxh"></i>
                    Bảo hiểm xã hội
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="BHXH">
                </label>

                <label for="ticket-email" class="modal-label">
                    <i class="i-bhyt"></i>
                    Mã Thuế
                    <input id="ticket-email" type="text" class="modal-input" placeholder="..." name="MaThue">
                </label>
                <button id="buy-ticket" type="submit" name="sbm" >Xác nhận
                    <i class="ti-check"></i>
                </button>
            </div>
            </form>
        </div>
    </div>

    <script src="../js/main.js"></script> 
</body>
</html>