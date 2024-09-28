<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: localhost/test/dn/admin/login/login.php");
    exit();
?>