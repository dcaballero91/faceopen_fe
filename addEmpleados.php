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
	<title>Agregar Datos</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos del Empleado &raquo; Agregar datos</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$id_cargo		     = mysqli_real_escape_string($con,(strip_tags($_POST["id_cargo"],ENT_QUOTES)));//Escanpando caracteres 
				$id_area		     = mysqli_real_escape_string($con,(strip_tags($_POST["id_area"],ENT_QUOTES)));//Escanpando caracteres 
				$id_suc		     = mysqli_real_escape_string($con,(strip_tags($_POST["id_suc"],ENT_QUOTES)));//Escanpando caracteres 
				$id_pers	 = mysqli_real_escape_string($con,(strip_tags($_POST["id_pers"],ENT_QUOTES)));//Escanpando caracteres 
				$id_cat	 = mysqli_real_escape_string($con,(strip_tags($_POST["id_pers"],ENT_QUOTES)));//Escanpando caracteres 
				$cek = mysqli_query($con, "SELECT * FROM funcionarios WHERE id_pers='$id_pers'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO funcionarios(id_fun,id_cargo,id_area,id_suc,id_pers,id_cat)
															VALUES(1,'$id_cargo','$id_area','$id_suc','$id_pers','$id_cat')") or die(mysqli_error());
						
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. persona ya exite como funcionario!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Cargo</label>
					<div class="col-sm-4">
						<input type="text" name="id_cargo" class="form-control" placeholder="Cargo" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Area</label>
					<div class="col-sm-4">
						<input type="text" name="id_area" class="form-control" placeholder="Área" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Sucursal</label>
					<div class="col-sm-4">
						<input type="text" name="id_suc" class="form-control" placeholder="Sucursal" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Persona</label>
					<div class="col-sm-4">
						<input type="text" name="id_pers" class="form-control" placeholder="Persona" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Catastro</label>
					<div class="col-sm-4">
						<input type="text" name="id_cat" class="form-control" placeholder="Catastro" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>
