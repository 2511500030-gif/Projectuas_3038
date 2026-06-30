<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pasien</h1>
            </div>
        </div>
    </div>
</div>

<?php

$carikode = mysqli_query($koneksi, "select max(id_pasien) from pasien") or die ( $mysqli_error());
$datakode = mysqli_fetch_array($carikode);

if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "P-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "P-001";
}
$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {
    $id_pasien = $_POST['id_pasien'];
    $nama_pasien = $_POST['nama_pasien'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $insert = mysqli_query($koneksi, "INSERT INTO pasien values ('$id_pasien', '$nama_pasien', '$alamat', '$no_hp')");
    
    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-info"></i> Info </h5>
              <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=pasien">';
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
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="id_pasien">Id Pasien</label>
                            <input type="text" name="id_pasien" value="<?= $hasilkode; ?>" placeholder="Id Pasien" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="text" name="no_hp" id="no_hp" placeholder="Nomor Handphone" class="form-control">
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