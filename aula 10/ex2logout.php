<?php
session_start();
session_destroy();

header('Location: ex2login.php');
exit;
?>
