<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $npm = $_POST['npm'];
   $nama = $_POST['nama']; // Use 'nama' instead of 'first_name'
   $kelas = $_POST['kelas'];
   $jurusan = $_POST['jurusan']; // Use 'jurusan' instead of 'Jurusan'
   $alamat = $_POST['alamat'];

   $sql = "UPDATE `user` SET `nama`='$nama', `kelas`='$kelas', `jurusan`='$jurusan', `alamat`='$alamat' WHERE `npm`='$npm'";

   $result = mysqli_query($conn, $sql);

   if ($result) {
       header("Location: index.php?msg=Record updated successfully");
       exit();
   } else {
       echo "Failed: " . mysqli_error($conn);
   }
}

// Fetch data for pre-filling the form
$npm = $_GET["npm"];
$sql = "SELECT * FROM `user` WHERE `npm`='$npm'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Edit Database</title>
</head>

<body style="background-image: url(Bg.jpg); background-size:cover;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container text-center">
        <a class="navbar-brand" href="#">
            Edit Mode
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Your existing navbar content here -->
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>Edit database</h3>
        <p class="text-muted">Complete the form below to edit user data</p>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="nama" placeholder="Randy" value="<?php echo $row['nama']; ?>">
                </div>

                <div class="col">
                    <label class="form-label">Kelas:</label>
                    <input type="text" class="form-control" name="kelas" placeholder="3IA11" value="<?php echo $row['kelas']; ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Jurusan:</label>
                <input type="text" class="form-control" name="jurusan" placeholder="Informatika" value="<?php echo $row['jurusan']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat:</label>
                <input type="text" class="form-control" name="alamat" placeholder="Depok" value="<?php echo $row['alamat']; ?>">
            </div>

            <input type="hidden" name="npm" value="<?php echo $row['npm']; ?>">

            <div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>