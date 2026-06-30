<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Dokter</h1>
            </div>
        </div>
    </div>
</div>

<?php
 
$carikode = mysqli_query($koneksi, "SELECT MAX(id_dokter) FROM dokter") or die (mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);

if ($datakode && $datakode[0] != null) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "D-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "D-001";
}
$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {
    $id_dokter   = $_POST['id_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $spesialis   = $_POST['spesialis'];

     
    $insert = mysqli_query($koneksi, "INSERT INTO dokter VALUES ('$id_dokter', '$nama_dokter', '$spesialis')");
    
    
    $insertuser = mysqli_query($koneksi, "INSERT INTO user VALUES ('$id_dokter', '1234', 'dokter')");
    
    if ($insert && $insertuser) {
        echo '<div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-info"></i> Info </h5>
              <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=dokter">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-times"></i> Error </h5>
              <h4>Gagal Disimpan: ' . mysqli_error($koneksi) . '</h4></div>';
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
                            <label for="id_dokter">Id Dokter</label>
                            <input type="text" name="id_dokter" value="<?= $hasilkode; ?>" placeholder="Id Dokter" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_dokter">Nama Dokter</label>
                            <select type="text" name="nama_dokter" id="nama_dokter" placeholder="Masukkan Nama Dokter" class="form-control" required>
                                <option value="">Pilih Nama Dokter</option>
                                <option value="Dr. Anita">Dr. Anita</option>
                                <option value="Dr. Dandy">Dr. Dandy</option>
                                <option value="Dr. Citra">Dr. Citra</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <select name="spesialis" id="spesialis" class="form-control" required>
                                <option value="">Pilih Spesialis</option>
                                <option value="Umum">Umum</option>
                                <option value="Kandungan">Kandungan</option>
                                <option value="Gigi">Gigi</option>
                                <option value="Jantung">Jantung</option>
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