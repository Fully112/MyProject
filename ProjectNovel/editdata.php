<?php 
    require 'koneksi.php';

    $id = $_GET["id"];
    $buku = query("Select * from daftar_buku where id = $id")[0];

    if(isset($_POST["submit"])){
        if(edit_data($_POST) > 0){
            echo "
            <script>
                alert('Edit Data Berhasil');
                document.location.href = 'halamanadmin.php'; 
            </script>";
        }else{
            echo "
            <script>
                alert('Edit Data Gagal');
                document.location.href = 'halamanadmin.php'; 
            </script>";
            echo "<br>";
            echo mysqli_error($conn);

        }
    }
?>
<head>
<link rel="stylesheet" href="style.css">
<style>
      td{
        color: white;
      }
</style>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Halaman Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="halamanadmin.php" style="font-size: 20px;">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
</head>

<body>
<h1>Edit Data Buku</h1>
        <table>
            <form action="" method="post">
                <tr>
                    <td><input type="hidden" name="id" id="id" required value="<?= $buku["id"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="judul">Judul : </label></td>
                    <td><input type="text" name="judul" id="judul" required value="<?= $buku["judul"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="author">Author : </label></td>
                    <td><input type="text" name="author" id="author" required value="<?= $buku["author"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="deskripsi">Sinopsis : </label></td>
                    <td><input type="text" name="deskripsi" id="deskripsi" required value="<?= $buku["deskripsi"]; ?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Edit Data</button></td>
                </tr>
            </form>
        </table>

    <a href="halamanadmin.php">Kembali Ke Halaman Home</a>
</body>