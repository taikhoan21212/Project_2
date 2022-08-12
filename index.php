<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân sự</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <?php
        session_start();
        include "./assets/database/connect.php";
        $currentUser = $_SESSION['current_user'];
        include "./assets/dbtable/checkLV.php";
        if($currentUser['Usename'] == ''){header("Location: ./login.php");}else{
        ?>
    <id id ="main">
        <div id ="header">
            <div class="header__nav">
                <ul class="nav_logo">
                    <li><a href="./index.php">Admin LOGO</a></li>
                </ul>
                <ul class="nav_icon">
                    <li class="header__notify--has-notify">
                        <i class="fa-solid fa-bell opa">
                        <a>Thông báo</a></i>    
                    </li>
                    <div class="header__notify">
                        <header class="header__notify-header">
                            <h3>Thông báo mới nhận</h3>
                        </header>
                        <ul class="header__notify-list">
                            <li class="header__notify-item">
                                <a href="" class="header__notify-link">
                                    <div class="header__notify-info">
                                        <span class="header__notify-name">Hop bo phan marketing</span>
                                        <span class="header__notify-descriotion">At 9:30 p.m</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </ul>
                        
                <ul class="nav_bracket">     
                    <li><i class="fa-solid fa-arrow-right-from-bracket">
                        <a href="./logout.php">Đăng xuất</a></i>
                    </li>
                </ul>
            </div>    
        </div>

        <div class="slider">
            <div class="slider__nav">
                <div class="silder__nav_bar sett">
                    <ul class="nav_bar" id="menu">
                        <li><h3 href=""><img src="./assets/img/blank-profile-picture-973460__340.webp" alt=""><?php printf($currentUser['Usename'])?></h3></li>
                        <li><a class="men active" href="./assets/dbTable/NV.php" name="mx" target="main">Nhân viên</a></li>
                        <li><a class="men " href="./assets/dbTable/PB.php" name="mx" target="main">Phòng ban</a></li>
                        <li><a class="men " href="./assets/dbTable/Luong.php" name="mx" target="main">Lương</a></li>
                        <li><a class="men " href="./assets/dbTable/BCC.php" name="mx" target="main">Chấm công</a></li>
                        <li><a class="men " href="./assets/dbTable/CV.php" name="mx" target="main">Chức vụ</a></li>
                        <?php if($quyen == "a"){?>
                        <li><a class="men" href="./table/qltk.php" name="mx" target="main" id="list" data-value="">TK User</a></li><?php }?>
                        <li><a class="fa-solid fa-gear">
                            <i>Cài đặt</i></a>
                            <ul class="sub-menu">
                                <li><a class="men" href="#">Báo cáo</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Table -->

        <div class="container"> 
            <div class="panel panel-default"> 
                 <div class="panel-heading"> 
                        <div class="row"> 
                            <div class="col col-xs-6"> 
                                <h3 class="panel-title">Danh sách quản trị</h3> 
                            </div> 
                            <div div class="col col-xs-6 text-right">
                                <?php if($quyen == "a"){ ?>
                        <form action="./assets/dbTable/search.php" method="get" target="main">
                        <select class ="seltab" name="seltab" placeholder="search">
                            <option value="nhanvien">Nhân viên</option>
                            <option value="phongban">Phòng ban</option>
                            <option value="luong">Lương</option>
                            <option value="bangchamcong">Chấm công</option>
                            <option value="chucvu">Chức vụ</option>
                        </select>
                            <input class="ip-search" type="text" name="search" placeholder="Tìm kiếm"></input>
                            <input class="btn-search" type="submit" name="ok" value="Tìm kiếm"></input>
                        </form>
                                    <?php };?>
                        </div> 
                    </div> 
                    <div class="panel-body"> 
                        <table class="table table-striped table-bordered table-list"> 
                            <iframe name="main" src="./assets/dbTable/NV.php" width=100% height=100%></iframe>
                        </table> 
                </div> 
            </div> 
        </div>

    <script src="./assets/js/main.js"></script>
    <script>
        var header = document.getElementById("menu");
        var btns = header.getElementsByClassName("men");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
        });
        }   
    </script>
    </id>
    <?php } ?>

</body>
</html>