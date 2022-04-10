<?php

function get_user_by_email($email) {
	// 1. Подключение к БД
	$pdo = new PDO("mysql:host=localhost;dbname=myproject;", 'root', ''); 

	// 2. Создание запроса
	$sql = "SELECT * FROM users WHERE email=:email";
	$statement = $pdo->prepare($sql);

	// 3. Выполнение запроса
	$statement->execute(['email'	=>	$email]);

	// 4. Возврат результата. Вернет: массив либо false
	return $statement->fetch(PDO::FETCH_ASSOC);
}


function add_user($email, $password) {
	$pdo = new PDO("mysql:host=localhost;dbname=myproject;", "root", "");
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$statement = $pdo->prepare($sql);
	$statement->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
}


function login($email, $password) {
	$user = get_user_by_email($email);
	if(empty($user)) {
		$_SESSION['error'] = 'Логин или пароль введены неверно.';
		header("Location: /auth_form.php");
		exit;
	}

	if(!password_verify($password, $user['password'])) {
		$_SESSION['error'] = 'Логин или пароль введены неверно.';
		header("Location: /auth_form.php");
		exit;
	}

	$_SESSION['user'] = $user;

	return true;
}


?>