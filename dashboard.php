<?php
    session_start();
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bina Anak Papua | Jasa Foto & Video</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</head>

<body style="background-image: url(img/pasted\ image\ 0.png);" class="text-light text-center">
    <!-- header -->
    <header class="p-2" style="background-image: linear-gradient(to right, yellow, lightblue);">
        <div class="container">
        <h1><a href="dashboard.php"><img src="img/bina.png"></a></h1>
        <ul class="mt-5">
           <li><a class="btn btn-primary" href="dashboard.php" role="button">Dashboard</a></li>
           <li><a class="btn btn-primary" href="profil.php" role="button">Profil</a></li>
           <li><a class="btn btn-primary" href="data-image.php" role="button">Data Foto</a></li>
           <li><a class="btn btn-primary" href="Keluar.php" role="button">Keluar</a></li>
        </ul>
        </div>
    </header>
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Website Admin BAP Jasa Foto & Video</h4>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Bina Anak Papua.</small>
        </div>
    </footer>
</body>
</html>