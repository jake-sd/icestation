<?php get_header(); ?>

<!--POST SECTION-->
<div class="wrapper main-content">

<?php // Get the data we need
	$topic = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );    

	$resources = new WP_Query(
		array(
			'post_type' => 'resource', // Tell WordPress which post type we want
			'posts_per_page' => '2', // Show the first 3
			'paged' => $paged, // Pagination will not work w/o this and proper code in Functions file
			'tax_query' => array( // Return only resources where presenter is listed
				array(
					'taxonomy' => 'topics',
					'field' => 'slug',
					'terms' => $topic->slug,
					)
				)
			)
		);

	if ( $topic->parent > 0 ) { // Check to make sure the topic has a parent
	$topic_parent = get_term( $topic->parent, 'topics' ); // Get the object for the topic's parent
	} 	

	$topic_children = get_terms( 'topics', 'child_of='.$topic->term_id );
	$last_topic = end( array_keys( $topic_children ) ); // Mark the last topic
?>

	<article>
		<header>
			<h1><?php echo $topic->name; ?></h1>
			<div class="entry-meta">
				<p><?php echo $topic->description; ?></p>
				<?php if ( $topic->parent > 0  ) { ?>
					<strong>Parent:</strong> <a href="<?php echo get_term_link( $topic_parent->slug, 'topics' ); ?>"><?php echo $topic_parent->name; ?></a>
				<?php } ?>

				<?php if ( $topic_children ) { ?>
					<strong>Subtopics: </strong>
				<?php foreach ( $topic_children as $key => $topic_single ) : ?>
					<span><a href="<?php echo get_term_link( $topic_single->slug, 'topics' ); ?>"><?php echo $topic_single->name; ?></a></span><?php if ( $key !== $last_topic ) echo ', '; ?>
				<?php endforeach; ?>
				<?php } ?>
			</div>
		</header>
	</article>

	<?php if ( $resources->post_count > 0 ) { // Check to make sure there are resources ?>
	<?php while ($resources->have_posts()) : $resources->the_post(); ?>
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
	<?php } ?>
</div> <!--END POST SECTION-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
