<!DOCTYPE html> <?php 
            include '../database/connect.php';
                
            $macc = $_GET['updatecc'];
            $sql = "select * from bangchamcong where MaCC='$macc';";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $Ngaylam  = $row['NgayLam'];
            $Ngaynghicp = $row['NgayNghiCP'];
            $Ngaynghikp = $row['NgayNghiKP'];
            if(isset($_POST['update_sbm'])){
                $ngaylam = $_POST['Ngaylam'];
                $ngaynghicp = $_POST['NgayNghicp'];
                $ngaynghikp = $_POST['NgayNghikp'];
                $querry = " UPDATE `bangchamcong` SET `NgayLam`='$ngaylam',
                `NgayNghiCP`='$ngaynghicp',
                `NgayNghiKP`='$ngaynghikp'
                 WHERE MaCC='$macc'
                "; 

                $result1 = mysqli_query($conn,$querry);
                if($result1){
                    echo "<script type=\"text/javascript\">alert('Update thành công $macc')
                    window.location.replace('../dbtable/BCC.php');</script>";
                }
                else
                {   echo "<script type=\"text/javascript\">alert('Update chưa thành công $macc')
                    window.location.replace('../dbtable/BCC.php');</script>";
                
                }
            }
            
            {?>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="modal-body">
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Ngày Làm
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $Ngaylam ?>" name ="Ngaylam">
                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Ngày Nghỉ Có Phép
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $Ngaynghicp ?>" name ="NgayNghicp">
                </label>
                <label for="" class="modal-label">
                    <i class="i-tnv"></i>
                    Ngày Nghỉ Không Phép
                    <input type="text" class="modal-input"  name = "NgayNghikp" value="<?php echo $Ngaynghikp ?>">
                </label>
                <button type= "submit" name ="update_sbm" >Xác nhận</button>
                <?php } ?>



</html>