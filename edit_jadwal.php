<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Jadwal pasien</h1>
      </div>
    </div>
  </div>
</div>

<?php
$id = $_GET['id']; 
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM jadwal WHERE id_jadwal='$id' "));

if(isset($_POST['jadwal'])){
  $id_jadwal = $_POST['id_jadwal'];
  $id_dokter = $_POST['id_dokter'];
  $hari = $_POST['hari'];
  $jam_mulai = $_POST['jam_praktek'];

  $insert = mysqli_query($koneksi,"UPDATE jadwal SET id_dokter='$id_dokter', hari='$hari', jam_praktek='$jam_praktek' WHERE id_jadwal='$id_jadwal' ");

  if ($insert) {
    echo '<div class="alert alert-info-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-info"></i> Info </h5>
      Berhasil Disimpan
    </div>';
    echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal">';
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
        <label for="id_jadwal">Id Jadwal</label>
        <input type="text" name="id_jadwal" value="<?=$edit['id_jadwal']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="id_dokter">Id Dokter</label>
        <input type="text" name="id_dokter" value="<?=$edit['id_dokter']; ?>" id="id_dokter" placeholder="Id Dokter" class="form-control">
      </div>

      <div class="form-group">
        <label for="hari">Hari</label>
        <input type="text" name="hari" value="<?=$edit['hari']; ?>" id="hari" placeholder="Hari" class="form-control">
      </div>

      <div class="form-group">
        <label for="jam_praktek">Jam Praktek</label>
        <input type="time" name="jam_praktek" value="<?=$edit['jam_praktek']; ?>" id="jam_praktek" class="form-control">
      </div>

      <div class="card-footer">
        <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
      </div>

    </form>
  </div>
</div>


    </form>
  </div>
</div>      
</section>