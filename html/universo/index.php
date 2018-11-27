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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('body').on('click', '.btn-destroy', function(event) {
				event.preventDefault();
				$id = $(this).attr('data-id');
				if (confirm("Realmente desea eliminar este Planeta")) {
					window.location.replace("delete.php?id="+$id);
				}
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h1 class="text-center">Base de Datos Universo</h1>
				<br>
				<a href="add.php" class="btn btn-success"> <i class="fa fa-plus"> Planeta </i> </a>
				<br><br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>NOMBRE</th>
							<th>ORDEN</th>
							<th>LUNAS</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
				<?php 
					$sql = "SELECT * FROM planetas";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
				?>
					<tr>
						<td> <?php echo $row['nombre']; ?> </td>
						<td> <?php echo $row['orden']; ?> </td>
						<td> <?php echo $row['lunas']; ?> </td>
						<td> 
						<a href="show.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark"> <i class="fa fa-search"></i> </a>
						<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark"> <i class="fa fa-pen"></i> </a>
						<a href="javascript:;" class="btn btn-sm btn-danger btn-destroy" data-id="<?php echo $row['id']; ?>"> <i class="fa fa-trash"></i> </a>
						</td>
					</tr>
				<?php
					}

					mysql_close($con);
				?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	
</body>
</html>
