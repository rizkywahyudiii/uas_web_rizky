<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>Rizky Wahyudi</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Selamat Datang Di PT. WAHYUDI</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DATA KARYAWAN</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_karyawan'])) {
        $id_karyawan=htmlspecialchars($_GET["id_karyawan"]);

        $sql="delete from karyawan where id_karyawan='$id_karyawan' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from karyawan order by id_karyawan desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["email"];   ?></td>
                <td><?php echo $data["telepon"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["jabatan"];   ?></td>
                <td><?php echo $data["gaji"];   ?></td>
                <td>
                    <a href="update.php?id_karyawan=<?php echo htmlspecialchars($data['id_karyawan']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_karyawan=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
    <footer>
        <hr/>
        <i>Copyright © PT. WAHYUDI 2024 Reserved.</i>
    </footer>
</body>
</html>
