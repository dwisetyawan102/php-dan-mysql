<?php 
  session_start(); //gunakan method ini setiap kali menggunakan session

  // mengecek apakah tidak ada session login di halaman ini
  if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
  }

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