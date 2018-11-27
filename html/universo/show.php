<?php 
	$con = mysqli_connect('localhost', 'root', '', 'universo');

	if (mysqli_connect_errno()) {
		echo "Error: ".mysqli_connect_error();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Universo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<style>
		body {
			font-family: 'Quicksand', sans-serif;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h1 class="text-center">Base de Datos Universo</h1>
				<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="./">Lista de Planetas</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Consultar Planeta</li>
				  </ol>
				</nav>
				<br><br>
				<h2><i class="fa fa-plus"></i> Consultar Planeta</h2>
				<hr>
				<table class="table table-striped table-hover">
					<tbody>
				<?php 
					if ($_GET) {
						$id = $_GET['id'];
						$sql = "select * from planetas where id= $id";

						$res = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_array($res)) {

				?>
				<tr>
					<th>NOMBRE: </th>
					<td><?php echo $row['nombre'] ?></td>
				</tr>
				<tr>
					<th>ORDEN: </th>
					<td><?php echo $row['orden'] ?></td>
				</tr>
				<tr>
					<th>LUNAS: </th>
					<td><?php echo $row['lunas'] ?></td>
				</tr>
				<?php 
						}
					} 

				?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
