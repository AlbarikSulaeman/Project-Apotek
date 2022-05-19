<?php
 session_start();

 session_destroy();//menghancurkan seluruh sesi
 session_unset();
//menuju lokasi seebelum login
 header('Location: login.php');
?>