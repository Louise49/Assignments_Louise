<?php
/*
Template Name: Activity
Template Post Type: Page
*/
get_header(); ?>

	<div class="first-widget parallax" id="portfolio">
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
		  <?php
		   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		   $args = array(
			 'post_type' => array('post'),
			 'category__in' => array('1'),
			 'post_status' => 'publish',
			 'order' => 'DESC',
			 'orderby' => 'date',
			 'posts_per_page' => 5,
			 'paged' => $paged, 
		   );
			$arr_posts = new WP_Query( $args );
				 if ( $arr_posts->have_posts() ) :
				   while ( $arr_posts->have_posts() ) :
						 $arr_posts->the_post();?>
			  <div class="post-blog">
				<div class="blog-image">
				  <a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('full', array('class'=>'blog-image'), array('alt'=>'post image'));?>
				  </a>
				</div> <!-- /.blog-image -->
				<div class="blog-content">
				  <span class="meta-date"><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a></span>
				  <span class="meta-comments"><a href="#"><?php the_category(', '); ?></a></span>
				  <span class="meta-author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
				  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				  <p><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>">（阅读全文）</a></p>
				</div> <!-- /.blog-content -->
			  </div> <!-- /.post-blog -->
		<?php endwhile; ?>
		<?php else : ?>
		   <p><?php__("No Posts Found"); ?></p>
		<?php endif; ?>
			</div> <!-- /.col-md-12 -->
		  </div> <!-- /.row -->
		</div> <!-- /.col-md-8 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>