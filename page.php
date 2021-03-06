<!DOCTYPE html>
<html>
<head>

<!-- Bootstrap-->
<script src=<?php echo get_template_directory_uri() . "/js/jquery-3.1.0.min.js";?>></script>

<!-- Latest compiled and minified CSS -->
<link href=<?php echo get_template_directory_uri() . "/css/bootstrap.min.css";?> rel='stylesheet' type='text/css'>

<!-- Latest compiled and minified JavaScript -->
<script src=<?php echo get_template_directory_uri() . "/js/bootstrap.min.js";?>></script>

<!-- End Bootstrap-->

<link rel="stylesheet" href= <?php echo  get_stylesheet_uri();?> >

<link href=<?php echo get_template_directory_uri() . "/css/fonts.css";?> rel='stylesheet' type='text/css'>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
<!-- Yet to come -->
</head>

	<?php echo "<body style=\"background-color:". get_theme_mod('bgcolor', '#E3EDFC') . "\">"; ?>
<div class="container-fluid full">
	<div class="head1">
		<div class="navbar navbar-default" id="mainNav">
			<div class="navbar-header narrowdesign">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="<?php echo site_url(); ?>">Home</a>
			</div>
			<div class="navbar-inner">
				
				<div class="container-fluid">
				<?php
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
					);
				?>
				</div>
				
			</div>
		</div>
	<div class="logo-container">
		<a href="<?php echo site_url(); ?>">
			
			<!--<img class="logo" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />-->
			<div class="container-fluid">
			<div class="row reduced">
				<div class="col-md-3 title-text-container">
					<h1 class="title">Fachschaftsrat Physik</h1>
					<h2 class="subtitle">an der Universität Göttingen</h2>
				</div>
				
			</div>
			</div>
		</a>
	</div>
	</div>
	<div class="main">
	<div class="header-image-container">
		<img class="header-image" src=<?php echo get_template_directory_uri() . "/header-hell.png";?>> 
	</div>
	<div class="row reduced"> <!-- Seitenlayout: Aktuelles links, Inhalt mittig, Werbung rechts -->
		<div class="col-md-8">
			<div class="content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
			
			</div>
			
			<?php endwhile; ?>

		<!-- <p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p> -->
		<?php endif; ?>
			</div>
		</div>
		
		<div class="col-md-4" >
			<div class="widget" style="text-align:center">
				<?php if ( is_active_sidebar( 'page_left_1' ) ) : ?>
					<?php dynamic_sidebar( 'page_left_1' ); ?>
				<?php endif; ?>
			</div>
			<div class="widget transparent hasOlderBrother" style="text-align:center">
				<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
					<?php dynamic_sidebar( 'home_right_1' ); ?>
				<?php endif; ?>
			</div>
		</div>
    
	</div>

</div>
</div>
<!-- Site footer -->
	<footer class="footer fixed-footer">
		<div class="container-fluid full">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="footer-content">
					<div class="row">
					<?php
					$struct = "<div class='col-xs-4'>";
					$pos = ["Linke", "Mittlere", "Rechte"];
					foreach($pos as $p) {
						$text = get_theme_mod('footer'.$p, ' ');
						if(($link = get_theme_mod('foolink'.$p, '0'))!='0') {
							echo $struct."<a href='".$link."'>".$text."</a></div>";
						}else{
							echo $struct."<p>".$text."</p></div>";
						}
						echo "\n";
					}
					?>
					</div>
				</div>
			</div>
			<div class="col-md-2 EWContainer">
				<p class="text-muted Eigenwerbung"><a href="http://wordpress.com">Wordpress</a><br><a href="http://nördcampus.de">noerdcampus.de</a></p>
			</div>
		</div>
		</div>
	</footer>

<div class="footer-image"></div>
</body>
<script>
	if($(window).width()<1030) {
		$(".nav>.menu-item-has-children>a").attr("data-toggle", "dropdown");
		$(".nav>li>a").attr("class", "dropdown-toggle");
	}
	$(window).resize( function() {
		if($(window).width()<1030) {
			$(".nav>.menu-item-has-children>a").attr("data-toggle", "dropdown");
			$(".nav>li>a").attr("class", "dropdown-toggle");
		}
		if($(window).width()>=1030) {
			$(".nav>.menu-item-has-children>a").removeAttr("data-toggle");
			$(".nav>li>a").removeClass("dropdown-toggle");
		}
	});
</script>
<!--<h4 >Seht her!</h4>
			<img src="https://noerdcampus.de/wordpress/FB-f-Logo__blue_50.png"/>
			
			<p> Twitter </p>
			<p>.</br>.</br>. </p>
			<p>INSTAGRAM!</p>
####

<?php echo "<div class='' id='home_right_1' style='text-align:center;'>";?>
				<?php echo "<div class='widget' style='position:absolute; top:0; left:0; height:100%; width:100%; z-index:-1; background-color:".get_theme_mod('sidebarrcolor', 'white') .";opacity:".get_theme_mod('sidebarropacity', '1') .";text-align:center;'></div>";?>			
			
-->	
</html>
