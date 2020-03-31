<div class="container">
	<div class="row">
		<main class="col-lg-4 offset-lg-4 mt-5">
			<form class="card py-3 shadow-lg" action="<?=base_url()?>Main/validar_login" method="post" id="login_form">
				<div class="card-title">
					<h1 class="text-center">Iniciar sesión</h1>
					<p class="text-muted text-center">Para acceder al sistema debes iniciar sesión</p>
				</div>
				<div class="card-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" id="email" name="email"
							   placeholder="Correo electrónico" aria-label="Correo electrónico">
					</div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="password" name="password"
							   placeholder="Contraseña" aria-label="Contraseña" maxlength="30">
					</div>
					<div class="input-group mt-3">
						<button class="btn btn-tomato w-100" type="submit">
							Iniciar sesión
						</button>
					</div>
				</div>
			</form>
		</main>
	</div>
</div>
