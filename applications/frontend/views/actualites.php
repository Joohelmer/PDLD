<!DOCTYPE html>
<html>
<head>
	<title><?= $seo->titre ?></title>
	<meta name="title" content=""/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<?php $this->load->view('modules/meta+css.php'); ?>
	<link href="<?php echo base_url('/assets/css/jquery.bxslider.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/css/flexslider.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body>
<?php $this->load->view('modules/header.php'); ?>

<main id="content">
    <div class="masonrycontainer container">
        <?php foreach ($actualites as $actualite) { ?>
            <div class="masonr">
                <div class="post">

                    <a class="featured-image" href="<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>" title="<?= $actualite->titre ?>">
                        <img src="<?php echo base_url('assets/uploads/').'/'. $actualite->photo_miniature; ?>" alt="<?= $actualite->titre ?>">
                    </a>
                    <div class="clear"></div>

                    <div class="frame">
                        <div class="title-wrap">
                            <h2 class="entry-title text-upper">
                                <a href="<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>" title="<?= $actualite->titre ?>"><?= $actualite->titre ?></a>
                            </h2>

                            <div class="title-meta">
                                <!--<span><i class="fa fa-user"></i><a href="http://cr1000team.com/smoothie/?author=1" title="Posts by Smoothie" rel="author">Smoothie</a></span>-->
                                <span><i class="fa fa-calendar"></i><a><?= date("d-m-Y", strtotime($actualite->date)) ?></a></span>
                                <span class="categories"><i class="fa fa-align-justify"></i><a rel="category">Beauty</a></span>
                                <span class="tags"><i class="fa fa-tag"></i><a href="http://cr1000team.com/smoothie/?tag=feelings" rel="tag">Feelings</a>, <a href="http://cr1000team.com/smoothie/?tag=girl" rel="tag">girl</a>, <a href="http://cr1000team.com/smoothie/?tag=youth" rel="tag">youth</a></span>
                            </div>
                        </div>

                        <div class="post-content">
                            <div><?= mb_word_wrap($actualite->contenu, 100,'...',false) ?></div>
                            <div class="clear"></div>
                            <a class="btn btn-primary text-upper" href="<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>">Lire la suite</a></p>
                        </div>
                    </div><!-- frame -->

                    <!-- meta info bar -->
                    <div class="bar">
                        <div class="share">
                            <!-- twitter -->
                            <a class="share-twitter" onclick="window.open('http://twitter.com/home?<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>" title="Cup" target="blank"><i class="fa fa-twitter"></i></a>
                            <!-- facebook -->
                            <a class="share-facebook" onclick="window.open('http://www.facebook.com/share.php?u=<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>" title="Cup" target="blank"><i class="fa fa-facebook"></i></a>
                            <!-- google plus -->
                            <a class="share-google" href="https://plus.google.com/share?url=http://cr1000team.com/smoothie/?p=42" onclick="window.open('https://plus.google.com/share?url=<?php echo base_url('actualite').'/'.$actualite->id.'/'.urlencode($actualite->titre) ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><i class="fa fa-google-plus"></i></a>
                        </div><!-- share -->
                    </div><!-- bar -->

                </div><!-- post-->
            </div>
        <?php } ?>   
    </div>
    <div class="clear"></div>
    <div class="container">
        <div class="pagination">
            <ul class="">
                <!-- Show pagination links -->
                <?php foreach ($links as $link) {
                echo "<li>". $link."</li>";
                } ?>
            </ul>
        </div>
    </div>
</main>

<?php $this->load->view('modules/footer.php'); ?>
<?php $this->load->view('modules/js.php'); ?>

<script type="text/javascript" src="<?php echo base_url('/assets/js/imagesloaded.min.js') ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/isotope.min.js') ?>" ></script>

<script type="text/javascript">
    jQuery(document).ready(function($) { 

        var $container = $('.masonrycontainer');
        $container.imagesLoaded(function() {
            $container.isotope({
                itemSelector : '.masonr'
            });
            $('.masonrycontainer').css('opacity', 1.0);
        });
    });
</script>
</body>
</html>
