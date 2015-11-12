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
                    <a title="Evénements" href="<?php echo base_url('evenements'); ?>" itemprop="url">
                        <span itemprop="title">Evénements</span>
                    </a>
                </li>  
                <?php if($this->uri->segment(3) && !is_numeric ($this->uri->segment(3))){  ?> 
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a title="Evénements à <?= $this->uri->segment(3) ?>" href="<?php echo $_SERVER['REQUEST_URI']; ?>" itemprop="url">
                            <span itemprop="title">Evénements à <?= $this->uri->segment(3) ?></span>
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
                        <select id="ville_evenements">
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
                        <?php if($evenements) { ?>
                    		<?php foreach ($evenements as $evenement) { ?>
                                <div class="ft-item">
                                    <span class="col-md-3 col-xs-12 ft-image">
                                        <a title="<?= $evenement->titre ?>" href="<?php echo base_url('evenement').'/'.$evenement->id.'/'.url_title($evenement->titre); ?>">
                                            <img src="<?php echo base_url('/assets/uploads/').'/'.$evenement->image1; ?>" alt="featured Scroller" draggable="false">
                                        </a>
                                    </span>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="ft-data">
                                            <a class="ft-name text-upper" href="<?php echo base_url('evenement').'/'.$evenement->id.'/'.url_title($evenement->titre); ?>" title="<?= $evenement->titre ?>"><?= $evenement->titre ?></a>
                                            <a class="ft-type hidden-xs text-upper" ><i class="fa fa-cutlery"></i> Evénement</a>
                                        </div>
                                        <div class="ft-content-short">
                                            <?= mb_word_wrap($evenement->description, 300,'...',false) ?>
                                        </div>
                                        <div class="ft-foot">
                                            <p class="ft-title">Situé à <a class="text-upper"><?= $evenement->ville ?></a></p>
                                            <div class="clear"></div>
                                            <span class="btn-right"><a class="btn btn-primary text-upper" href="<?php echo base_url('evenement').'/'.$evenement->id.'/'.url_title($evenement->titre) ?>" title="En savoir plus">En savoir plus</a></span>                                      </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else {
                            echo "<p>Aucun événement ne figure pour votre recherche.</p>";
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
    <?php if($evenements){ ?>
        var markers = <?php echo json_encode($evenements); ?>;
    <?php } ?>

</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/maps/markerclusterer.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/maps/loadMap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.selectbox.js') ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/filter.js') ?>" ></script>
</body>
</html>
