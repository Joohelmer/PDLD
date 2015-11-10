
<div class="login-box">

	<div class="login-logo"><b>Pays de la Drôme</b></div>

	<div class="login-box-body">
		<?php echo alert_box(); ?>
		<p class="login-box-msg">Entrer vos identifiants</p>
		<form action="<?php echo site_url('login'); ?>" method="POST">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="username" placeholder="Username" value="<?php if (ENVIRONMENT=='development') echo 'admin'; ?>" />
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" value="<?php if (ENVIRONMENT=='development') echo 'admin'; ?>" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<!--<label><input type="checkbox" name="remember_me"> Remember Me</label>-->
				</div>
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
				</div>
			</div>
		</form>

	</div>

</div>