<?php 
$conn = mysqli_connect("localhost:3307","root","*Aria051101","buku");
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $bukus = [];
    while($buku = mysqli_fetch_assoc($result)){
        $bukus[] = $buku;
    }
    return $bukus;
}

function tambah_data($data_buku){
    global $conn;

    $id = $data_buku["id"];
    $judul = $data_buku["judul"];
    $author = $data_buku["author"];
    $deskripsi = $data_buku["deskripsi"];

    
    $query = "insert into daftar_buku values
            ('$id','$judul','$author','$deskripsi')";

    mysqli_query($conn,$query); 
    return mysqli_affected_rows($conn);
}

function hapus_data($id){
     global $conn;

    $query = "delete from daftar_buku where id='$id'";
     mysqli_query($conn,$query);

     return mysqli_affected_rows($conn);
    }

function edit_data($data_buku){
    global $conn;

    $id = $data_buku["id"];
    $judul = $data_buku["judul"];
    $author = $data_buku["author"];
    $deskripsi = $data_buku["deskripsi"];
   

    $query = "update daftar_buku set 
              judul='$judul',
              author='$author',
              deskripsi='$deskripsi',
              kategori='$kategori'
              where id='$id'
              ";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function search($keyword){
    $query = "SELECT * FROM daftar_buku WHERE kategori LIKE '%$keyword%' OR id LIKE '%$keyword%' OR judul LIKE '%$keyword%' 
    OR author LIKE '%$keyword%'";
    return query($query);
}






?>

