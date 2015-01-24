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
        <h1 class="archive-title"><?php
                    if ( is_day() ) :
                        printf( __( 'Daily Archives: %s', 'themonic' ), '<span>' . get_the_date() . '</span>' );
                    elseif ( is_month() ) :
                        printf( __( 'Monthly Archives: %s', 'themonic' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'themonic' ) ) . '</span>' );
                    elseif ( is_year() ) :
                        printf( __( 'Yearly Archives: %s', 'themonic' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'themonic' ) ) . '</span>' );
                    else :
                        _e( 'Archives', 'themonic' );
                    endif;
                ?></h1>     
        
        <div>
            <?php echo category_description(); ?>
        </div>
    </div>


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="ice_category">
    <section>
        <ul>
            <li>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
            </li>
        </ul>
    </section>
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

</div><!--END LEFT SIDE-->

<div class="right-side">
        <?php get_sidebar(); ?>
    </div><!--END RIGHT SIDE-->
</div> <!--END POST SECTION-->

<?php get_footer(); ?>