<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="title" content=""/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<?php $this->load->view('modules/meta+css.php'); ?>
    <link href="<?php echo base_url('/assets/css/jquery.selectbox.css') ?>" rel="stylesheet" type="text/css" />

</head>

<body>
<?php $this->load->view('modules/header.php'); ?>

<main id="content">
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
                    <a title="Se divertir" href="<?php echo base_url('activites'); ?>" itemprop="url">
                        <span itemprop="title">Se divertir</span>
                    </a>
                </li>  
                <?php if($this->uri->segment(2) == 'ville' && $this->uri->segment(3) && !is_numeric ($this->uri->segment(3))){  ?> 
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a title="Activites à <?= $this->uri->segment(3) ?>" href="<?php echo $_SERVER['REQUEST_URI']; ?>" itemprop="url">
                            <span itemprop="title">Activites à <?= $this->uri->segment(3) ?></span>
                        </a>
                    </li> 
                <?php } ?>
                <?php if($this->uri->segment(2) == 'type' && $this->uri->segment(3) && !is_numeric ($this->uri->segment(3))){  ?>  
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a title="<?= $this->uri->segment(3) ?>" href="<?php echo $_SERVER['REQUEST_URI']; ?>" itemprop="url">
                            <span itemprop="title"><?= $this->uri->segment(3) ?></span>
                        </a>
                    </li> 
                <?php } ?>
                <?php if($this->uri->segment(4) == 'type' && $this->uri->segment(5) && !is_numeric ($this->uri->segment(5))){  ?>  
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a title="<?= $this->uri->segment(5) ?>" href="<?php echo $_SERVER['REQUEST_URI']; ?>" itemprop="url">
                            <span itemprop="title"><?= $this->uri->segment(5) ?></span>
                        </a>
                    </li> 
                <?php } ?>
            </ol>            
        </div>
        <!-- END .filariane -->
        <!-- START .recherche_filter -->
        <div class="recherche_filter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <select id="ville_activite">
                            <?php if ($ville_selected ==  "") { ?>
                                <option selected disabled >Séléctionnez une ville</option>
                            <?php } ?>
                            <?php foreach ($villes as $ville) { ?>
                                <?php if ($ville_selected ==  $ville->nom) { ?>
                                    <option selected value="<?= $ville->nom ?>"><?= $ville->nom ?></option>
                                <?php }  else { ?>
                                    <option value="<?= $ville->nom ?>"><?= $ville->nom ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- END .recherche_filter -->
        <!-- START .container-fluid -->
        <div class="container-fluid bg-grey">
                <!-- START liste type -->
                <div class="col-md-8">
                	<div class="content_ft_item">
                        <?php if($activites) { ?>
                    		<?php foreach ($activites as $restaurant) { ?>
                                <div class="ft-item">
                                    <span class="col-md-3 col-xs-12 ft-image">
                                        <a title="<?= $restaurant->titre ?>" href="<?php echo base_url('restaurant').'/'.$restaurant->id.'/'.url_title($restaurant->titre); ?>">
                                            <img src="<?php echo base_url('/assets/uploads/').'/'.$restaurant->image1; ?>" alt="featured Scroller" draggable="false">
                                        </a>
                                    </span>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="ft-data">
                                            <a class="ft-name text-upper" href="<?php echo base_url('restaurant').'/'.$restaurant->id.'/'.url_title($restaurant->titre); ?>" title="<?= $restaurant->titre ?>"><?= $restaurant->titre ?></a>
                                            <a class="ft-type hidden-xs text-upper" ><i class="fa fa-cutlery"></i> Restaurant</a>
                                        </div>
                                        <div class="ft-content-short">
                                            <?= mb_word_wrap($restaurant->description, 300,'...',false) ?>
                                        </div>
                                        <div class="ft-foot">
                                            <p class="ft-title">Situé à <a class="text-upper"><?= $restaurant->ville ?></a></p>
                                            <div class="clear"></div>
                                            <span class="btn-right"><a class="btn btn-primary text-upper" href="<?php echo base_url('restaurant').'/'.$restaurant->id.'/'.url_title($restaurant->titre) ?>" title="En savoir plus">En savoir plus</a></span>                                      </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else {
                            echo "<p>Aucun restaurant ne figure pour votre recherche.</p>";
                        } ?>
                    </div>
                    <div class="clear"></div>
                    <div class="pagination">
                        <ul class="">
                            <!-- Pagination links -->
                            <?php foreach ($links as $link) {
                                echo "<li>". $link."</li>";
                            } ?>
                        </ul>
                    </div>
                </div>
                <!-- END liste type -->
                <!-- START liste carte -->
                <div class="col-md-4 hidden-xs">
                    <div id="container-map">
                    <div id="map-canvas"></div>
                    </div>
                </div>
                <!-- END liste carte -->
            
        </div>
        <!-- END .container-fluid -->
</main>

<?php $this->load->view('modules/footer.php'); ?>
<?php $this->load->view('modules/js.php'); ?>

<script type="text/javascript">
    var markers = "";
    var area = <?php echo json_encode($carte); ?>;
    <?php if($activites){ ?>
        var markers = <?php echo json_encode($activites); ?>;
    <?php } ?>

</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/maps/markerclusterer.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/maps/loadMap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.selectbox.js') ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/filter.js') ?>" ></script>
</body>
</html>
