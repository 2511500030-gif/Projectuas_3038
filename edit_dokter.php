<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Dokter</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter='$id' "));

if(isset($_POST['tambah'])){
    $id_dokter = $_POST['id_dokter'];
    $nm_dokter = $_POST['nama_dokter'];
    $spesialis = $_POST['spesialis'];
    $nohp_dktr = $_POST['nohp_dktr'];

    $insert = mysqli_query($koneksi, "UPDATE dokter SET nama_dokter='$nama_dokter', spesialis='$spesialis', nohp_dktr='$nohp_dktr' WHERE id_dokter='$id_dokter' ");
    
    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-info"></i> Info </h5>
              <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=dokter">';
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
                        <div class="form-group
                <div class="form-group">
                            <label for="id_dokter">Id Dokter</label>
                            <input type="text" name="id_dokter" value="<?= $edit['id_dokter']; ?>" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label for="nama_dokter">Nama Dokter</label>
                            <select type="text" name="nama_dokter" value="<?= $edit['nama_dokter']; ?>" id="nama_dokter" placeholder="Nama Dokter" class="form-control">
                                <option value="">Pilih Nama Dokter</option>
                                <option value="Dr. Anita" <?= ($edit['nama_dokter'] == 'Dr. Anita') ? 'selected' : ''; ?>>Dr. Anita</option>
                                <option value="Dr. Dandy" <?= ($edit['nama_dokter'] == 'Dr. Dandy') ? 'selected' : ''; ?>>Dr. Dandy</option>
                                <option value="Dr. Citra" <?= ($edit['nama_dokter'] == 'Dr. Citra') ? 'selected' : ''; ?>>Dr. Citra</option>
                      
                            </select>
                        </div>
                        <div class="form-group"></div>
                            <label for="spesialis">Spesialis</label>
                            <select name="spesialis" id="spesialis" class="form-control">
                                <option value="">Pilih Spesialis</option>
                                <option value="Umum" <?= ($edit['spesialis'] == 'Umum') ? 'selected' : ''; ?>>Umum</option>
                                <option value="Kandungan" <?= ($edit['spesialis'] == 'Kandungan') ? 'selected' : ''; ?>>Kandungan</option>
                                <option value="Gigi" <?= ($edit['spesialis'] == 'Gigi') ? 'selected' : ''; ?>>Gigi</option>
                                <option value="Jantung" <?= ($edit['spesialis'] == 'Jantung') ? 'selected' : ''; ?>>Jantung</option>
                            </select>
                            <div class="form-group">
                            <label for="nohp_dktr">Nomor Handphone</label>
                            <input type="text" name="nohp_dktr" value="<?= $edit['nohp_dktr']; ?>" id="nohp_dktr" placeholder="Nomor Handphone" class="form-control">
                        </div>
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