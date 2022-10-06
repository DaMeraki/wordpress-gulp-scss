<?php
/**
 * Default page template
 * @package riker-theme
 */
?>
<?php get_header(); ?>

    <main class="section main">

        <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                // getting content
                get_template_part( 'template-parts/content', 'page' );
            
            endwhile;
        endif;
        ?>

    </main><!-- end .main -->

    <!-- Riker sidebar -->
    <?php get_sidebar(); ?>

<?php get_footer(); ?>