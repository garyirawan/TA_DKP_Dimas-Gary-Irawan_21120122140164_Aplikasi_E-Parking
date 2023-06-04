<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Parking</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->
  <link rel="shortcut icon" href="asset/img/logo.png">
  
  <script>
        function updateClock() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            // Menambahkan angka 0 di depan jam, menit, dan detik jika nilainya kurang dari 10
            hours = (hours < 10 ? "0" : "") + hours;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            // Menggabungkan waktu dalam format HH:mm:ss
            var waktu = hours + ":" + minutes + ":" + seconds;

            // Memperbarui elemen HTML dengan waktu yang baru
            document.getElementById('waktu').innerHTML = waktu;

            // Menjalankan fungsi ini setiap detik (1000 milidetik)
            setTimeout(updateClock, 1000);
        }
    </script>
</head>

<body onload="updateClock()">
    <div id="waktu"></div>
</body>

<?php 
  include "config/koneksi.php";

  if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
      $sql = mysqli_query($con, "INSERT INTO tb_login(username,password) VALUES('$username','$password')");
      echo "<script>alert('Data Anda Telah Tersimpan');document.location.href='index.php'</script>";
    }else{
      echo "<script>alert('Maaf Password Tidak Sama!!')</script>";
    }
  }

  if (isset($_POST['back'])) {
      header('location:index.php');
  }
 ?>

<body style="overflow-y: hidden;" class="bg-teal">
	<div class="panel container col-md-4 col-sm-8 col-xs-12" style="position: relative; margin: auto; box-shadow: 0 7px 16px #00655b, 0 4px 5px #006f64;">
        <div class="panel-body">
            <div style="float: left; margin-left:20px;">
            <img src="asset/img/logo.png" width="100px" class="animated fadeInDown">
          </div>
          <div style="float: left;">
            <h1 class="animated fadeInLeft" style="margin-left: 30px; font-size: 42pt"><?php echo $waktu; ?></h1>
            <p class="animated fadeInRight" style="margin-left: 65px;"><?php echo $tanggal;?></p>
          </div>
        </div>
        <div class="panel-heading bg-teal">
            <h4 style="color: white" class="animated zoomIn">Sign Up</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:400px;">
                       <div class="col-md-11">
                        <form class="cmxform" method="POST">
                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <input type="text" class="form-text" id="validate_username " name="username" value="<?php echo @$username ?>" required>
                              <span class="bar"></span>
                              <label>Username</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <input type="password" class="form-text" id="validate_password" name="password" required>
                              <span class="bar"></span>
                              <label>Password</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <input type="password" class="form-text" id="validate_confirm_password" name="confirm_password" required>
                              <span class="bar"></span>
                              <label>Confirm Password</label>
                            </div>
                            <input class="submit btn btn-info col-md-5 col-sm-5 col-xs-12" type="submit" value="Sign Up" name="signup" style="margin-top: 10px;">
                        </form>
                            
                        <form class="cmxform" method="POST">
                             <input class="submit btn btn-danger col-md-5 col-sm-5 col-xs-12" type="submit" value="Back" name="back" style="margin-top: 10px;">
                        </form>
                    </div>
        </div>
    </div>
</body>
</html>