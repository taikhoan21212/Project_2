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
    <table class="table table-striped table-bordered table-list" name="main">
        <?php
        include "../database/connect.php";
        if (isset($_REQUEST['ok'])) {
            $search = addslashes($_GET['search']);
            if (empty($search)) {
                echo "<h1 style = 'text-align:center;'>Yêu cầu nhập dữ liệu vào ô trống</h1>";
            } else{
                $selected = $_GET['seltab'];
                if ($selected == 'chucvu') {
                $query = "select * from $selected where MaCV like '%$search%' or TenCV like '%$search%'";
                $sql = mysqli_query($conn,$query);
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search != ""){
                    ?>
                <thead>
                    <tr>
                        <th>MaCV</th>
                        <th>TenCV</th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $row["MaCV"] ?></td>
                        <td><?php echo $row["TenCV"] ?></td>
                        <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a> <a
                        class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
                    </tr>
                    <?php
                }} elseif($num <= 0) {
                    echo "<h1 style = 'text-align:center;'>Không tìm thấy kết quả '$search'</h1>";
                }}
                elseif($selected == 'nhanvien'){
                $query = "select * from $selected where MaNV like '%$search%' 
                                                    or TenNV like N'%$search%'
                                                    or GioiTinh like N'%$search%'
                                                    or Namsinh like '%$search%'
                                                    or DCTT like N'%$search%'
                                                    or MaPB like '%$search%'
                                                    or MaCV like '%$search%'
                                                    or MaCC like '%$search%'
                                                    or MaLuong like '%$search%'
                                                    or GhiChu like N'%$search%'";

                $sql = mysqli_query($conn,$query);
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search != ""){
                    ?>
                    <thead>
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
                    <th><em class="fa fa-cog"></em></th> 
                </tr> 
        </thead>
        <tbody>
            <?php
                while ($row = mysqli_fetch_assoc($sql)) {
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
                <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a> <a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
                
            </tr>
            <?php
                }
            } elseif($num <= 0) {
                echo "<h1 style = 'text-align:center;'>Không tìm thấy kết quả '$search'</h1>";
            }} 
            elseif($selected == 'phongban'){
                $query = "select * from $selected where MaPB like '%$search%' 
                                                    or TenPB like N'%$search%'";
                $sql = mysqli_query($conn,$query);
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search != ""){
                    ?>
        <thead>
            <tr> 
                <th>MaPB</th> 
                <th>TenPB</th>
                <th><em class="fa fa-cog"></em></th> 
            </tr> 
        </thead>
        <tbody>
            <?php
                while ($row = mysqli_fetch_assoc($sql)) {
                    $mapb = $row["MaPB"];
                    $tenpb = $row["TenPB"];
                    ?>
            <tr>
                <td><?php echo $mapb ?></td>
                <td><?php echo $tenpb ?></td>
                <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a> <a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
            </tr>
            <?php
                }
            } elseif($num <= 0) {
                echo "<h1 style = 'text-align:center;'>Không tìm thấy kết quả '$search'</h1>";
            }
            } elseif($selected == 'luong'){
                ?>
        
            <?php
                $query = "select * from $selected where Maluong like '%$search%' 
                or Thang like '%$search%'
                or LuongCB like '%$search%'
                or PCXang like '%$search%'
                or PCAnTrua like '%$search%'
                or PCKhac like '%$search%'
                or BHYT like '%$search%'
                or BHXH like '%$search%'
                or MaThue like '%$search%'";


                $sql = mysqli_query($conn,$query);
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search != ""){
                    ?>
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
                <th><em class="fa fa-cog"></em></th>
            </tr>  
        </thead>
        <tbody><?php
                while ($row = mysqli_fetch_assoc($sql)) {
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
                <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a> <a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>
                
            </tr>
            <?php
                }
            } elseif($num <= 0) {
                echo "<h1 style = 'text-align:center;'>Không tìm thấy kết quả '$search'</h1>";
            }
            }
            else{
                $query = "select * from $selected where MaCC like '%$search%' 
                                                    or MaNV like '%$search%'
                                                    or NgayLam like '%$search%'
                                                    or NgayNghiCP like '%$search%'
                                                    or NgayNghiKP like '%$search%'";
                $sql = mysqli_query($conn,$query);
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search != ""){
                    ?>
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
                while ($row = mysqli_fetch_assoc($sql)) {
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
            } elseif($num <= 0) {
                echo "<h1 style = 'text-align:center;'>Không tìm thấy kết quả '$search'</h1>";
            }
            } 
            echo '</table>';       
    ?>
            <?php
        }}
        ?>
            <?php mysqli_close($conn); ?>
        </tbody>
    </table>
</body>
</html>