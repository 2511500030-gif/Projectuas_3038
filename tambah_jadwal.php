<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal Reservasi</h1>
            </div>
        </div>
    </div>
</div>

<?php

$carikode = mysqli_query($koneksi, "SELECT MAX(Id_jadwal) FROM jadwal") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);

if ($datakode && $datakode[0] !== null) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "J-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "J-001";
}

$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {
    $Id_jadwal    = $_POST['id_jadwal'];
    $Id_kelas     = $_POST['id_dokter'];
    $semester     = $_POST['hari'];
    $tahun_ajaran = $_POST['jam_praktek'];


    $insertjadwal = mysqli_query($koneksi, "INSERT INTO jadwal VALUES ('$id_jadwal', '$id_dokter', '$hari', '$jam_praktek')");

    if (!$insertjadwal) {
        echo "Gagal insert ke tabel jadwal: " . mysqli_error($koneksi);
        die;
    }

   
    $allSuccess = true;
    for ($i = 0; $i < count($id_mapel); $i++) {
 
        $insert = mysqli_query($koneksi, "INSERT INTO detail_jadwal (id_jadwal, id_guru, hari, jam_praktek) 
                  VALUES ('$Id_jadwal', '$id_dokter', '{$hari[$i]}', '{$jam_praktek[$i]}')");
        
        if (!$insert) {
            $allSuccess = false;
            echo "Gagal insert detail ke-{$i}: " . mysqli_error($koneksi);
        }
    }

    if ($allSuccess) {
        echo "<div class='alert alert-info alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class='icon fas fa-info'></i> Info</h5>
        <h4>Berhasil Disimpan</h4></div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?page=jadwal'>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class='icon fas fa-info'></i> Info</h5>
        <h4>Gagal menyimpan sebagian atau seluruh data detail.</h4></div>";
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Jadwal Reservasi</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Id Jadwal</label>
                        <input type="text" name="id_jadwal" value="<?php echo $hasilkode; ?>" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Id Dokter</label>
                        <select name="id_dokter" class="form-control" required>
                            <option value="" disabled selected>--Pilih Dokter--</option>
                              <select type="text" name="nama_dokter" id="nama_dokter" placeholder="Masukkan Nama Dokter" class="form-control" required>
                                <option value="">Pilih Nama Dokter</option>
                                <option value="Dr. Anita">Dr. Anita</option>
                                <option value="Dr. Dandy">Dr. Dandy</option>
                                <option value="Dr. Citra">Dr. Citra</option>
                            </select>

                            <?php
  
                            $dokter = mysqli_query($koneksi, "SELECT * FROM dokter");
                            while ($d = mysqli_fetch_assoc($dokter)) {
                                echo "<option value='{$d['id_dokter']}'>{$d['nama_dokter']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control" required>
                            <option value="" disabled selected>--Pilih Hari--</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jam Praktek</label>
                        <select name="jam_praktek" class="form-control" required>
                            <option value="" disabled selected>--Pilih Jam Praktek--</option>
                            <option value="08.00-13.00">08.00-13.00</option>
                            <option value="13.00-18.30">13.00-18.30</option>
                            <option value="10.30-12.00">18.30-12.00</option>
                        </select>
                    </div>

                    <hr>
                    <h5>Detail Jadwal</h5>
                    <div id="detail-jadwal">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <select name="Id_mapel[]" class="form-control" required>
                                    <option value="" disabled selected>--Pilih Mapel--</option>
                                    <?php
                                    $mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
                                    while ($m = mysqli_fetch_assoc($mapel)) {
                                        echo "<option value='{$m['Kd_mapel']}'>{$m['Nm_mapel']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select name="hari[]" class="form-control" required>
                                    <option value="" disabled selected>--Pilih Hari--</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select name="jam[]" class="form-control" required>
                                    <option value="" disabled selected>--Pilih Jam--</option>
                                    <option value="08.00-10.00">08.00-10.00</option>
                                    <option value="08.00-09.30">08.00-09.30</option>
                                    <option value="10.30-12.00">10.30-12.00</option>
                                    <option value="12.30-14.00">12.30-14.00</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input type="text" name="kelas[]" class="form-control" placeholder="Kelas" required>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-info" onclick="tambahBaris()">Tambah Mapel</button>
                    <br><br>
                    <input type="submit" name="tambah" value="simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function tambahBaris() {
    let container = document.getElementById('detail-jadwal');
    let row = container.firstElementChild.cloneNode(true);
    row.querySelectorAll('input').forEach(input => input.value = '');
 
    row.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
    container.appendChild(row);
}
</script> 