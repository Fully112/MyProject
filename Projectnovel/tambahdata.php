<?php 
    require 'koneksi.php';
    if(isset($_POST["submit"])){
        if(tambah_data($_POST) > 0){
          echo"
          <script>
              alert('Data Berhasil Ditambahkan');
              document.location.href = 'halamanadmin.php';
          </script>";
      }else{
          echo"
          <script>
              alert('Data Gagal Ditambahkan');
              document.location.href = 'halamanadmin.php';
          </script>";
      } 
    }
?>
  <head>
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
<style>
  td{
    color:black;
  }
</style>
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


<h1>Tambah Data Buku</h1>
    <table>
        <form action="" method="post">
            <tr>
                <td><label for="id">ID : </label></td>
                <td><input type="text" name="id" id="id" required placeholder="ID..."></td>
            </tr>
            <tr>
                <td><label for="judul">Judul : </label></td>
                <td><input type="text" name="judul" id="judul" required placeholder="Judul..."></td>
            </tr>
            <tr>
                <td><label for="author">Author : </label></td>
                <td><input type="text" name="author" id="author" required placeholder="Author..."></td>
            </tr>
            <tr>
                <td><label for="deskripsi">Deskripsi : </label></td>
                <td><input type="text" name="deskripsi" id="deskripsi" required placeholder="Deskripsi..."></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Tambah Data</button></td>
            </tr>
        </form>
    </table>
    <link rel="stylesheet" href="style.css">
    <a href="halamanadmin.php">Kembali Ke Halaman Admin</a>