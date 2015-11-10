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
    	<div class="col-md-5 col-xs-12">
    		<div class="feature-title">
				<h2 class="title_underline">Inscription</h2>
			</div>
		</div>
		<div class="col-md-8 col-xs-12 ">
			<p>Rappel : la seule condition requise pour être présent sur le site www.ardeche-tourisme.com est d'être inscrit au Registre du Commerce et des Sociétés en tant qu'entreprise. Nous prenons le soin de vérifier toutes les fiches avant publication et ne validerons pas celles dont le RCS n'est pas enregistré.</p>

			<?php echo alert_box(); ?>
			<form method="post" action="<?php echo base_url('mot-de-passe-oublie'); ?>">
				<div class="row form-group has-feedback">
					<div class="col-xs-12 col-sm-6">
                    	<input placeholder="Nom" class="form-control" name="nom" required type="text" autocomplete="off" />
                	</div>
                	<div class="col-xs-12 col-sm-6">
                    	<input placeholder="Prénom" class="form-control" name="prenom" required type="text" autocomplete="off" />
                	</div>
                </div>
                <div class="row form-group has-feedback">
                    <div class="col-xs-12 col-sm-6">
                		<input placeholder="Adresse email" class="form-control" name="mail" required type="email" autocomplete="off" />
                	</div>
                	<div class="col-xs-12 col-sm-6">
                		<input placeholder="Téléphone" class="form-control" name="telephone" required type="texte" autocomplete="off" />
                	</div>
                </div>
                <div class="row form-group has-feedback">
                	<div class="col-xs-12 col-sm-6">
                		<select name="type" class="form-control">
                			<option disabled selected>Sélectionner un type</option>
                			<option value="restaurateur">Restaurateur</option>
                			<option value="hôtelier">Hôtelier</option>
                			<option value="commercant">Commerçant</option>
                		</select>
                	</div>
                	<div class="col-xs-12 col-sm-6">
                		<input placeholder="RCS" class="form-control" name="rcs" required type="texte" autocomplete="off" />
                	</div>
                </div>
				<div class="row form-group has-feedback">
                    <div class="col-xs-12 col-sm-6">
                    	<input placeholder="Mot de passe" class="form-control" name="password" required type="password" autocomplete="off" />
                	</div>
                	<div class="col-xs-12 col-sm-6">
                    	<input placeholder="Confirmer le mot de passe" class="form-control" name="repassword" required type="password" autocomplete="off" />
                	</div>
                </div>
                <br/>
                <input type="submit" name="submitMonCompte" class="text-upper btn btn-primary" value="Valider">
            </form>
            
		</div>
    </div>
</main>

<?php $this->load->view('modules/footer.php'); ?>
<?php $this->load->view('modules/js.php'); ?>

</body>
</html>
