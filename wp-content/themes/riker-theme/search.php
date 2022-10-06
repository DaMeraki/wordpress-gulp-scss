<?php
/**
 * Search 
 * @package riker-theme
 */
?>
<?php get_header(); ?>

    <main class="section main">

        <?php if ( have_posts() ) : ?>
            <h2 class="article-heading search-heading">
                <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'riker-theme' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h2>
        <?php while ( have_posts() ) : the_post(); 
                // getting content
                get_template_part( 'template-parts/content', get_post_type() );
            
            endwhile;
            // posts pagination will improve if i have more time in the end
            the_posts_navigation();
        else:
            // If no posts include none template
            get_template_part( 'template-parts/content', 'none' );
        
        endif; ?>

    </main><!-- end .main -->

    <!-- Riker sidebar -->
    <?php get_sidebar(); ?>

<?php get_footer(); ?>