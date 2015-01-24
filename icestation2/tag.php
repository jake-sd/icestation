<?php get_header(); ?>

<!--POST SECTION-->
<div class="wrapper main-content">
    <div class="breadcrumbs">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
    </div>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <header>
                    <h1>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                </header>
                <section>
                    <?php the_content('Read it All &gt;&gt;'); ?>
                </section>
                <footer>
                    <p class="date"><?php the_time('F jS, Y') ?></p>
                    <?php the_tags('<ul><li>Tags</li><li>','</li><li>','</li></ul>'); ?>
                </footer>
            </article>
        <?php endwhile; ?>

        <div class="navigation">
            <div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
            <div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
        </div>

        <?php else : ?>
            <h2 class="center">Not Found</h2>
            <p class="center">
        <?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
    <?php endif; ?>
</div> <!--END POST SECTION-->

<?php get_footer(); ?>