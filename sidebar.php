<?php 
if ( ( is_single() || is_page() ) && 'et_full_width_page' === get_post_meta( get_the_ID(), '_et_pb_page_layout', true ) )
	return;

// begin modification
if(class_exists('Division'))
{
	global $sidebar_metabox;
	$meta = $sidebar_metabox->the_meta();
	$tr_sidebar = ( isset($meta['sidebar']) && $meta['sidebar'] !== '') ? $meta['sidebar'] : 'sidebar-1';

	if ( is_active_sidebar( $tr_sidebar ) ) :

		echo '<div id="sidebar">';
			dynamic_sidebar( $tr_sidebar );
		echo '</div> <!-- end #sidebar -->';

	endif;
	
} else {

	if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div> <!-- end #sidebar -->
	<?php endif;
}
// end modification