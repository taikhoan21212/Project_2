<?php
        $useName = $currentUser['Usename'];
        $khoa = $currentUser['MaNV'];
        $ktQuyen1 = mysqli_query($conn, "SELECT Quyenhan FROM quanlytaikhoan WHERE Usename = '$useName';");
        $ktQuyen2 = mysqli_fetch_assoc($ktQuyen1);
        $quyen = $ktQuyen2['Quyenhan'];
        ?>