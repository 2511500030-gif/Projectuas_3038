<?php
if (isset($_GET['hapus'])) {
 
    $id_jadwal = $_GET['hapus'];

 
    mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'");

 
    $hapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'");

    if ($hapus) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil!</strong> Data jadwal telah dihapus.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Gagal!</strong> Tidak dapat menghapus data.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Jadwal Reservasi</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_jadwal" class="btn btn-primary btn-sm">Tambah Jadwal</a>
                <table class="table table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th>Id Jadwal</th>
                            <th>Id Dokter</th>
                            <th>Hari</th>
                            <th>Jam Praktek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $query = mysqli_query($koneksi, "SELECT * FROM jadwal");
                        
                       
                        if ($query && mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {    
                                echo "<tr>
                                <td>{$row['id_jadwal']}</td>
                                <td>{$row['id_dokter']}</td>
                                <td>{$row['hari']}</td>
                                <td>{$row['jam_praktek']}</td>
                                <td>
                                <ul>";
                                
                              
                                $det = mysqli_query($koneksi, "SELECT d.*, m.id_jadwal, g.id_dokter 
                                                               FROM detail_jadwal d 
                                                               LEFT JOIN  jadwal m ON d.id_jadwal = m.id_jadwal
                                                               LEFT JOIN dokter g ON d.id_dokter = g.id_dokter 
                                                               WHERE d.id_jadwal = '{$row['id_jadwal']}'");
                                
                                if ($det && mysqli_num_rows($det) > 0) {
                                    while ($d = mysqli_fetch_assoc($det)) {
                                        
                                        echo "<li>{$d['id_jadwal']} (Dokter: {$d['id_dokter']}) - {$d['hari']} - Jam ke-{$d['jam_praktek']}</li>";
                                    }
                                } else {
                                    echo "<li class='text-muted'>Belum ada rincian detail</li>";
                                }
                                
                                echo "</ul>
                                </td>
                                <td>
                                <a href='index.php?page=jadwal&hapus={$row['id_jadwal']}' onclick=\"return confirm('Yakin ingin menghapus data ini?')\" class='btn btn-danger btn-sm'>Hapus</a>
                                </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center text-muted'>Belum ada data jadwal yang tersedia.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>