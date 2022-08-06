<!DOCTYPE html>
<html>
<head>
	<title>MarkCRM | Grupo SETIC</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="admin/images/favicon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css"/>

	<!-- Styling -->
	<!-- <link rel="stylesheet" href="admin/addons/bootstrap/css/bootstrap.css"/> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/addons/toastr/toastr.min.css"/>
	<link rel="stylesheet" href="admin/addons/fontawesome/css/font-awesome.css"/>
	<link rel="stylesheet" href="admin/addons/ionicons/css/ionicons.css"/>
	<link rel="stylesheet" href="admin/addons/noUiSlider/nouislider.min.css"/>

	<link rel="stylesheet" href="admin/styles/style.css"/>
	<link rel="stylesheet" href="admin/styles/theme-dark.css" class="theme"/>
	<!-- End of Styling -->

	<!--Swwetalert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	<style>
		.modal-backdrop {
			--bs-backdrop-zindex: 1050;
			--bs-backdrop-bg: #000;
			--bs-backdrop-opacity: 0.5;
			position: fixed;
			top: 0;
			left: 0;
			z-index: var(--bs-backdrop-zindex);
			width: 100vw;
			height: 0vh !important;
			background-color: var(--bs-backdrop-bg);
		}
	</style>
</head>

<body>
	<!-- Main content-->
	<div class="content" id="login-page">
		<div class="container-fluid">
			<div class="panel" id="login-panel">
				<!-- <div class="panel-heading">
					<i class="fa fa-lock vcentered"></i>
					<div class="vcentered">
						<h3> Disculpa la molestia </h3>
						<h4> El sistema estara en mantenimiento por un lapso de 24 horas, apenas regrese en funcion se les notificara:</h4>
						<h5> Cualquier duda comunicate al 999-141-6887. Gracias!</h5>
					</div>
				</div> -->
				<div class="panel-heading">
					<i class="fa fa-unlock-alt vcentered"></i>
					<div class="vcentered">
						<h3> Bienvenido </h3>
						<h5> Por favor, identifícate:</h5>
					</div>
				</div>
				<div class="panel-body">
					<form class="row" id="LoginForm">
						<div class="form-wrapper col-sm-6">
							<label for="Login">Correo</label>
							<div class="form-group">
								<input type="text" class="form-control" name="usuario" placeholder="Correo">
							</div>
						</div>

						<div class="form-wrapper col-sm-6">
							<label for="Password">Contraseña</label>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Contraseña">
							</div>
						</div>

						<button type="button" class="btn btn-lg btn-success btn-block" style="margin-top: 30px" id="boton_enviar_login" onClick="fnvalidar()"><i class="fa fa-sign-in"></i> Entrar</button>
						<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Regristrarse</a>
					</form>
				</div>
				<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title" id="exampleModalToggleLabel">Nuevo registro</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<form action="" id="frmRegistro">
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12 top10">
											<label for="" class="h5">Nombre de la empresa</label>
											<input type="text" class="form-control" name="empresa" id="empresa" value="" placeholder="Ingresa el nombre de la empresa">
										</div>
										<div class="col-sm-12 top10">
											<label for="" class="h5">Nombre(s)</label>
											<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" value="">
										</div>
										<div class="col-sm-6 top10">
											<label for="" class="h5">Apellido Paterno</label>
											<input type="text" name="paterno" id="paterno" class="form-control" placeholder="Ingrese su apellido paterno" value="">
										</div>
										<div class="col-sm-6 top10">
											<label for="" class="h5">Apellido Materno</label>
											<input type="text" name="materno" id="materno" class="form-control" placeholder="Ingrese su apellido materno" value="">
										</div>
										<div class="col-sm-6 top10">
											<label for="" class="h5">Fecha de nacimiento</label>
											<input type="date" name="fch_nacimiento" id="fch_nacimiento" class="form-control" value="">
										</div>
										<div class="col-sm-6 top10">
											<label for="" class="h5">Télefono</label>
											<input type="text" name="telefono" id="telefono" class="form-control" placeholder="(xxx) xxx xxx xxx" value="">
										</div>
										<div class="col-sm-12 top10">
											<label for="" class="h5">Correo Electronico</label>
											<input type="email" name="correo" id="correo" class="form-control" value="">
										</div>
										<div class="col-sm-12 top10">
											<label for="" class="h5">Contraseña</label>
											<input type="password" name="password" id="password" class="form-control" value="">
										</div>
										<div class="col-sm-12 top10">
											<label for="" class="h5">Confirmar contraseña</label>
											<input type="password" name="confpassword" id="confpassword" class="form-control" value="">
										</div>
										<div class="col-sm-12">
											<label for="">Ver contraseña</label>
											<input type="checkbox" class="form-check" name="verpass" id="verpass">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-primary" onClick="nuevoRegistro();">Registrarme</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Main content-->

	<div class="scripts">

		<!-- Addons -->
		<script src="admin/addons/jquery/jquery.min.js"></script>
		<script src="admin/addons/jquery-ui/jquery-ui.min.js"></script>
		<!-- <script src="admin/addons/bootstrap/js/bootstrap.min.js"></script> -->
		<script src="admin/addons/toastr/toastr.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<!-- scripts -->
		<script src="admin/addons/scripts.js"></script>
		<!-- SwwetAlert -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<!-- FUNCIONES -->
        <script type="text/javascript" src="admin/js/funciones.js"></script> 
	</div>

</body>

</html>