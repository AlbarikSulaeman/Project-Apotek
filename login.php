<?php 
  include("koneksi.php");
    session_start();

      
      if (isset($_POST['login'])) {
        $uname=strtoupper($_POST['uname']);
        $pass=md5($_POST['pass']);
      }else{
        $uname=1;
        $pass=1;
      } 
      $tb_user = mysqli_query($mysql, "SELECT * FROM tb_user WHERE username = '$uname'");
      if(mysqli_num_rows($tb_user) != 0){
        $row = mysqli_fetch_array($tb_user);
        $username = $row['username'];
        $password = $row['password'];
        $role = $row['role'];
        $uid = $row['uid'];
        $fullname = $row['fullname'];
      }else{
        $username = 0;
        $password = 1;
        $role = " ";
      }
      if($uname == $username && $pass == $password && $role == "admin"){
          $_SESSION['login'] = true;
          $_SESSION['uid'] = $uid;
          $_SESSION['fullname'] = $fullname;
        echo "Anda Berhasil Login";
        header("Location: adminpage.php");
        }
      if($uname == $username && $pass == $password && $role == "user"){
        $_SESSION['login'] = true;
        $_SESSION['uid'] = $uid;
        $_SESSION['fullname'] = $fullname;
        echo "anda Berhasil Login";
        header("Location: userpage.php");
      }else{
        echo "";
      }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apotek 13</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    >
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins");
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Poppins";
      }

      body {
        font-family: "Poppins";
        font-weight: 300,400,500,600;
      }

      .login-form {
        position: relative;
        min-height: 100vh;
        z-index: 0;
        background: #eaeaea;
        padding: 40px;
        justify-content: center;
        display: grid;
        grid-template-rows: 1fr auto 1fr;
        align-items: center;
      }

      .container {
        max-height: 800px;
        margin: 0 auto;
      }

      .login-form h1 {
        text-align: center;
        font-size: 40px;
        font-weight: 400;
        color: #273c75;
      }

      .login-form h2 {
        font-size: 30px;
        line-height: 40px;
        margin-bottom: 5px;
        font-weight: 500;
        color: #273c75;
        text-align: center;
      }

      .login-form .main {
        position: relative;
        display: flex;
        margin: 30px 0;
      }

      .content {
        flex-basis: 50%;
        padding: 3em 3em;
        background: #fff;
        box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.1);
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
      }

      .form-img {
        flex-basis: 50%;
        background: white;
        background-size: cover;
        padding: 40px;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        align-items: center;
        display: grid;
      }

      .form-img img {
        max-width: 100%;
      }

      p {
        color: #666;
        font-size: 16px;
        line-height: 25px;
        opacity: 0.6;
        text-align: center;
      }

      .btn,
      button,
      input {
        border-radius: 35px;
      }

      .btn:hover,
      button:hover {
        transition: 0.5s ease;
      }

      a {
        text-decoration: none;
      }

      .login-form form {
        margin: 30px 0;
      }

      .login-form input {
        outline: none;
        margin-bottom: 15px;
        font-stretch: 16px;
        color: #999;
        text-align: left;
        padding: 14px 20px;
        width: 100%;
        display: inline-block;
        box-sizing: border-box;
        border: 1px solid #e5e5e5;
        background: #f7fafc;
        transition: 0.3s ease;
      }

      .login-form input:focus {
        background: transparent;
        border: 1px solid #273c75;
      }

      .login-form button {
        font-size: 18px;
        color: #fff;
        width: 100%;
        background: #273c75;
        border: none;
        padding: 14px 15px;
        font-weight: 500;
        transition: 0.3s ease;
      }

      .login-form button:hover {
        background: #344c8f;
      }

      p .account,
      p.account a {
        text-align: center;
        padding-top: 20px;
        padding-bottom: 0;
        font-size: 16px;
        color: #333;
      }

      p.account a {
        color: #273c75;
      }

      p.account a:hover {
        text-decoration: underline;
      }

      /* responsive */

      @media (max-width: 736px) {
        .login-form .main {
          flex-direction: column;
        }
        .login-form form {
          margin-top: 30px;
          margin-bottom: 10px;
        }

        .form-img {
          border-radius: 0;
          border-bottom-left-radius: 8px;
          border-bottom-right-radius: 8px;
          order: 2;
        }

        .content {
          order: 1;
          border-radius: 0;
          border-top-left-radius: 8px;
          border-top-right-radius: 8px;
        }
        .back-btn i {
        width: 40px;
        position: absolute;
        margin-top: -70px;
        margin-left: -20px;
      }
      }
    </style>
  </head>
  <body>
    <div class="login-form">
      <h1>Log In</h1>
      <div class="container">
        <div class="main">
          <div class="content">
            <div class="back-btn">
              <a href="index.php"><i class="fas fa-chevron-left"></i></a>
            </div>
            <h2>Log In</h2>
            <form action="" method="post">
              <input type="text" name="uname" placeholder="Username" required="required">

              <input type="password" name="pass" placeholder=" Password" required="required">

              <input class="btn" type="submit" name="login" placeholder="Log In" style="color: white; background-color: #273c75; text-align: center;">
            </form>

            <p class="account">Tidak Punya Akun? <a href="daftar.php">Daftar</a></p>
          </div>

          <div class="form-img">
            <img src="soi.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </body>
  
</html>
