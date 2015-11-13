<!-- START header -->
<header>
    <!-- START #top-header -->
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="social-media">
                        <li><a class="sm-facebook" href="#"><span><i class="fa fa-facebook"></i></span></a></li>
                        <li><a class="sm-twitter" href="#"><span><i class="fa fa-twitter"></i></span></a></li>
                        <li><a class="sm-instagram" href="#"><span><i class="fa fa-instagram"></i></span></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <nav class="pull-right">
                        <a href="<?php echo base_url('espace-professionnel') ?>"><i class="fa fa-user"></i> Espace Pro</a>
                        <a href="#"><i class="fa fa-suitcase"></i> Nos services</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- END #top-header -->
    <!-- START #menu-header -->
    <div id="menu-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left" id="site-logo" itemscope="" itemtype="http://schema.org/Organization">
                        <a itemprop="url" href="<?php echo base_url() ?>">
                            <img itemprop="logo" src="<?php echo base_url('assets/images/unnamed.png') ?>" alt="Pays de la Drôme">
                        </a>
                    </div>
                    <button type="button" class="menu-toggle pull-right"><i class="fa fa-bars fa-2x"></i></button>
                    <nav class="pull-right">
                        <ul class="menu" id="main-menu">
                            <li><a <?php if($menu == "restaurants") echo "class='active'" ?> href="<?php echo base_url('restaurants') ?>" title=""><i class="fa icon-restau"></i>Se restaurer</a></li>
                            <li><a <?php if($menu == "sejourner") echo "class='active'" ?> title="">Séjourner</a></li>
                            <li class="dropdown mega-dropdown active">
                                <a href="<?php echo base_url('activites') ?>" <?php if($menu == "activites") echo "class='dropdown-toggle active'" ?> class="dropdown-toggle" title="">Se divertir</a>
                                <?php if(isset($mt_activites) && !empty($mt_activites)){ ?>
                                    <div class="dropdown-menu mega-dropdown-menu hidden-xs">
                                        <div class="container-fluid">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <?php $mtfa = true;  foreach ($mt_activites as $mt_a) { ?>
                                                    <?php if($mtfa){ ?>
                                                        <div class="tab-pane active" id="<?= $mt_a->ancre ?>">
                                                    <?php $mtfa = false; } else { ?>
                                                        <div class="tab-pane" id="<?= $mt_a->ancre ?>">
                                                    <?php } ?>
                                                            <ul class="nav-list list-inline">
                                                                <?php foreach ($mt_a->sous_types as $ms) { ?>
                                                                    <li><a href="<?php echo base_url('activites/type/'.urlencode($ms->nom)) ?>"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Running.png"><span><?= $ms->nom ?></span></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                <?php } ?>                                                
                                            </div>
                                        </div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <?php $mtf = true; foreach ($mt_activites as $mt_activite) { ?>
                                                <?php if($mtf){ ?>
                                                    <li class="active"><a href="#<?= $mt_activite->ancre ?>" role="tab" data-toggle="tab"><?= $mt_activite->nom ?></a></li>
                                                <?php $mtf = false; } else { ?>
                                                    <li><a href="#<?= $mt_activite->ancre ?>" role="tab" data-toggle="tab"><?= $mt_activite->nom ?></a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </li>
                            <li><a <?php if($menu == "evenements") echo "class='active'" ?> href="<?php echo base_url('evenements') ?>" title="">Evènements</a></li>
                            <li><a <?php if($menu == "commerces") echo "class='active'" ?> title="">Commerces</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- END #menu-header -->
</header>
<!-- END header -->