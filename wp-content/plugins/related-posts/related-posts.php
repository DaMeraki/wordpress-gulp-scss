<?php
/*
Plugin Name: Related Posts
Plugin URI: artsoulxx@gmail.com
Description: Just to show related posts
Version: 1.0
Author: Zeeshan Khan
*/

class related_posts extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'related_posts',
			__( 'Related Posts', 'riker-theme' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	public function form( $instance ) {

		$defaults = array(
			'title'    => '',
			'no_posts'     => '',
		);
		
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'riker-theme' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no_posts' ) ); ?>"><?php _e( 'Posts to show:', 'riker-theme' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $no_posts ); ?>" />
		</p>

	<?php }

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['no_posts']     = isset( $new_instance['no_posts'] ) ? wp_strip_all_tags( $new_instance['no_posts'] ) : '';
		return $instance;
	}

	public function widget( $args, $instance ) {

		extract( $args );

		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$no_posts     = isset( $instance['no_posts'] ) ? $instance['no_posts'] : '';

		// WordPress core before_widget hook (always include )
		echo $before_widget;

		echo '<div class="related_posts_widget">';

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

            global $post;
			if(isset($post->ID)){
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
					$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> $no_posts, 
					'ignore_sticky_posts'=> 1
				);
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
					echo '<ul>';
					while( $my_query->have_posts() ) {
						$my_query->the_post();
						echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
					}
					echo '</ul>';
				}else{
					echo '<p>No posts found!</p>';
				}
				}
				wp_reset_query();
			}else{
				echo '<p>No posts found!</p>';
			}

		echo '</div>';

		echo $after_widget;

	}

}

// Register the widget
function related_posts_register() {
	register_widget( 'related_posts' );
}
add_action( 'widgets_init', 'related_posts_register' );