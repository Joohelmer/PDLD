<!DOCTYPE html>
<html>
<head>
	<title><?= $evenement->titre ?></title>
	<meta name="title" 			content="<?= $evenement->seotitle ?>"/>
	<meta name="description" 	content="<?= $evenement->seodescription ?>"/>
	<meta name="keywords" 		content="<?= $evenement->seokeywords ?>"/>
	<?php $this->load->view('modules/meta+css.php'); ?>
	 <link href="<?php echo base_url('/assets/css/owl.carousel.css') ?>" rel="stylesheet" type="text/css" />


    <!-- Facebook -->
    <meta property="og:title" 								content="<?= $evenement->titre ?>"/>
    <meta property="og:type" 								content="restaurant.restaurant"/>
    <meta property="og:url" 								content="<?= base_url('restaurant').'/'.$evenement->id.'/'.url_title($evenement->titre) ?>"/>
    <meta property="og:image" 								content="<?php echo base_url('assets/uploads/').'/'. $evenement->image1; ?>"/>
    <meta property="og:description" 						content="<?= strip_tags ($evenement->description) ?>" />
	<meta property="restaurant:contact_info:street_address" content="<?= $evenement->adresse ?>" /> 
	<meta property="restaurant:contact_info:locality"       content="<?= $evenement->ville ?>" /> 
	<meta property="restaurant:contact_info:region"         content="Drôme" /> 
	<meta property="restaurant:contact_info:postal_code"    content="<?= $evenement->cp ?>" /> 
	<meta property="restaurant:contact_info:country_name"   content="France" />
	<!--<meta property="restaurant:contact_info:email"          content="<?= $evenement->mail ?>" />
	<meta property="restaurant:contact_info:phone_number"   content="<?= $evenement->telephone ?>" /> 
	<meta property="restaurant:contact_info:website"        content="<?= $evenement->site ?>" />-->
	<meta property="place:location:latitude"                content="<?= $evenement->latitude ?>" /> 
	<meta property="place:location:longitude"               content="<?= $evenement->longitude ?>" /> 
</head>

<body>
<?php $this->load->view('modules/header.php'); ?>

<main class="content">
	<!-- START .filariane -->
    <div class="filariane">
        <ol class="breadcrumb">
        Vous êtes ici :
            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a title="Pays de la Drôme" href="<?php echo base_url(); ?>" itemprop="url">
                    <span itemprop="title">Pays de la Drôme</span>
                </a>
            </li>
            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a title="Événements" href="<?php echo $url_retour ?>" itemprop="url">
                    <span itemprop="title">Événements</span>
                </a>
            </li>  
            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a title="<?= $evenement->titre ?>" itemprop="url">
                    <span itemprop="title"><?= $evenement->titre ?></span>
                </a>
            </li> 
        </ol>            
    </div>
    <!-- END .filariane -->
    <div class="container">
    	<div class="row">
			<br/>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<h1><?= $evenement->titre ?></h1>
				<div class="ville"><h2><i class="fa fa-map-marker"></i> <?= $evenement->titre ?>, situé à <?= $evenement->ville ?></h2></div>
				<br/>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
				<a class="back_url text-upper btn btn-primary" title="Retour vers la page des événements" href="<?php echo $url_retour ?>"><i class="fa fa-chevron-left"></i> Retour</a>
			</div>
		</div>
    </div>
    <div class="bg-grey">
    	<div class="container">
    		<div class="row">
    		<div class="col-md-8">
    			<div class="owl-carousel">
		        	<?php if($evenement->image1 != ''){ ?>
		            	<div class="item">
		            		<img src="<?php echo asset_url('uploads/').'/'. $evenement->image1; ?>" alt="<?php echo $evenement->titre; ?>" /></a>
		            	</div>
			       	<?php } ?>
				</div>
				<div class="description">
					<?= $evenement->description ?>
				</div>
    		</div>
    		<aside class="col-md-4">
    			<div class="static_map">
    				<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?= $evenement->latitude ?>,<?= $evenement->longitude ?>&zoom=14&size=390x245&maptype=roadmap&markers=color:pink%7C<?= $evenement->latitude ?>,<?= $evenement->longitude ?>&language=fr_FR&key=AIzaSyDIl4kZLNyfm86Q9hmfU6J32PnxQ5GFB2g">
    				<div title="Voir sur la carte" onclick="showMap('evenements',<?= $evenement->id; ?>);" class="extend"><i class="fa fa-eye"></i> Voir sur la carte</div>
    			</div>
    			<div class="detail_section">
    				<h3>Informations</h3>
    				<div class="info_wrapper">
    					<div class="business" itemscope="" itemtype="http://schema.org/LocalBusiness">
							<span itemprop="name"><?= $evenement->titre ?></span>
						</div>
						<address>
							<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
								<span class="format_address">
									<span itemprop="streetAddress"><?= $evenement->adresse ?></span>, 
									<span itemprop="postalCode"><?= $evenement->cp ?></span>, 
									<span itemprop="addressLocality"><?= $evenement->ville ?></span>, 
									<span itemprop="addressCountry">France</span>
									<span itemprop="addressRegion" content="Drôme"></span>
								</span>
							</span>
						</address>
						<div class="contact_info">

						</div>
					</div>
    			</div>
    		</aside>
    		</div>
    	</div>
    	<?php if(!empty($arounds)){ ?>
		    <div id="more">
		    	<div class="container">
		    		<h4>Pas loin de chez vous...</h4>
		    		<ul>
				    	<?php foreach ($arounds as $around) { ?>
				    		<li><a title="<?= $around->titre ?>" href="<?php echo base_url('evenement').'/'.$around->id.'/'.url_title($around->titre); ?>"><?= $around->titre ?></a></li>
				    	<?php } ?>
		    		</ul>
		    	</div>
		    </div>
	    <?php } ?>
    </div>
</main>

<?php $this->load->view('modules/footer.php'); ?>
<?php $this->load->view('modules/js.php'); ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/maps/singleMap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/owl.carousel.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {


	var item_amount = parseInt($('.owl-carousel').find('.item').length ); 
	var true_false = 0;

	if (item_amount <=1 ) {
		true_false = false;
	}else {
		true_false = true;
	}

    $('.owl-carousel').owlCarousel({
    	loop: true_false,
        margin:0,
        nav:true,
        dots:false,
        navText:[
          "<i class='previous'></i>",
          "<i class='next'></i>"
        ],
        pagination:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});
</script>
</body>
</html>
