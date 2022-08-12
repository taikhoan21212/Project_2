<!DOCTYPE html> <?php 
            include '../database/connect.php';
                
            $maluong = $_GET['updateluong'];
            $sql = "select * from luong where Maluong='$maluong';";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $Thang  = $row['Thang'];
            $LuongCb = $row['LuongCB'];
            $PCXang	  = $row['PCXang'];
            $PCAnTrua = $row['PCAnTrua'];
            $PCKhac  = $row['PCKhac'];
            $BHYT = $row['BHYT'];
            $BHXH = $row['BHXH'];
            $arr = array("1","2","3","4","5","6","7","8","9","10","11","12");
            
            if(isset($_POST['update_sbm'])){
            $thang  = $_POST['Thang'];
            $luongCb = $_POST['LuongCB'];
            $pCXang	  = $_POST['PCXang'];
            $pCAnTrua = $_POST['PCAnTrua'];
            $pCKhac  = $_POST['PCKhac'];
            $bHYT = $_POST['BHYT'];
            $bHXH = $_POST['BHXH'];

                $querry = " UPDATE `luong` SET 
                `thang`='$thang',
                `LuongCB`='$luongCb',
                `PCXang`='$pCXang	',
                `PCAnTrua`='$pCAnTrua',
                `PCKhac`=' $pCKhac',
                `BHYT`='$bHYT',
                `BHXH`='$bHXH' 
                WHERE Maluong='$maluong'
                " ; 

                $result1 = mysqli_query($conn,$querry);;
                if($result1){
                    echo "<script type=\"text/javascript\">alert('Update thành công $maluong')
    window.location.replace('../dbtable/Luong.php');</script>";
                }
                else
                {$_SESSION['message'] = "UPDATE CHUA THANH CONG";
                    echo "<script type=\"text/javascript\">alert('Update Chưa thành công $maluong')
    window.location.replace('../dbtable/Luong.php');</script>";
                } 
            }
            
            {?>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="modal-body">
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Tháng
                    <select name ="Thang" class="modal-input-ns" >
                        
                    <option value='$Thang'><?php echo $Thang ?></option>
                        <?php foreach($arr as $key => $value) {?>
                        <option value="<?=$value; ?>"> <?=$value?> </option>
                        <?php } ?>
                    </select>
                    <!-- <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $Thang ?>" name ="Thang"> -->
                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Lương Cơ Bản
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $LuongCb ?>" name ="LuongCB">
                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Phụ Cấp Xăng
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $PCXang ?>" name ="PCXang">
                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Phụ Cấp Ăn Trưa
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $PCAnTrua ?>" name ="PCAnTrua">
                </label>
                <label for="" class="modal-label">
                    <i class="i-tnv"></i>
                    Phụ Cấp Khác                     
                    <input type="text" class="modal-input"  name = "PCKhac" value="<?php echo $PCKhac ?>">
                    <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Bảo Hiểm Y Tế
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $BHYT ?>" name ="BHYT">
                </label>
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Bảo hiểm Xã hội
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $BHXH ?>" name ="BHXH">
                </label>
                </label>
                <button type= "submit" name ="update_sbm" >Xác nhận</button>
                <?php } ?>



</html>