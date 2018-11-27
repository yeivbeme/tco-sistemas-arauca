<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enviar Email con Postfix desde PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<style>
		body {
			font-family: 'Quicksand', sans-serif;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<h1 class="text-center">Enviar Email con Postfix desde PHP</h1>
				<hr>
				<form action="" method="post">
					<div class="form-group">
						<input type="text" name="to" class="form-control" placeholder="Para">
					</div>
					<div class="form-group">
						<input type="text" name="subject" class="form-control" placeholder="Asunto">
					</div>
					<div class="form-group">
						<textarea name="message" class="form-control" placeholder="Mensaje" cols="30" rows="4"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"> <i class="fa fa-envelope"></i> Enviar </button>
					</div>
				</form>
				<?php 

					if ($_POST) {
						$to = $_POST['to'];
						$subject = $_POST['subject'];
						$message = $_POST['message'];
						$headers = "From: tcosistemasarauca@gmail.com";

						if (mail($to, $subject, $message, $headers)) {
							echo "<div class='alert alert-success'> <li> Email enviado con exito!</li></div>";
						}

					}
					

				?>
			</div>
		</div>
	</div>
	
	
</body>
</html>
