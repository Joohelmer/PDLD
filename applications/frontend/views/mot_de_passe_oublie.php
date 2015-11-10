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
				<h2 class="title_underline">Demande de nouveau mot de passe</h2>
			</div>
			<form method="post" action="<?php echo base_url('mot-de-passe-oublie'); ?>">
				<div class="form-group has-feedback">
                    <input placeholder="Entrer votre adresse email" class="form-control" name="mail" required type="email" autocomplete="off" />
                </div>
                <br/>
                <input type="submit" name="submitMonCompte" class="text-upper btn btn-primary" value="Valider">
            </form>
            <?php echo alert_box(); ?>
		</div>
    </div>
</main>

<?php $this->load->view('modules/footer.php'); ?>
<?php $this->load->view('modules/js.php'); ?>

</body>
</html>
