<?php 
if ( ( is_single() || is_page() ) && 'et_full_width_page' === get_post_meta( get_the_ID(), '_et_pb_page_layout', true ) )
	return;

// begin modification
if(class_exists('Division'))
{
	if( is_home() && 'et_full_width_page' !== get_theme_mod('blog_page_layout', 'et_right_sidebar') )
	{
		$tr_sidebar = get_theme_mod('blog_page_sidebar', 'sidebar-1');
	}
	else
	{
		$the_sidebar = get_post_meta( get_the_ID(), '_tr_custom_sidebar', true );
		$tr_sidebar = ( isset($the_sidebar) && $the_sidebar !== '') ? $the_sidebar : 'sidebar-1';		
	}

	if ( is_active_sidebar( $tr_sidebar ) ) :
		$preview_data = ( is_customize_preview() ) ? sprintf('data-current-sidebar="%s"', $tr_sidebar) : '';
		printf('<div id="sidebar" class="%s" %s >', 'aside-' . $tr_sidebar, $preview_data);
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

