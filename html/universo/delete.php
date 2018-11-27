<?php 
	$con = mysqli_connect('localhost', 'root', '', 'universo');

	if (mysqli_connect_errno()) {
		echo "Error: ".mysqli_connect_error();
	}

	if ($_GET) {
		$id = $_GET['id'];

		$sql = "Delete from planetas where id =$id";

		if (mysqli_query($con ,$sql)) {
			echo "<script>";
			echo "alert('Planeta Eliminado con Exito!');";
			echo "window.location.replace('./')";
			echo "</script>";

		} else {
			echo "Error:".mysqli_error($con);
		}
	}
?>
