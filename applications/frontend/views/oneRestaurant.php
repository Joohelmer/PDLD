<!DOCTYPE html>
<html>
<head>
	<title><?= $restaurant->titre ?></title>
	<meta name="title" 			content="<?= $restaurant->seotitle ?>"/>
	<meta name="description" 	content="<?= $restaurant->seodescription ?>"/>
	<meta name="keywords" 		content="<?= $restaurant->seokeywords ?>"/>
	<?php $this->load->view('modules/meta+css.php'); ?>
	 <link href="<?php echo base_url('/assets/css/owl.carousel.css') ?>" rel="stylesheet" type="text/css" />


    <!-- Facebook -->
    <meta property="og:title" 								content="<?= $restaurant->titre ?>"/>
    <meta property="og:type" 								content="restaurant.restaurant"/>
    <meta property="og:url" 								content="<?= base_url('restaurant').'/'.$restaurant->id.'/'.url_title($restaurant->titre) ?>"/>
    <meta property="og:image" 								content="<?php echo base_url('assets/uploads/').'/'. $restaurant->image1; ?>"/>
    <meta property="og:description" 						content="<?= strip_tags ($restaurant->description) ?>" />
	<meta property="restaurant:contact_info:street_address" content="<?= $restaurant->adresse ?>" /> 
	<meta property="restaurant:contact_info:locality"       content="<?= $restaurant->ville ?>" /> 
	<meta property="restaurant:contact_info:region"         content="Drôme" /> 
	<meta property="restaurant:contact_info:postal_code"    content="<?= $restaurant->cp ?>" /> 
	<meta property="restaurant:contact_info:country_name"   content="France" /> 
	<meta property="restaurant:contact_info:email"          content="<?= $restaurant->mail ?>" /> 
	<meta property="restaurant:contact_info:phone_number"   content="<?= $restaurant->telephone ?>" /> 
	<meta property="restaurant:contact_info:website"        content="<?= $restaurant->site ?>" /> 
	<meta property="place:location:latitude"                content="<?= $restaurant->latitude ?>" /> 
	<meta property="place:location:longitude"               content="<?= $restaurant->longitude ?>" /> 
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
                <a title="Se restaurer" href="<?php echo $url_retour ?>" itemprop="url">
                    <span itemprop="title">Se restaurer</span>
                </a>
            </li>  
            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a title="<?= $restaurant->titre ?>" itemprop="url">
                    <span itemprop="title"><?= $restaurant->titre ?></span>
                </a>
            </li> 
        </ol>            
    </div>
    <!-- END .filariane -->
    <div class="container">
    	<div class="row">
			<br/>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<h1><?= $restaurant->titre ?></h1>
				<div class="ville"><h2><i class="fa fa-map-marker"></i> <?= $restaurant->titre ?>, situé à <?= $restaurant->ville ?></h2></div>
				<br/>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
				<a class="back_url text-upper btn btn-primary" title="Retour vers la page des restaurants" href="<?php echo $url_retour ?>"><i class="fa fa-chevron-left"></i> Retour</a>
			</div>
		</div>
    </div>
    <div class="bg-grey">
    	<div class="container">
    		<div class="row">
    		<div class="col-md-8">
    			<div class="owl-carousel">
		        	<?php if($restaurant->image1 != ''){ ?>
		            	<div class="item">
		            		<img src="<?php echo asset_url('uploads/').'/'. $restaurant->image1; ?>" alt="<?php echo $restaurant->titre; ?>" /></a>
		            	</div>
			       	<?php } ?>
			       	<?php if($restaurant->image2 != ''){ ?>
		            	<div class="item">
		            		<img src="<?php echo asset_url('uploads/').'/'. $restaurant->image2; ?>" alt="<?php echo $restaurant->titre; ?>" /></a>
		            	</div>
			       	<?php } ?>
			       	<?php if($restaurant->image3 != ''){ ?>
		            	<div class="item">
		            		<img src="<?php echo asset_url('uploads/').'/'. $restaurant->image3; ?>" alt="<?php echo $restaurant->titre; ?>" /></a>
		            	</div>
			       	<?php } ?>
			       	<?php if($restaurant->image4 != ''){ ?>
		            	<div class="item">
		            		<img src="<?php echo asset_url('uploads/').'/'. $restaurant->image4; ?>" alt="<?php echo $restaurant->titre; ?>" /></a>
		            	</div>
			       	<?php } ?>
			       	<?php if($restaurant->image5 != ''){ ?>
		            	<div class="item">
		            		<img src="<?php echo asset_url('uploads/').'/'. $restaurant->image5; ?>" alt="<?php echo $restaurant->titre; ?>" /></a>
		            	</div>
			       	<?php } ?>
				</div>
				<div class="description">
					<?= $restaurant->description ?>
				</div>
    		</div>
    		<aside class="col-md-4">
    			<div class="static_map">
    				<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?= $restaurant->latitude ?>,<?= $restaurant->longitude ?>&zoom=14&size=390x245&maptype=roadmap&markers=color:pink%7C<?= $restaurant->latitude ?>,<?= $restaurant->longitude ?>&language=fr_FR&key=AIzaSyDIl4kZLNyfm86Q9hmfU6J32PnxQ5GFB2g">
    				<div title="Voir sur la carte" onclick="showMap('restaurants',<?= $restaurant->id; ?>);" class="extend"><i class="fa fa-eye"></i></div>
    			</div>
    			<div class="detail_section">
    				<h3>Informations</h3>
    				<div class="info_wrapper">
    					<div class="business" itemscope="" itemtype="http://schema.org/LocalBusiness">
							<span itemprop="name"><?= $restaurant->titre ?></span>
						</div>
						<address>
							<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
								<span class="format_address">
									<span itemprop="streetAddress"><?= $restaurant->adresse ?></span>, 
									<span itemprop="postalCode"><?= $restaurant->cp ?></span>, 
									<span itemprop="addressLocality"><?= $restaurant->ville ?></span>, 
									<span itemprop="addressCountry">France</span>
									<span itemprop="addressRegion" content="Drôme"></span>
								</span>
							</span>
						</address>
						<div class="contact_info">
							<?php if($restaurant->telephone != ""){ ?>
								<span class="phoneNumber"><i class="fa fa-mobile"></i> <?= $restaurant->telephone ?></span>
							<?php } ?>
							<?php if($restaurant->site != ""){ ?>
								<a target="_blank" class="website" href="<?= $restaurant->site ?>"><span><i class="fa fa-laptop"></i> Site Web</span></a> 
							<?php } ?>
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
				    		<li><a title="<?= $around->titre ?>" href="<?php echo base_url('restaurant').'/'.$around->id.'/'.url_title($around->titre); ?>"><?= $around->titre ?></a></li>
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
