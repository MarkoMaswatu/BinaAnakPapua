<?php
    session_start();
	include 'db.php';
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

<body>
    <!-- header -->
    <header style="background-image: linear-gradient(to right, yellow, lightblue);">
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
            <h3>Data Galeri Foto</h3>
            <div class="box">
                <button class="m-2"><a href="tambah-image.php" class="btn btn-success text-light">Tambah Data</a></button>
                <table border="2" cellspacing="0" class="table">
                    <thead>
                        <tr class="b-2">
                           <th width="60px">No</th>
                           <th>Kategori</th>
                           <th>Fotografer & videographer</th>
                           <th>Nama Foto</th>
                           <th>Deskripsi</th>
                           <th>Gambar</th>
                           <th>Status</th>
                           <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						    $no = 1;
							$user = $_SESSION['a_global']->admin_id;
                            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' ");
							if(mysqli_num_rows($foto) >0 ){
							while($row = mysqli_fetch_array($foto)){
						?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $row['category_name'] ?></td>
                           <td><?php echo $row['admin_name'] ?></td>
                           <td><?php echo $row['image_name'] ?></td>
                           <td><?php echo $row['image_description']?></td>
                           <td><a href="foto/<?php echo $row['image']?>" target="_blank"><img src="foto/<?php echo $row['image']?>" width="50px"></a></td>
                           <td><?php echo ($row['image_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                           <td>
                              <button class="btn btn-warning m-2"><a href="edit-image.php?id=<?php echo $row['image_id'] ?>">Edit</a></button> || 
                              <button class="btn btn-danger"><a href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a></button>
                           </td>
                        </tr>
                        <?php }}else{ ?>
                             <tr>
                                <td colspan="8">Tidak ada data</td>
                             </tr>
                        <?php } ?>
                    </tbody>
                </table>
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