<?php 

$koneksi = mysqli_connect("localhost","root","","projek_uts");

// menambah barang baru

if(isset($_POST['proses'])) {
    $addtotable = mysqli_query($koneksi, "insert into pakaian set
    nama = '$_POST[nama]',
    ukuran = '$_POST[ukuran]',
    warna = '$_POST[warna]',
    stock ='$_POST[stock]',
    harga ='$_POST[harga]',
    tipe_pakaian_id = '$_POST[tipe]'");

    if($addtotable){
        header('location:pakaian.php');
    } else {
    echo "gagal";
    header('location:pakaian.php');
    }
};

if(isset($_POST['prosespesan'])) {
    $pakaian_id = $_POST['pakaian_id'];
    $quantity = $_POST['quantity'];
    $addtopesan = mysqli_query($koneksi, "insert into pesanan set pakaian_id='$pakaian_id', quantity='$quantity'");
    
};

if(isset($_POST['prosestipe'])) {
    $addtotipe = mysqli_query($koneksi, "insert into tipe_pakaian set
    tipe = '$_POST[tipe]'");
};


//update info barang

if(isset($_POST['updatebarang'])){
    $idb = $_POST['id'];
    $nama = $_POST['nama'];
    $ukuran = $_POST['ukuran'];
    $warna = $_POST['warna'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];
    $tipe_pakaian_id = $_POST['tipe'];

    $update = mysqli_query($koneksi,"update pakaian set nama='$nama', ukuran='$ukuran', warna='$warna', stock='$stock', harga='$harga', tipe_pakaian_id='$tipe_pakaian_id' where id ='$idb'");
    if($update){
        header('location:pakaian.php');
    } else {
        echo "gagal";
        header('location:pakaian.php');

    }
};

// Hapus Barang
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['id'];

    $hapus = mysqli_query($koneksi, "delete from pakaian where id ='$idb'");
    if($hapus){
        header('location:pakaian.php');
    } else {
        echo "gagal";
        header('location:pakaian.php');
    }

};

// Hapus Tipe
if(isset($_POST['hapustipe'])){
    $idb = $_POST['id'];

    $hapus = mysqli_query($koneksi, "delete from tipe_pakaian where id ='$idb'");
    if($hapus){
        header('location:tipe_pakaian.php');
    } else {
        echo "gagal";
        header('location:tipe_pakaian.php');
    }

};
?>