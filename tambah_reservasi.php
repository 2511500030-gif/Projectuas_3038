<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Reservasi</h1>
            </div>
        </div>
    </div>
</div>

<?php
// kode otomatis
 $carikode = mysqli_query($koneksi, "SELECT MAX(id_reservasi) AS kode FROM reservasi");
$datakode = mysqli_fetch_array($carikode);

if ($datakode['kode']) {
    $nilaikode = substr($datakode['kode'], 3);
    $kode = (int)$nilaikode + 1;
    $hasilkode = "R-001" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "R-001";
}

if ($datakode) {
    $nilaikode = substr($datakode[0], 3);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "R-001" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "R-001";
}
$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['reservasi'])) {
    $id_reservasi = $_POST['Id_reservasi'];
    $id_jadwal = $_POST['id_jadwal'];
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $nama_pasien = $_POST['nama_pasien'];
    $tanggal_periksa = $_POST['tanggal_periksa'];
    $keluhan = $_POST['keluhan'];
    $status = $_POST['status'];

    $insert = mysqli_query($koneksi, "INSERT INTO reservasi values ('$id_reservasi','$id_jadwal', '$id_pasien', '$id_dokter', '$nama_pasien', '$tanggal_periksa', '$keluhan', '$status')");
    
     if ($insert) {
    echo '<div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-info"></i> Info </h5>
          <h4>Berhasil Disimpan</h4></div>';
    echo '<meta http-equiv="refresh" content="1;url=index.php?page=reservasi">';
} else {
    die("Error MySQL: " . mysqli_error($koneksi));
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
                            <label for="Id_reservasi">Id Reservasi</label>
                            <input type="text" name="Id_reservasi" value="<?= $hasilkode; ?>" placeholder="Id Reservasi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_jadwal">Id Jadwal</label>
                            <input type="text" name="Id_jadwal" value="<?= $hasilkode; ?>" placeholder="Id Jadwal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_pasien">Id Pasien</label>
                            <input type="text" name="Id_pasien" placeholder="Id Pasien" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_dokter">Id Dokter</label>
                            <input type="text" name="Id_dokter" placeholder="Id Dokter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Nama_pasien">Nama Pasien</label>
                            <input type="text" name="Nama_pasien" placeholder="Nama Pasien" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Tanggal_periksa">Tanggal Periksa</label>
                            <input type="date" name="Tanggal_periksa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Keluhan">Keluhan</label>
                            <textarea name="Keluhan" placeholder="Keluhan" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select name="Status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>


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