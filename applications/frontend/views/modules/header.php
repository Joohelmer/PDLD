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
                            <li><a <?php if($menu == "divertir") echo "class='active'" ?> title="">Se divertir</a></li>
                            <li><a <?php if($menu == "evenements") echo "class='active'" ?> title="">Evènements</a></li>
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