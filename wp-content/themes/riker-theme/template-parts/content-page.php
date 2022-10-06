<?php
/**
 * Template for pages
 * @package riker-theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <!-- Getting title for single or other posts -->
    <?php the_title( '<h2 class="entry-title article-heading">', '</h2>' ); ?>

    <!-- post content -->
    <div class="entry-content">
        <?php the_content(); ?>
    </div>

</article><!-- end .article -->