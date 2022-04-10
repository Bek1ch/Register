<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>Авторизация</h1>
				<?php if(isset($_SESSION['error'])):?>
				<div class="alert alert-danger">
					<?php echo $_SESSION['error']; unset($_SESSION['error']);?>
				</div>
				<?php endif;?>
				<form action="/auth.php" method="post">
					<div class="form-group mb-3">
						<label for="">Эл. адрес</label>
						<input type="email" class="form-control" name="email">
					</div>

					<div class="form-group mb-3">
						<label for="">Пароль</label>
						<input type="password" class="form-control" name="password">
					</div>
					<button type="submit" class="btn btn-success">Войти</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>