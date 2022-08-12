<!DOCTYPE html> <?php 
            include '../database/connect.php';
                
            $mapb = $_GET['updatepb'];
            $sql = "select * from phongban where MaPB='$mapb';";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $mapb  = $row['MaPB'];
            $tenpb = $row['TenPB'];
            
            if(isset($_POST['update_sbm'])){
                $MaPb = $_POST['MaPB'];
                $TenPB = $_POST['TenPB'];

                $querry = " UPDATE `phongban` SET `MaPB`='$MaPb',`TenPB`='$TenPB'  WHERE MaPB = '$mapb'
                " ; 

                $result1 = mysqli_query($conn,$querry);;
                if($result1){
                    echo "<script type=\"text/javascript\">alert('Update thành công $mapb')
                    window.location.replace('../dbtable/BCC.php');</script>";
                }
                else
                { echo "<script type=\"text/javascript\">alert('Update chưa thành công $mapb')
                    window.location.replace('../dbtable/BCC.php');</script>";
                }
            }
            
            {?>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="modal-body">
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Mã phòng ban
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $mapb ?>" name ="MaPB">
                </label>
                <label for="" class="modal-label">
                    <i class="i-tnv"></i>
                    Tên phòng ban                      
                    <input type="text" class="modal-input"  name = "TenPB" value="<?php echo $tenpb ?>">
                </label>
                <button type= "submit" name ="update_sbm" >Xác nhận</button>
                <?php } ?>



</html>