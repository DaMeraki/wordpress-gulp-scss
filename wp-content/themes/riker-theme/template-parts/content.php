<?php
/**
 * Template for posts
 * @package riker-theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <!-- Getting title for single or other posts -->
    <?php
    if ( is_singular() ) :
        the_title( '<h2 class="entry-title article-heading">', '</h2>' );
    else :
        the_title( '<h2 class="entry-title article-heading"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;
    ?>
    <!-- post meta -->
    <p class="article-meta">Posted on <time datetime="<?php the_time('Y-m-j H:i'); ?>"><?php the_time('F d, Y'); ?></time>.<p>
    <!-- post content -->
    <div class="entry-content">
        <?php the_content(); ?>
        <p class="article-tags"><?php the_tags('<strong>Tagged in </strong>',', ','.'); ?></p>
    </div>

</article><!-- end .article -->