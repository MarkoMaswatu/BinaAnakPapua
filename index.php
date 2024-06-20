<?php
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bina Anak Papua | Jasa Foto & Video</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
<style type="text/css">
body,td,th {
	color: #000000;
}
</style>
</head>

<body class="bg-dark">
    <!-- header -->
    <header class="p-2" style="background-image: linear-gradient(to right, yellow, lightblue);">
        <div class="container text-center">
        <a href="index.php"><img class="image" src="img/bina.png"></a>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>
    
    <!-- content -->
    <div class="section">
        <div class="container text-light">
            <marquee align="center">Selamat Datang Bro & Sis Di Website Bina Anak Papua Jasa Foto & Video</marquee>
        </div>
    </div>

    <!-- category -->
    <div class="section text-center bg-light">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id ASC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
                    <a href="galeri.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-2">
                            <img src="img/icon-kategori.png" width="100px" />
                        <p class="text-center"><?php echo $k['category_name'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                     <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- new product -->
     <section class="text-light" style="background-color:lightblue;">
    <div class="text-center">
       <h3>Foto Terbaru</h3>
       <div class="box">  
          <?php
              $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
          <div class="col-2 text-center">
              <img src="foto/<?php echo $p['image'] ?>" width="220px" height="180px" style="margin: 13px;" />
              <p class="text-light text-center "><?php echo substr($p['image_name'], 0, 30)  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
       <button type="button" class="btn btn-primary mb-2"><a href="https://api.whatsapp.com/send?phone=6282261147952&text=Hi%kak%marco,%saya mau order?" class="text-light">Order</a></button>
    </div>
     </section>
    
    <!-- footer -->
     <footer class="text-light text-center">
        <div class="container">
            <small>Copyright &copy; 2024 - Bina Anak Papua.</small>
        </div>
    </footer>
</body>
</html>