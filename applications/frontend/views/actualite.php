<!DOCTYPE html>
<html>
<head>
	<title><?= $actualite->titre ?></title>
	<meta name="title" content="<?= $actualite->seo_title ?>"/>
	<meta name="description" content="<?= $actualite->seo_description ?>"/>
	<meta name="keywords" content="<?= $actualite->seo_keywords ?>"/>
	<?php $this->load->view('modules/meta+css.php'); ?>
	<link href="<?php echo base_url('/assets/css/jquery.bxslider.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/css/flexslider.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Facebook -->
    <meta property="og:title" content="<?= $actualite->seo_title ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?= base_url('actualite').'/'.$actualite->id.'/'.url_title($actualite->titre).'.html' ?>"/>
    <meta property="og:image" content="<?php echo base_url('assets/uploads/').'/'. $actualite->photo_miniature; ?>"/>
    <meta property="og:description" content="<?= strip_tags ($actualite->contenu) ?>" />
</head>

<body>
<?php $this->load->view('modules/header.php'); ?>

<main class="content">
    <div class="container">
          
    </div>
</main>

<?php $this->load->view('modules/footer.php'); ?>
<?php $this->load->view('modules/js.php'); ?>

<script type="text/javascript" src="<?php echo base_url('/assets/js/imagesloaded.min.js') ?>" ></script>

</body>
</html>
