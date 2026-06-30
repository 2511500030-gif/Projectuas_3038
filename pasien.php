 <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data pasien</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM pasien where id_pasien = '$id' ");
        
        if ($query){
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=pasien">';
        }
    }
}
?>

<div class="content">

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_pasien" class="btn btn-primary btn-sm">Tambah Pasien</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Id pasien</th>
                        <th>Nama pasien</th>
                        <th>Alamat</th>
                        <th>Nomor handphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM pasien");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_pasien']; ?></td>
                        <td><?= $result['nama_pasien']; ?></td>
                        <td><?= $result['alamat']; ?></td>
                        <td><?= $result['no_hp']; ?></td>
                        <td>
                            <a href="index.php?page=pasien&action=hapus&id=<?= $result['id_pasien'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_pasien&id=<?= $result['id_pasien'] ?>" title="">
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