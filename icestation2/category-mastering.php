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
            <?php $mastering_query = new WP_Query('category_name=mastering&posts_per_page=100');
                while ($mastering_query->have_posts()) : $mastering_query->the_post();
            ?>
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
        </ul>
    </section>
</article>





</div><!--END LEFT SIDE-->

<div class="right-side">
        <?php get_sidebar(); ?>
    </div><!--END RIGHT SIDE-->
</div> <!--END POST SECTION-->

<?php get_footer(); ?>