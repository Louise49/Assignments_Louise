<?php
/*
Template Name: Contact
Template Post Type: Page
*/
get_header(); ?>

	<div class="first-widget parallax" id="contact">
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

			<div class="col-md-8 blog-posts">
				<div class="row">
					<div class="col-md-12">
					<?php if(have_posts()): ?>
				      <?php while(have_posts()) : the_post(); ?>
						<div class="post-blog">
							<div class="blog-content">
                        <?php the_content(); ?>
							</div> <!-- /.blog-content -->
						</div> <!-- /.post-blog -->
						<?php endwhile; ?>
						<?php else : ?>
						  <p><?php__("No Posts Found"); ?></p>
						<?php endif; ?>
						
				    </div> <!-- /.col-md-12 -->
		    </div> <!-- /.col-md-8 -->
			</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>