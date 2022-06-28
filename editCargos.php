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
	<title>Datos del Cargo</title>

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
			<h2>Datos del Cargo &raquo; Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM cargos WHERE id_cargo='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: listCargos.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$id_cargo		     = mysqli_real_escape_string($con,(strip_tags($_POST["id_cargo"],ENT_QUOTES)));//Escanpando caracteres 
				$cargo_desc		     = mysqli_real_escape_string($con,(strip_tags($_POST["cargo_desc"],ENT_QUOTES)));//Escanpando caracteres 
				$cargo_cod		     = mysqli_real_escape_string($con,(strip_tags($_POST["cargo_cod"],ENT_QUOTES)));//Escanpando caracteres 
				$update = mysqli_query($con, "UPDATE cargos SET id_cargo='$id_cargo', cargo_desc='$cargo_desc', cargo_cod='$cargo_cod' WHERE id_cargo='$id_cargo'") or die(mysqli_error());
				if($update){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Cargo</label>
					<div class="col-sm-2">
						<input type="text" name="id_cargo" value="<?php echo $row ['id_cargo']; ?>" readonly class="form-control" placeholder="1" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Desc. Cargo</label>
					<div class="col-sm-2">
						<input type="text" name="cargo_desc" value="<?php echo $row ['cargo_desc']; ?>" class="form-control" placeholder="Analista" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Cod. Cargo</label>
					<div class="col-sm-2">
						<input type="text" name="cargo_cod" value="<?php echo $row ['cargo_cod']; ?>" class="form-control" placeholder="666" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="listCargos.php" class="btn btn-sm btn-danger">Cancelar</a>
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