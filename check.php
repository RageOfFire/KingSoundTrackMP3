<?php
    if (isset($_SESSION['success'])) {
    echo '
    <div class="alert alert-success mt-3" role="alert">
    '.$_SESSION['success'].'
    </div>
    ';
    unset($_SESSION['success']);
    }
    else {}
    if (isset($_SESSION['error'])) {
    echo '
    <div class="alert alert-danger mt-3" role="alert">
    '.$_SESSION['error'].'
    </div>
    ';
    unset($_SESSION['error']);
    }
    else {}
?>