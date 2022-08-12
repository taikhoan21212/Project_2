<!DOCTYPE html> <?php 
            include '../database/connect.php';
                
            $macv = $_GET['updatecv'];
            $sql = "select * from chucvu where MaCV='$macv';";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $Macv  = $row['MaCV'];
            $Tencv = $row['TenCV'];
            
            if(isset($_POST['update_sbm'])){
                $MacV = $_POST['MaCV'];
                $TencV = $_POST['TenCV'];

                $querry = " UPDATE `chucvu` SET `MaCV`='$MacV',`TenCV`='$TencV'  WHERE MaCV = '$macv'
                " ; 

                $result1 = mysqli_query($conn,$querry);;
                if($result1){
                    echo "<script type=\"text/javascript\">alert('Update thành công $macv')
                    window.location.replace('../dbtable/CV.php');</script>";
                }
                else
                {  echo "<script type=\"text/javascript\">alert('Update chưa thành công $macv')
                    window.location.replace('../dbtable/CV.php');</script>";
                }
            }
            
            {?>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="modal-body">
                <label for="ticket-quatity" class="modal-label">
                    <i class="i-manv"></i>
                    Mã Chức Vụ
                    <input id="ticket-quatity" type="text" class="modal-input" value = "<?php echo $Macv ?>" name ="MaCV">
                </label>
                <label for="" class="modal-label">
                    <i class="i-tnv"></i>
                    Tên Chức Vụ                     
                    <input type="text" class="modal-input"  name = "TenCV" value="<?php echo $Tencv ?>">
                </label>
                <button type= "submit" name ="update_sbm" >Xác nhận</button>
                <?php } ?>



</html>