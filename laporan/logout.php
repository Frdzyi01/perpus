<?php
session_start();
session_destroy(); 

    echo "<script>alert('Bye ! Anda telah keluar'); window.location = 'index.php'</script>";
?>