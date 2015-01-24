<?php get_header(); ?>

<!--POST SECTION-->
<div class="wrapper main-content">

<?php // Get the data we need
	$presenter = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$resources = new WP_Query(
		array(
			'post_type' => 'resource', // Tell WordPress which post type we want
			'posts_per_page' => '2', // Show the first 3
			'paged' => $paged, // Pagination will not work w/o this and proper code in Functions file
			'tax_query' => array( // Return only resources where presenter is listed
				array(
					'taxonomy' => 'presenters',
					'field' => 'slug',
					'terms' => $presenter->slug,
					)
				)
			)
		);
?>

	<article>
		<header>
			<h1><?php echo $presenter->name; ?></h1>
			<div class="entry-meta">
				<p><?php echo $presenter->description; ?></p>
				<p><?php echo $presenter->taxonomy; ?></p>
			</div>
		</header>
		<section>
			<?php the_content();?>
		</section>
	</article>

	<?php while ( $resources->have_posts() ) : $resources->the_post(); ?>
	<article>
		<header>
			<h1>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
		</header>
		<section>
			<?php the_excerpt(); ?>
		</section>
	</article>
	<?php endwhile; ?>
	<?php wp_pagenavi(); ?>
</div> <!--END POST SECTION-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
