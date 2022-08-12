<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<section>
            <div class="img-bg">
                <img src="./assets/img/bia_1.png" alt="Hình Ảnh Minh Họa">
            </div>
            <div class="noi-dung">
                <div class="form">
    <?php
        session_start();
        include "./assets/database/connect.php";
        $error =false;
        if(isset($_POST['useName'])&& !empty($_POST['useName'])&& isset($_POST['passWord']) && !empty($_POST['passWord'])){
            $uName = $_POST['useName'];
            $pWord = $_POST['passWord'];
            $result = mysqli_query($conn,"SELECT MaNV, Usename, Password FROM quanlytaikhoan WHERE (Usename ='$uName' AND Password = md5('$pWord'))");
            if(!$result){
                $error = mysqli_error($conn);
            }else{
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user']= $user;
            }
            mysqli_close($conn);
            if($error !== false || $result -> num_rows == 0){
                ?>
                    <div id = "login_notify" class="box_content">
                    <h1>Thông báo</h1>
                    <h4><?= !empty($error) ?$error:"Thông báo đăng nhập không chính xác"?></h4>
                    <a href="./login.php">Quay lại</a>
                </div>
                <?php exit;
            }?>
                    <?php } 
        if(empty($_SESSION['current_user'])){?>
            <div id ="user_login" class="box-content">
            <h2>Trang Đăng Nhập</h2>
                    <form action="./login.php" method="POST">
                        <div class="input-form">
                            <span>Tên Người Dùng</span>
                            <input type="text" name="useName" id="">
                        </div>
                        <div class="input-form">
                            <span>Mật Khẩu</span>
                            <input type="password" name="passWord" id="">
                        </div><br>
                        <div class="input-form mess">
                            <input type="submit" value="Đăng Nhập" >
                        </div>
                        <div class="input-form">
                        </div>
                    </form>
            </div>
            <?php }else{
                $currentUser = $_SESSION['current_user'];
                ?>
                <div id="login-notify" class="box-content">
                    <?php 
                    if ($currentUser) {
                        echo"Xin chào $currentUser<br>";
                        header("Location: ./index.php");
                        exit;
                    }?>
                </div>
                <?php } ?>
                </div>
            </div>
        </section>
</body>
</html>