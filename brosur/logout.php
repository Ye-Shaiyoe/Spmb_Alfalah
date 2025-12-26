<?php
session_start();
session_destroy();
header("Location: ../index.php");
if (headers_sent()) {
    echo '<script type="text/javascript">
            window.location.href = "../index.php";
            </script>';
    exit();
}