<?php get_header(); ?>

<!--POST SECTION-->
<div class="wrapper main-content">
<?php // Let's get the data we need (Presenters & Topics come from functions.php where we set up those taxonomy terms FYI)
	$resource_presenters = get_the_term_list( $post->ID, 'presenters', '', ', ', '' );
	$resource_topics = get_the_term_list( $post->ID, 'topics', '', ', ', '' );
?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article>
			<header>
				<h1><?php the_title(); ?></h1>
				<div class="entry-meta">
					<span>Presenters: <?php echo $resource_presenters ?> | </span>
					<span>Topics: <?php echo $resource_topics ?></span>
				</div>
			</header>
			<section>
				<?php the_content();?>
			</section>
		</article>
	<?php endwhile; ?>
</div> <!--END POST SECTION-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
