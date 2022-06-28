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
	<title>Marcación</title>

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
			<h2>Lista de Marcación</h2>
			<hr />
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filtros de datos de empleados</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="E" <?php if($filter == 'E'){ echo 'selected'; } ?>>Entrada</option>
						<option value="S" <?php if($filter == 'S'){ echo 'selected'; } ?>>Salida</option>
					</select>
				</div>
			</form>
			<br />
			
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cédula</th>
					<th>F/H Marcación</th>
					<th>Estado</th>
					<th>Tipo</th>
				</tr>

				<?php
				if($filter){
					$sql = mysqli_query($con, "SELECT pers_nom, pers_ape, pers_ci,fec_marc, pers_estado,tipo_marc FROM marcaciones m inner join personas p on m.id_pers=p.id_pers WHERE tipo_marc ='$filter'");
				}else{
				$sql = mysqli_query($con, "select p.pers_nom,p.pers_ape,p.pers_ci ,m.fec_marc,p.pers_estado,m.tipo_marc from marcaciones m inner join personas p on m.id_pers = p.id_pers");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['pers_nom'].'</td>
							<td>'.$row['pers_ape'].'</td>
							<td>'.$row['pers_ci'].'</td>
							<td>'.$row['fec_marc'].'</td>
							<td>'.$row['pers_estado'].'</td>
							<td>'.$row['tipo_marc'].'</td>
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
