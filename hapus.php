<?php 
  require "functions.php";

  $id = $_GET["id"];

  if( hapus($id) > 0 ) {
    echo "
      <script>
        alert('Berhasil hapus data');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Gagal hapus data');
        document.location.href = 'index.php';
      </script>
    ";
  }
?>