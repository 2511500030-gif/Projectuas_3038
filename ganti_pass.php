<?php
if(isset($_POST['tambah'])){}
{
   $pl = $_POST['pl'];
   $pb = $_POST['pb'];
   $cek = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user "));
}

   if($cek['username']==$username && $cek['password']==$pl) { 
   echo "coba";die;
}
?> 