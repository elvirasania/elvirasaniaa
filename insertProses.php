<?php 
    include "koneksi.php";

    $target_path = "gambar/";
    $target_path = $target_path . basename(
        $_FILES['gambar']['name']);

    move_uploaded_file($_FILES['gambar']['tmp_name'],$target_path);

    $id = $_POST['id'];
    $nama = $_POST['name'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO product(id, product_name,harga, gambar)
            VALUES('$id','$nama','$harga','$target_path')";

    if (mysqli_query($connect, $sql)) {
        echo "Data berhasil ditambahkan ";
?>
<a href="homeCRUD.php">Lihat Data</a>
<?php 
    } else {
        echo "Data gagal ditambahkan <br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>