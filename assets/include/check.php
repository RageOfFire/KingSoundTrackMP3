<?php
    if (isset($_SESSION['success'])) {
    echo '
    <script>
    window.onload = function() {
    Swal.fire({
        icon: `success`,
        title: `'.$_SESSION['success'].'`,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
      })
    }
    </script>
    ';
    }
    else {}
unset($_SESSION['success']);
    if (isset($_SESSION['error'])) {
    echo '
    <script>
    window.onload = function() {
    Swal.fire({
        icon: `error`,
        title: `'.$_SESSION['error'].'`,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
      })
    }
    </script>
    ';
    }
    else {}
unset($_SESSION['error']);
?>