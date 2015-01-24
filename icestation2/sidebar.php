<div id="secondary" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<aside id="archives" class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="meta" class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>

	<?php endif; // end sidebar widget area ?>

<!--LIST CATEGORIES CODE-->
	<div class="all-categories">
		<?php wp_list_categories( 'title_li=<h2>' . __('Categories') . '</h2>' ); ?> 
	</div>

<!--LIST CUSTOM POST TYPE TAXONOMIES (ie.Topics, Presenters, etc)-->
	<div class="custom-post-categories">
		<?php 
			//list terms in a given taxonomy using wp_list_categories

			$taxonomy     = 'topics';
			$orderby      = 'name'; 
			$show_count   = 0;      // 1 for yes, 0 for no
			$pad_counts   = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no
			$title        = '';

			$args = array(
			  'taxonomy'     => $taxonomy,
			  'orderby'      => $orderby,
			  'show_count'   => $show_count,
			  'pad_counts'   => $pad_counts,
			  'hierarchical' => $hierarchical,
			  'title_li'     => $title
			);
		?>
		<h2>Custom Post Type List Category</h2>
		<ul>
			<?php wp_list_categories( $args ); ?>
		</ul>
	</div>

<!--LIST PAGES AND SUB-PAGES-->
	<div class="list-pages">
		<ul>
  			<?php wp_list_pages('title_li=<h2>' . __('Page List') . '</h2>' ); ?>
		</ul>
	</div>
</div><!-- #secondary .widget-area -->
	