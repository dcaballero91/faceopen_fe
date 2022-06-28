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
	<title>Datos de personas</title>

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
			<h2>Datos del persona &raquo; Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM personas WHERE pers_ci='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: listPersona.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$pers_ci		     = mysqli_real_escape_string($con,(strip_tags($_POST["pers_ci"],ENT_QUOTES)));//Escanpando caracteres 
				$id_pers		     = mysqli_real_escape_string($con,(strip_tags($_POST["id_pers"],ENT_QUOTES)));//Escanpando caracteres 
				$nombres		     = mysqli_real_escape_string($con,(strip_tags($_POST["pers_nom"],ENT_QUOTES)));//Escanpando caracteres 
				$apellido		     = mysqli_real_escape_string($con,(strip_tags($_POST["pers_ape"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha_nacimiento	 = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_nacimiento"],ENT_QUOTES)));//Escanpando caracteres 
				$direccion	 = mysqli_real_escape_string($con,(strip_tags($_POST["pers_dir"],ENT_QUOTES)));//Escanpando caracteres 
				$pers_estado			 = mysqli_real_escape_string($con,(strip_tags($_POST["pers_estado"],ENT_QUOTES)));//Escanpando caracteres 
				$update = mysqli_query($con, "UPDATE personas SET pers_ci='$pers_ci', pers_nom='$nombres', pers_ape='$apellido', pers_fecnac='$fecha_nacimiento', pers_dir='$direccion',pers_estado='$pers_estado' WHERE id_pers='$id_pers'") or die(mysqli_error());
				if($update){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Código</label>
					<div class="col-sm-2">
						<input type="text" name="id_pers" value="<?php echo $row ['id_pers']; ?>" class="form-control" placeholder="1" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">CI</label>
					<div class="col-sm-2">
						<input type="text" name="pers_ci" value="<?php echo $row ['pers_ci']; ?>" class="form-control" placeholder="1234567" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="pers_nom" value="<?php echo $row ['pers_nom']; ?>" class="form-control" placeholder="Juan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellido</label>
					<div class="col-sm-4">
						<input type="text" name="pers_ape" value="<?php echo $row ['pers_ape']; ?>" class="form-control" placeholder="Pérez" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha de Nacimiento</label>
					<div class="col-sm-4">
						<input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
					</div>
				</div>
			    <div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-4">
						<input type="text" name="pers_dir" value="<?php echo $row ['pers_dir']; ?>" class="form-control" placeholder="Avda. Santa Teresa" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-3">
						<select name="pers_estado" class="form-control">
							<option value="">- Selecciona estado -</option>
                            <option value="A" <?php if ($row ['pers_estado']==A){echo "selected";} ?>>Activo</option>
							<option value="I" <?php if ($row ['pers_estado']==I){echo "selected";} ?>>Inactivo</option>
						</select> 
					</div>
                   
                </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="listPersona.php" class="btn btn-sm btn-danger">Cancelar</a>
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