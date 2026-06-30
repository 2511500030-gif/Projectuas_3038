<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE NIS='$kd' "));

if(isset($_POST['tambah'])){
    $nis = $_POST['NIS'];
    $nm_siswa = $_POST['Nm_siswa'];
    $jenkel = $_POST['Jenkel'];
    $hp = $_POST['Hp'];
    $Id_kelas = $_POST['Id_kelas'];

    $insert = mysqli_query($koneksi, "UPDATE siswa SET Nm_siswa='$nm_siswa', Jenkel='$jenkel', Hp='$hp', Id_kelas='$Id_kelas' WHERE NIS='$nis' ");
    $insertuser = mysqli_query($koneksi, "UPDATE user SET username='$nis' WHERE username='$kd' AND role='siswa' ");
    
    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-info"></i> Info </h5>
              <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa ">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-info"></i> Info </h5>
              <h4>Gagal Disimpan</h4></div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2"></div>
                    <form method="POST" action="">
                        <div class="form-group">
                        <div class="form-group">
                            <label for="NIS">NIS</label>
                            <input type="text" name="NIS" value="<?= $edit['NIS']; ?>" class="form-control" readonly>
                        </div> 
                        <div class="form-group">
                            <label for="Nm_siswa">Nama Siswa</label>
                            <input type="text" name="Nm_siswa" value="<?= $edit['Nm_siswa']; ?>" id="Nm_siswa" placeholder="Nama Siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jenkel">Jenis Kelamin</label>
                            <select name="Jenkel" id="Jenkel" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= ($edit['Jenkel'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($edit['Jenkel'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <label for="Hp">No HP</label>
                            <input type="text" name="Hp" value="<?= $edit['Hp']; ?>" id="Hp" placeholder="No HP" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Id_kelas">ID Kelas</label>
                            <select name="Id_kelas" id="Id_kelas" class="form-control">
                                <option value="">Pilih ID Kelas</option>
                                <option value="Kelas 1" <?= ($edit['Id_kelas'] == 'Kelas 1') ? 'selected' : ''; ?>>Kelas 1</option>
                                <option value="Kelas 2" <?= ($edit['Id_kelas'] == 'Kelas 2') ? 'selected' : ''; ?>>Kelas 2</option>
                                <option value="Kelas 3" <?= ($edit['Id_kelas'] == 'Kelas 3') ? 'selected' : ''; ?>>Kelas 3</option>
                            </select>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>