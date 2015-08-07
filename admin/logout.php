<?php
  session_start();
  session_destroy();
  echo "<script>alert('ANDA SUDAH KELUAR'); window.location = '../index.php'</script>";
?>
