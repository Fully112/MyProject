<?php 
require 'koneksi.php';

$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM daftar_buku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;


$bukus = query("SELECT * FROM daftar_buku LIMIT $awalData, $jumlahDataPerHalaman");

if(isset($_POST["search"])){
    $bukus = search($_POST["keyword"]);
}
?>
<head>
<Title>Halaman Admin</Title>
<link rel="stylesheet" href="Styles.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  </head>

<body>
  <div class="header">
    <ul>
      <li><a href="#">AIR Novel</a></li>
      <li><a href="halamanadmin.php">Home</a></li>
      <li><a href="tambahdata.php">Tambah Data</a></li>
      <li><a href="#">About Us</a></li>
      <li class="search"><form class="d-flex" method="post">
        <input class="form-control me-2" type="text"name="keyword" placeholder="Search..." aria-label="Search" autocomplete="off">
        <button type="submit" name="search">Search</button>
      </form></li> 
      <div class="kanan">
    <li><a href="halamanhome.php" style="margin-bottom:3px;">Logout</a></li>
  </div>
    </ul>
    
  </div>
<div class="table">
<h1>Novels</h1>

<div class="pagenation">
<?php if( $halamanAktif > 1 ) : ?>
  <a href="?halaman<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
      <?php if( $i == $halamanAktif ) : ?>
        <a href="?halaman=<?= $i; ?>"id="aktif"><?= $i; ?></a>
      <?php else : ?>
        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>
    <?php if( $halamanAktif < $jumlahHalaman ) : ?>
  <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>
</div>

    <table border="1" bordercolor="white">
        <tr>
            <th>ID</th>
            <th class="jdl">Judul</th>
            <th class="auth">Author</th>
            <th class="deskr">Sinopsis</th>
            <th class="act">Action</th>
        </tr>
        <?php foreach($bukus as $buku) : ?>
        <tr>
            <td id="idnovel"><?= $buku["id"]; ?></td>
            <td> 
              <a href="uploadd/Isi/<?= $buku['judul']; ?>">
                <div class="image">
                  <div id="zoom-In">
                    <figure><img src="uploadd/cover/<?= $buku['judul']; ?>"></figure>
                  </div>
                </div>
              <br><br><?= $buku["judul"]; ?>
            </a>
            </td>
            <td class="aut"><?= $buku["author"]; ?></td>
            <td class="desk"><?= $buku["deskripsi"]; ?></td>
            <td class="edit"><a href="hapusdata.php?id=<?= $buku["id"]; ?>"style="color: 007aff"
             onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?');"><input id="Edit" type="submit" value="Hapus"></a> <br>
            <a href="editdata.php?id=<?= $buku["id"]; ?>" style="color: 007aff"><input id="Edit" type="submit" value="Edit"></a></td>
        </tr>
        <?php endforeach;?>
    </table>
    </div>





</body>
</html>