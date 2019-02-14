<?php get_header(); ?>
   <div class="first-widget parallax" id="blogId">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">活动资讯/经验分享</h2>
					</div> <!-- /.col-md-6 -->
					<div class="col-md-6 col-sm-6 text-right">
						<span class="page-location">文章详情</span>
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
            <div class="blog-image">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full', array('class'=>'blog-image'), array('alt'=>'post image'));?>
              </a>
            </div> <!-- /.blog-image -->
            <div class="blog-content">
              <span class="meta-date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
              <span class="meta-comments"><a href="#">评论</a></span>
              <span class="meta-author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
              <h3><?php the_title(); ?></h3>
              <p><?php the_content(); ?></p>
              
			    <div class="tag-items">
                  <p class="small-text">前一篇:<?php previous_post_link('%link'); ?><p>
				</div>
            </div> <!-- /.blog-content -->>
          </div> <!-- /.post-blog -->
        <?php endwhile; ?>
        <?php else : ?>
           <p><?php__("No Posts Found"); ?></p>
        <?php endif; ?>
		
				<?php if ( comments_open() || get_comments_number() ) :
						   comments_template();
				endif; ?>
			
        </div> <!-- /.col-md-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.col-md-8 -->

<?php get_sidebar(); ?>		
<?php get_footer(); ?>