<?php 

	require_once 'registrer-controls.php';
	require_once 'requires.php';

	use \VG\Forms\UserRegistrerForm;

	if ( isLogged() ) {
		header('location: perfil.php');
		exit;
	}
		
	$tituloPagina = 'Registro | Valhalla Gaming'; 
	require_once 'partials/head.php';
	require_once 'partials/nav-bar.php';

 	$countries = [
		'ar' => 'Argentina',		
		'br' => 'Brasil',
		'co' => 'Colombia',
		'cl' => 'Chile',
		'ec' => 'Ecuador',
		'pa' => 'Paraguay',
		'pe' => 'Perú',
		'uy' => 'Uruguay',
        've' => 'Venezuela',
        'xx' => 'Otro'
	]; 

	$form = new UserRegistrerForm ($_POST);
	
	$errors = [];

	if ($_POST) {
		if ($form->isValid()) {
			// creo un objeto de usuario
			$user = new User($param1);

			// opcional : creo un objeto de modelo
			

			// le digo al modelo que guarde el user
			$userRepo::save($user);
		}
		$errors = $form->getErrors();
		
		// $errors = validateRegistrerForm($_POST, $_FILES);
		/*
		if ( count($errors) == 0 ) {
			$imageName = saveImage($_FILES['userAvatar']);
			$_POST['avatar'] = $imageName;
			$user = saveUser($_POST);

		}
		*/
	}

?>
		

    <h3>registro</h3>
<div class="container ">    			
	<div class="row justify-content-center">
		<div class="col-12 col-md-8">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group bg-dark rounded text-center ">
					<label> Nombre Completo</label>
					<input type="text" 
					class="form-control  text-center 
					<?= $form->fieldHasErrors('name') ? 'is-invalid' : ''; ?>" 
					name="name" 
					placeholder="Ingrese su nombre completo" 
					value="<?= $form->getName(); ?>">
					<?php if ($form->fieldHasErrors('name')): ?>
					<div class="alert alert-danger">
						<?= $form->getFieldErrors('name') ?>
					</div>
				<?php endif; ?>
				</div>
				<div class="form-group bg-dark rounded text-center ">
					<label>Correo Electronico</label>
					<input 
						type="email" 
						class="form-control text-center 
						<?= $form->fieldHasErrors('email') ? 'is-invalid' : ''; ?>" 
						name="email" 
						placeholder="Ingrese su email"								
						value="<?= $form->getEmail(); ?>">
					<?php if ($form->fieldHasErrors('email')): ?>
					<div class="alert alert-danger">
						<?= $form->getFieldErrors('email') ?>
					</div>
				<?php endif; ?>
				</div>
				<div class="form-group bg-dark rounded text-center ">
					<label>Nombre de Usuario</label>
					<input type="text" 
					name="username" 
					class="form-control text-center 
					<?= $form->fieldHasErrors('username') ? 'is-invalid' : ''; ?>"  placeholder="Ingrese su usuario" 
					value="<?= $form->getUsername(); ?>">
					<?php if ($form->fieldHasErrors('username')): ?>
					<div class="alert alert-danger">
						<?= $form->getFieldErrors('username') ?>
					</div>
				<?php endif; ?>
				</div>
				<div class="form-group bg-dark rounded text-center" 
				data-toggle="tooltip" data-placement="top" 
				title="La contraseña debe tener minimo de 4 caracteres">
						<label>Contraseña</label>
						<input type="password" 
						name="userPassword" 
						class="form-control text-center 
						<?=$form->fieldHasErrors('password') ? 'is-invalid' : ''; ?>" 
						placeholder="Ingrese la contraseña" >
						<?php if ($form->fieldHasErrors('password')): ?>
					<div class="alert alert-danger">
						<?= $form->getFieldErrors('password') ?>
					</div>
				<?php endif; ?>
				</div>
				<div class="form-group bg-dark rounded text-center"  
				data-toggle="tooltip" data-placement="top" 
				title="La contraseña debe tener minimo de 4 caracteres">
						<label>Repita la contraseña</label>
						<input type="password" 
						name="repeatPassword" 
						class="form-control text-center 
						<?=$form->fieldHasErrors('password') ? 'is-invalid' : ''; ?>" 
						placeholder="Repita la contraseña">
						<?php if ($form->fieldHasErrors('password')): ?>
					<div class="alert alert-danger">
						<?= $form->getFieldErrors('password') ?>
					</div>
				<?php endif; ?>
				</div>
				<div class="form-group bg-dark rounded text-center ">
					<label>Pais</label>
					<select class="form-control text-center" name="countryCode" >
						<option value=
						"">Selecciona un pais</option>
						<?php foreach ($countries as $code=>$country): ?>
						<option 
							<?= $code == $form->getCountryCode() ? 'selected' : '' ?>
						value="<?= $code ?>"><?= $country ?></option>
						<?php endforeach; ?>
					</select>
					<?php if ($form->fieldHasErrors('country')): ?>
					<div class="alert alert-danger">
						<?= $form->getFieldErrors('country') ?>
					</div>
				<?php endif; ?>
				</div>
			<div class="form-group bg-dark rounded text-center">
				<label>Imagen de perfil</label>
				<div class="custom-file">
					<input type="file" 
					class="custom-file-input 
					<?=$form->fieldHasErrors('image') ? 'is-invalid' : ''; ?>" name="userAvatar">
					<label class="custom-file-label">Selecciona una imagen</label>
					<?php if ($form->fieldHasErrors('image')): ?>
						<div class="alert alert-danger">
							<?= $form->getFieldErrors('image') ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<div class="form-group">
		<section class="row">
		<button type="submit" class="btn btn-lg btn-dark miBoton  justify-content-center mx-auto">Registrarse</button>
	</form>
</div>
</div>
</div>
</div>


<?php require_once 'partials/footer.php' ?>