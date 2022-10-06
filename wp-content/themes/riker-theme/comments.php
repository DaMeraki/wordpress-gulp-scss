<?php
/**
 * Comments template
 * @package riker-theme
 */
?>
<div id="comments" class="comments">
  <?php if(have_comments()): ?>
    <h2 class="article-heading"><?php if(get_comments_number() !=0) {comments_number(); } ?></h2>
    <ul>
      <?php wp_list_comments(); ?>
    </ul>
  <?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <p><?php esc_html_e('Comments are closed here.', 'riker-theme'); ?></p>
  <?php endif; ?>
  <?php comment_form(); ?>
</div>