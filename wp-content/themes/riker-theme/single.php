<?php
/**
 * For singular posts
 * @package riker-theme
 */
?>
<?php get_header(); ?>

    <main class="section main">

        <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                // getting content
                get_template_part( 'template-parts/content', get_post_type() );
            
            endwhile;
        endif;
        ?>

        <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        ?>

    </main><!-- end .main -->

    <!-- Riker sidebar -->
    <?php get_sidebar(); ?>

<?php get_footer(); ?>