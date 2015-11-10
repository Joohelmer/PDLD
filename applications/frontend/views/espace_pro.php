<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="title" content=""/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<?php $this->load->view('modules/meta+css.php'); ?>
</head>

<body>
<?php $this->load->view('modules/header.php'); ?>

<main id="content">
    <div class="container">
    	<h1 class="text-center text-upper">Espace professionnel</h1>
    	<div class="col-md-5">
    		<div class="feature-title">
				<h2 class="title_underline">Connexion</h2>
			</div>
	        <form action="<?php echo base_url('backend.php/login/LoginParticulier') ?>" method="POST">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" placeholder="Adresse Email" value="admin">
				</div>
				<br/>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Mot de passe" value="admin">
				</div>
				<br/>
				<button type="submit" class="text-upper btn btn-primary">Connexion</button>
				<a href="<?php echo base_url('mot-de-passe-oublie') ?>" class="pull-right btn btn-primary text-upper">Mot de passe oublié</a>
			</form>
		</div>
		<div class="col-md-5 col-md-offset-2 col-xs-offset-0">
			<div class="feature-title">
				<h2 class="title_underline">S'inscrire</h2>
			</div>
			<p><b>La seule condition requise pour être présent sur le site www.pays-de-la-drome.com est d'être inscrit au Registre du Commerce et des Sociétés en tant qu'entreprise.</b><br> Nous prenons le soin de vérifier toutes les fiches avant publication et ne validerons pas celles dont le RCS n'est pas enregistré.</p>
			<a href="<?php echo base_url('inscription') ?>" class="btn btn-primary text-upper">Inscription</a>
		</div>
    </div>
</main>

<?php $this->load->view('modules/footer.php'); ?>
<?php $this->load->view('modules/js.php'); ?>

</body>
</html>
