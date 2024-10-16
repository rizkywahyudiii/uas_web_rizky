<!DOCTYPE html>
<html>
<head>
    <title>Form Pendataan Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $email=input($_POST["email"]);
        $telepon=input($_POST["telepon"]);
        $alamat=input($_POST["alamat"]);
        $jabatan=input($_POST["jabatan"]);
        $gaji=input($_POST["gaji"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into karyawan (nama,email,telepon,alamat,jabatan,gaji) values
		('$nama','$email','$telepon','$alamat','$jabatan','$gaji')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>
       <div class="form-group">
            <label>Telepon:</label>
            <input type="text" name="telepon" class="form-control" placeholder="Masukan Telepon" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        <div class="form-group">
            <label>Jabatan:</label>
            <input type="text" name="jabatan" class="form-control" placeholder="Masukan Jabatan" required/>
        </div>
        <div class="form-group">
            <label>Gaji:</label>
            <input type="text" name="gaji" class="form-control" rows="5"placeholder="Masukan Gaji (cth: 2500000)" required/>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>