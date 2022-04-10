<?php

include 'functions.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];


$user = get_user_by_email($email);

if(!empty($user)) {
	$_SESSION['error'] = "Этот эл. адрес уже занят другим пользователем.";
	header('Location: /register_form.php');
	exit;
}

add_user($email, $password);

header('Location: /auth_form.php');
exit;
