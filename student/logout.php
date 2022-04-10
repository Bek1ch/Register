<?php
session_start();
unset($_SESSION['user']);

header('Location: /auth_form.php');
exit;
?>