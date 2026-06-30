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
if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM reservasi where id_reservasi = '$kd' ");
        
        if ($query){
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=reservasi">';
        }
    }
}
?>

<div class="content">

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_reservasi" class="btn btn-primary btn-sm">Tambah Reservasi</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Id Reservasi</th>
                        <th>Id Jadwal</th>
                        <th>Id Pasien</th>
                        <th>Id Dokter</th>
                        <th>Nama pasien</th>
                        <th>Tanggal Periksa</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM reservasi");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_reservasi']; ?></td>
                        <td><?= $result['id_jadwal']; ?></td>
                        <td><?= $result['id_pasien']; ?></td>
                        <td><?= $result['id_dokter']; ?></td>
                        <td><?= $result['nama_pasien']; ?></td>
                        <td><?= $result['tanggal_periksa']; ?></td>
                        <td><?= $result['keluhan']; ?></td>
                        <td><?= $result['status']; ?></td>
                            <a href="index.php?page=reservasi&action=hapus&kd=<?= $result['id_reservasi'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_reservasi&kd=<?= $result['id_reservasi'] ?>" title="">
                                <span class="badge badge-warning">Edit</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cetak Data Reservasi</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="no-print mb-3">
                <button onclick="window.print()" class="btn btn-primary btn-sm">
                    <i class="fas fa-print"></i> Print Sekarang
                </button>
                <a href="index.php?page=cetak_jadwal" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Id Reservasi</th>
                        <th>Id Jadwal</th>
                        <th>Id Pasien</th>
                        <th>Id Dokter</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Periksa</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 0;
             
                $query = mysqli_query($koneksi, "SELECT * FROM reservasi ORDER BY Id_reservasi ASC");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
               ?>
                <tbody>
                    <tr>
                        <td><?= $no;?></td>
                        <td><strong><?= $result['id_reservasi'];?></strong></td>
                        <td><?= $result['id_jadwal'];?></td>
                        <td><?= $result['id_pasien'];?></td>
                        <td><?= $result['id_dokter'];?></td>
                        <td><?= $result['nama_pasien'];?></td>
                        <td><?= $result['tanggal_periksa'];?></td>
                        <td><?= $result['keluhan'];?></td>
                        <td><?= $result['status'];?></td>
                         <a href="index.php?page=reservasi&action=hapus&kd=<?= $result['id  _reservasi'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_reservasi&kd=<?= $result['Id_reservasi'] ?>" title="">
                                <span class="badge badge-warning">Edit</span>
                    </tr>
                </tbody>
                <?php 
                ?>
                                    echo "<li>{$d['Nm_']} (Guru: {$d['Nm_guru']}) - {$d['Hari']} - {$d['Jam']}</li>";
                                }
                               ?>
                            </ul>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
        </div>
    </div>
</div>
</div>

<style>
@media print {

   .main-sidebar, 
   .main-header, 
   .main-footer, 
   .no-print, 
   .btn {
        display: none!important;
    }
  
   .content-wrapper {
        margin-left: 0!important;
        padding: 0!important;
    }
   .card {
        border: none!important;
        box-shadow: none!important;
    }
}
</style>

<script>
window.addEventListener('DOMContentLoaded', (event) => {
    window.print();
});
</script>