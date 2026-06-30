<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data dokter</h1>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_GET['action'])) {
  if($_GET['action'] == "hapus") {
    $kd = $_GET['kd'];
    $query = mysqli_query($koneksi, "DELETE FROM dokter where id_dokter = '$kd' ");
    if($query){
      echo '
      <div class="alert alert-warning alert-dismissible">
      Berhasil Di Hapus</div>';
      echo '<meta http-equiv="refresh" content="1;url=index.php?page=dokter">';
    }
  }
}
?>
<div class="content">
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <a href="index.php?page=tambah_dokter" class="btn btn-primary btn-sm">
    Tambah Dokter</a>
      <table class="table table-striped">
        <tread>
          <tr>
            <th>NO</th>
            <th>Id Dokter</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Nomor Handphone Dokter</th>

          </tr>
        </tread>
        <?php
        $no = 0;
        $query = mysqli_query($koneksi, "SELECT * FROM dokter");
        while ($result = mysqli_fetch_array($query) ) {
          $no++;
        ?>
        <tbody>
          <tr>
            <td><?= $no; ?></td>
            <td><?=$result['id_dokter']; ?></td>
            <td><?=$result['nama_dokter']; ?></td>
            <td><?=$result['spesialis']; ?></td>
            <td><?=$result['nohp_dktr']; ?></td>
            <td>
              <a href="index.php?page=dokter&action=hapus&kd=<?= $result['id_dokter']
              ?>" title="">
                <span class="badge badge-danger">Hapus</span></a>
              <a href="index.php?page=edit_dokter&kd=<?= $result['id_dokter'] ?>" title
              =""><span class
                ="badge badge-warning">Edit</span></a>
            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
</div>