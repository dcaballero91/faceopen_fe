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
			<h2>Datos de la Sucursal &raquo; Agregar datos</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$suc_nro		     = mysqli_real_escape_string($con,(strip_tags($_POST["suc_nro"],ENT_QUOTES)));//Escanpando caracteres 
				$suc_desc		     = mysqli_real_escape_string($con,(strip_tags($_POST["suc_desc"],ENT_QUOTES)));//Escanpando caracteres 
				$suc_dir		     = mysqli_real_escape_string($con,(strip_tags($_POST["suc_dir"],ENT_QUOTES)));//Escanpando caracteres 
				
				$cek = mysqli_query($con, "SELECT * FROM sucursales WHERE suc_nro='$suc_nro'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO sucursales(suc_nro, suc_desc, suc_dir)
															VALUES('$suc_nro','$suc_desc', '$suc_dir')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con ??xito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. sucursal ya exite!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Sucursal Nro</label>
					<div class="col-sm-2">
						<input type="text" name="suc_nro" class="form-control" placeholder="1" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripci??n</label>
					<div class="col-sm-4">
						<input type="text" name="suc_desc" class="form-control" placeholder="CAC1" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Direcci??n</label>
					<div class="col-sm-4">
						<input type="text" name="suc_dir" class="form-control" placeholder="Avda Espa??a" required>
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
