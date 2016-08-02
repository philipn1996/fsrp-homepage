<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap-->
<script   src="https://noerdcampus.de/wordpress/srv/jquery-2.2.4.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://noerdcampus.de/wordpress/srv/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://noerdcampus.de/wordpress/srv/bootstrap.min.js"></script>

<!-- End Bootstrap-->
<link rel="stylesheet" href=<?php echo get_template_directory_uri() . "/nav-justified.css";?> >
<link rel="stylesheet" href= <?php echo  get_stylesheet_uri();?> >
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
<!-- Yet to come -->
</head>
<?php echo "<body style=\"background-color:". get_theme_mod('bgcolor', 'rgb(57, 64, 72);') . "\">"; ?>
<!-- background-colors: 1.: rgb(57, 64, 72); 2.: rgb(217, 235, 255) ; 3.: rgb(209, 236, 214); 4.: rgb(157, 195, 164) 5.: rgb(186, 247, 197); 6.: rgb(205, 245, 212); 7.: rgb(192, 203, 230)-->
<div class="container-fluid full">
	<div class="header-image"></div>
	<div class="">
		<div style="position:absolute; top:0; left:5px; width:30px; height:30px; text-align:center">
			<button id="navButton" style="float:none" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</button>
		</div>
		<div style="text-align:center; padding-top:5px">
			<a href="<?php echo site_url(); ?>">
				<img class="logo" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
			</a>
		</div>
			<div class="navbar center" id="mainNav">
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
		
	</div>
	<div class="main">
	<div class="row"> <!-- Seitenlayout: Aktuelles links, Inhalt mittig, Werbung rechts -->
		 
		<div class="col-md-2" >
			<div class="widget" style="text-align:center">
				<?php if ( is_active_sidebar( 'page_left_1' ) ) : ?>
					<?php dynamic_sidebar( 'page_left_1' ); ?>
				<?php endif; ?>
			</div>
		</div>
		 
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
		
		<div class="col-md-2" >
			<div class="widget transparent" style="text-align:center">
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
					<div class="col-xs-4">
					<p class="">Hintergrund: CC BY-SA 2.5 Daniel Schwen</p>
					</div>
					<div class="col-xs-4">
					Nördcampus Inc.
					</div>
					<div class="col-xs-4">
					Impressum
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		</div>
	</footer>

<div class="footer-image"></div>
</body>
<script type="text/javascript">
$('#bs-example-navbar-collapse-1').on('show.bs.collapse', function () {
  $('#mainNav').css("display","block");
});
$('#bs-example-navbar-collapse-1').on('hidden.bs.collapse', function () {
  $('#mainNav').css("display","none");
});
$(window).resize( function() {
	if($('#navButton').css("display")=="none") $('#mainNav').css("display","block");
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
