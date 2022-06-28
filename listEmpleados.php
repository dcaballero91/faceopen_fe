<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
	
}
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Empleados</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('nav.php');?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Lista de Empleados</h2>
			<hr />
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>Cédula</th>
					<th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
					<th>Área</th>
					<th>Sucursal</th>
				</tr>
				<?php
				
				$sql = mysqli_query($con, "select pers_ci, pers_nom, pers_ape,cargo_desc,area_desc,suc_desc from funcionarios f inner join personas p3 on f.id_pers = p3.id_pers inner join cargos c3 on f.id_cargo = c3.id_cargo inner join area a on f.id_area = a.id_area inner join sucursales s on f.id_suc = s.id_suc");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['pers_ci'].'</td>
							<td>'.$row['pers_nom'].'</td>
                            <td>'.$row['pers_ape'].'</td>
                            <td>'.$row['cargo_desc'].'</td>
							<td>'.$row['area_desc'].'</td>
                            <td>'.$row['suc_desc'].'</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	<p>&copy; Sistemas Web <?php echo date("Y");?></p
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
