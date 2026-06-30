<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Pasien</h1>
      </div>
    </div>
  </div>
</div>

<?php
$id = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pasien WHERE id_pasien='$id' "));

if(isset($_POST['tambah'])){
  $Id_pasien = $_POST['id_pasien'];
  $Nm_pasien = $_POST['nama_pasien'];
  $Alamat = $_POST['alamat'];
  $No_hp = $_POST['no_hp'];

  $insert = mysqli_query($koneksi,"UPDATE pasien SET nama_pasien='$Nm_pasien', alamat='$Alamat', no_hp='$No_hp' WHERE id_pasien='$Id_pasien' ");

  if ($insert) {
    echo '<div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-info"></i> Info </h5>
      Berhasil Disimpan
    </div>';
    echo '<meta http-equiv="refresh" content="1;url=index.php?page=pasien">';
  }else{
    echo '<div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-info"></i> Info </h5>
      Gagal Disimpan
    </div>';
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
              <input type="text" name="id_pasien" value="<?=$edit['id_pasien']; ?>" class="form-control" readonly>
            </div>

            <div class="form-group">
              <label for="nama_pasien">Nama Pasien</label>
              <input type="text" name="nama_pasien" value="<?=$edit['nama_pasien']; ?>" id="nama_pasien" placeholder="Nama pasien" class="form-control">
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" value="<?=$edit['alamat']; ?>" id="alamat" placeholder="Alamat" class="form-control">
            </div>

            <div class="form-group">
              <label for="no_hp">Nomor Handphone</label>
              <input type="text" name="no_hp" value="<?=$edit['no_hp']; ?>" id="no_hp" placeholder="Nomor handphone" class="form-control">
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