<?php get_header(); ?>

<!--POST SECTION-->
<div class="wrapper main-content">

    <div class="left-side">
    
    <div class="breadcrumbs">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
    </div>

    <div class="category-container">
        <h1>
            <?php single_cat_title(); ?>
        </h1>        
        
        <div>
            <?php echo category_description(); ?>
        </div>
    </div>


<article class="ice_category">
    <section>
        <ul>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <?php
                        // check if the post has a Post Thumbnail assigned to it.
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }
                    ?>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
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
        </ul>
    </section>
</article>


</div><!--END LEFT SIDE-->

<div class="right-side">
        <?php get_sidebar(); ?>
    </div><!--END RIGHT SIDE-->
</div> <!--END POST SECTION-->

<?php get_footer(); ?>