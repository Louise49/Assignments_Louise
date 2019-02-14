<?php
/*
Template Name: Intro
Template Post Type: Page
*/
get_header(); ?>

	<div class="first-widget parallax" id="portfolio1">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title"><?php the_title(); ?></h2>
					</div> <!-- /.col-md-6 -->
					<div class="col-md-6 col-sm-6 text-right">
						<span class="page-location">首页 / <?php the_title(); ?></span>
					</div> <!-- /.col-md-6 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay -->
	</div> <!-- /.pageTitle -->

	<div class="container">
	<div class="row">
	<section class="light-content our-team">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
						<p>
						<?php
							$query = new AirpressQuery();
							$query->setConfig("Default");
							$query->table("Json");
							$events = new AirpressCollection($query);
							foreach($events as $e){
							echo "<h3>".$e["Companies"]."——".$e["Slogan"]."</h3>"
								."<p>".$e["Intro"]."</p>"
								."<br>"
								."<center>"."<img src='".$e["Photo_url"]."'>"."</center>"
								."<br>"
								."<br><hr><br>";
							}
							?>
						</p>
				</div> <!-- /.col-md-12 -->
			</div>
		</div>
<?php get_footer(); ?>