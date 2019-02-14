
    <footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="footer-nav clearfix">
						<ul class="footer-menu">
								<?php
									wp_nav_menu( array(
										'menu'              => 'primary',
										'theme_location'    => 'primary',
										'depth'             => 2,
										'container'         => 'false',
										'menu_class'        => 'nav nav-list',
										'fallback_cb'       => 'wp_bootstrap_navlist_walker::fallback',
										'walker'			=> new wp_bootstrap_navlist_walker())
									);
								?>
						</ul> <!-- /.footer-menu -->
					</nav> <!-- /.footer-nav -->
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<p class="copyright-text">Copyright &copy; <?php echo Date("Y"); ?> | <?php bloginfo("name"); ?>
                    | 设计: Louise</p>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</footer> <!-- /.site-footer -->
    <?php wp_footer();?>

	<!-- Scripts -->
	<script src="<?php bloginfo('template_url'); ?>/js/min/plugins.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/min/medigo-custom.min.js"></script>

</body>
</html>