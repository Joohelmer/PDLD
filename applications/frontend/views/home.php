<!DOCTYPE html>
<html>
<head>
	<title><?= $seo->titre ?></title>
	<meta name="title" content="<?= $seo->seo_title ?>"/>
	<meta name="description" content="<?= $seo->seo_description ?>"/>
	<meta name="keywords" content="<?= $seo->seo_keywords ?>"/>
	<?php $this->load->view('modules/meta+css.php'); ?>
	<link href="<?php echo base_url('/assets/css/jquery.bxslider.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/css/flexslider.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>

<body>
<?php $this->load->view('modules/header.php'); ?>

<main id="content">
    <!-- START #slider -->
    <div id="slider" class="hidden-xs" style="overflow: visible;">
        <ul class="bxslider">
            <?php foreach ($sliders as $slider) { ?>
                <li><img src="<?php echo base_url('assets/uploads').'/'.$slider->image; ?>" alt="<?= $slider->alt_image ?>" /></li>
            <?php } ?>
        </ul>
    </div>
    <!-- END #slider -->
    <!-- START .content -->
    <div class="content">
        <div class="container" id="home-page">
            <div class="recherche">
                <h1>Votre séjour et vacances en Drôme: restauration, hébergement</h1>
                <form action="<?php echo base_url('').'recherche?'; ?>" method="GET">
                    <div class="input-group">
                        <div class="hidden-xs input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">Tout</span> <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#restaurants">Restaurants</a></li>
                                <li><a href="#evenements">Événements</a></li>
                                <li class="divider"></li>
                                <li><a href="#tout">Tout</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="tout" id="search_param">  
                        <input class="form-control" type="text" id="recherche" name="query" value="" autocomplete="off">
                        <span class="input-group-btn confirmsearch">
                            <button type="submit" class="btn btn-default" type="button"><i class="fa fa-2x fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            <div class="carousel">
                <ul class="slides">
                    <li class="">
                        <h2 class="text-upper">Les restaurants de la région</h2>
                        <div class="row">
                            <?php foreach ($restaurants as $restaurant) { ?>                            
                            <div class="col-md-4">
                                <div class="ft-item">
									<span class="ft-image">
										<img src="<?php echo base_url('assets/uploads/').'/'.$restaurant->image1; ?>" alt="featured Scroller" draggable="false">
									</span>
                                    <div class="ft-data">
                                        <a class="ft-name text-upper" href="<?php echo base_url('restaurant').'/'.$restaurant->id.'/'.url_title($restaurant->titre); ?>"><?= $restaurant->titre ?></a>
                                        <a class="ft-type"><i class="fa fa-cutlery"></i> Restaurant</a>
                                    </div>
                                    <div class="ft-foot">
                                        <p class="ft-title">Situé à <a title="Voir les restaurants situé à <?= $restaurant->ville ?>" class="text-upper" href="<?php echo base_url('restaurants/ville').'/'.$restaurant->ville ?>"><?= $restaurant->ville ?></a></p>
                                        <div class="ft-map" onclick="showMap('restaurants',<?= $restaurant->id; ?>);">Voir sur la carte</div>
                                    </div>
                                </div>       
                            </div>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
        </div>
    </div>
        <!-- END .content -->
        <!-- START .content -->
    <div class="content bg-grey">
        <div class="container">
            <div class="row">
                <!-- Actualités -->
                <div class="col-md-8">
                    <h4 class="text-center text-upper">Actualités</h4>
                    <?php foreach ($actualites as $actualite) { ?>
                    <section class="col-md-6 fd-column">
                        <div class="featured-dest">
								<span class="fd-image">
									<img class="img-circle" src="<?php echo base_url('assets/uploads/').'/'. $actualite->photo_miniature; ?>" onerror="this.src='<?php echo base_url('assets/images/unnamed.png') ?>';" alt="<?= $actualite->titre ?>">
								</span>
                            <h3 class="text-center text-upper"><?= $actualite->titre ?></h3>

                            <div class="text-center"><?= mb_word_wrap($actualite->contenu, 150,'...',false) ?></div>
                            <span class="btn-center"><a class="btn btn-primary text-upper" href="<?php echo base_url('actualite').'/'.$actualite->id.'/'.url_title($actualite->titre) ?>" title="Lire la suite">Lire la suite</a></span>
                        </div>
                    </section>
                    <?php } ?>
                    <div class="clear"></div>
                    <span class="btn-center"><a class="btn btn-primary text-upper" href="<?php echo base_url('actualites') ?>" title="Toutes les actulités">Toutes les actulités</a></span>
                </div>
                <!-- Evénements -->
                <section class="col-md-4">
                    <!--<div class="pub gray">
                        PUB
                    </div>-->
                    <div class="styled-box gray">
                        <h4 class="text-upper">Événements</h4>
                        <ul class="events-list list-unstyled">
                        <?php if($evenements){ ?>
                            <?php foreach ($evenements as $evenement) { ?>                          
                                <li>
                                    <a title="<?= $evenement->titre ?> à <?= $evenement->ville ?>" href="<?php echo base_url('evenement/').'/'.$evenement->id.'/'.url_title($evenement->titre) ?>">
                                        <span class="event-image">
                                            <img class="img-responsive" src="<?php echo base_url('assets/uploads/').'/'.$evenement->image1; ?>" alt="<?= $evenement->titre ?>">
                                        </span>
                                        <h5><a title="<?= $evenement->titre ?> à <?= $evenement->ville ?>" class="event-link" href="<?php echo base_url('evenement/').'/'.$evenement->id.'/'.url_title($evenement->titre) ?>"><?= $evenement->titre ?> <br/> <?= $evenement->ville ?></a></h5>
                                        <span class="event-date">Du  <?= date("d-m-Y", strtotime($evenement->debut)); ?> au <?= date("d-m-Y", strtotime($evenement->fin)); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                                <p>Aucun évenement pour le momment.</p>
                        <?php } ?>
                        </ul>
                    </div>
                    <div><span class="btn-center"><a class="btn btn-primary text-upper" href="<?php echo base_url('evenements') ?>" title="Tous les événements">Tous les événements</a></span></div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php $this->load->view('modules/footer.php'); ?>

<?php $this->load->view('modules/js.php'); ?>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.bxslider.js') ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.flexslider.js') ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/home.js') ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/maps/singleMap.js'); ?>"></script>
</body>
</html>
