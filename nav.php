

	<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Inicio</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav ">
					<li>
    					<a href="index.php"><i class="fa fa-th-large"></i> Inicio</a>
  					</li>
  					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Cargar <span class="caret"></span></a>
					    
					    <ul class="dropdown-menu nav nav-second-level">
					      <li><a href="addPersona.php">Persona</a></li>
					      <li><a href="addEmpleados.php">Empleados</a></li>
					      <li><a href="addSucursales.php">Sucursales</a></li>
					      <li><a href="addCargos.php">Cargos</a></li>
					      <li><a href="addArea.php">Area</a></li>
					    </ul>
					  </li>
					 
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Listar <span class="caret"></span></a>
					    <ul class="dropdown-menu nav nav-second-level">
					      <li><a href="listPersona.php">Persona</a></li>
					      <li><a href="listEmpleados.php">Empleados</a></li>
					      <li><a href="listSucursales.php">Sucursales</a></li>
					      <li><a href="listCargos.php">Cargos</a></li>
					      <li><a href="listArea.php">Area</a></li>
					    </ul>
					  </li>
  					</li>
  					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Catastro <span class="caret"></span></a>
					    <ul class="dropdown-menu nav nav-second-level">
					      <li><a href="listCatastro.php">Listar</a></li>
					      <li><a href="addCatastro.php">Nuevo</a></li>
					    </ul>
  					</li>
  					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Asistencia <span class="caret"></span></a>
					    <ul class="dropdown-menu nav nav-second-level">
					      <li><a href="listMarca.php">Listar</a></li>
					    </ul>
  					</li>
  					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Sistema <span class="caret"></span></a>
					    <ul class="dropdown-menu nav nav-second-level">
					    	<?php 
							//only visible to admin and editor
						  if($_SESSION['rol_desc'] == 'Admin'){?>
					      <li><a href="addUsuario.php">Cargar Usuario</a></li>
					      <li><a href="listUsuarios.php">Listar Usuario</a></li>
					      <li><a href="addRol.php">Cargar Rol</a></li>
					      <li><a href="listRol.php">Listar Rol</a></li>
					      <?php }?>
					    </ul>
					    <li>
    					<a href="logout.php"><i class="fa fa-th-large"></i> Salir</a>
  					</li>
				</ul>
			</div><!--/.nav-collapse -->
	</div>
