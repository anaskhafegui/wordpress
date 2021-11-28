<?php


function create_posttype() {
    register_post_type( 'news',
    // CPT Options
    array(
      'labels' => array(
       'name' => __( 'news' ),
       'singular_name' => __( 'News' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'news'),
     )
    );
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );









function selgo_theme_support() {
    // Adds dynamic tittle tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'selgo_theme_support');

function selgo_menus() {

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'selgo_menus');

function followanas_theme_support(){

       add_theme_support('title-tag');

}


add_action('after_setup_theme','followanas_theme_support');

function followanas_regsiter_styles(){


    wp_enqueue_style('followanas-style' , get_template_directory_uri() . "/style.css" , array() , '1.0' , 'all');
    wp_enqueue_style('followanas-bootstrap' ,  "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css");

   

}

add_action('wp_enqueue_scripts','followanas_regsiter_styles');



add_filter('manage_post_posts_columns', 'misha_brief_and_featured_columns');
// the above hook will add columns only for default 'post' post type, for CPT:
// manage_{POST TYPE NAME}_posts_columns
function misha_brief_and_featured_columns( $column_array ) {

	$column_array['brief'] = 'brief';
	$column_array['featured'] = 'Featured product';

	$column_array['client'] = 'client';
	$column_array['description'] = 'description';
	$column_array['deliverydate'] = 'deliverydate';


	
	// the above code will add columns at the end of the array
	// if you want columns to be added in another place, use array_slice()

	return $column_array;
}

/*
 * Populate our new columns with data
 */
add_action('manage_posts_custom_column', 'misha_populate_both_columns', 10, 2);
function misha_populate_both_columns( $column_name, $id ) {

	// if you have to populate more that one columns, use switch()
	switch( $column_name ) :
		case 'brief': {
			echo get_post_meta( $id, 'product_brief', true );
			break;
		}
		case 'description': {
			echo get_post_meta( $id, 'product_description', true );
			break;
		}
		
		case 'client': {
			echo get_post_meta( $id, 'product_client', true );
			break;
		}
		case 'deliverydate': {
			echo get_post_meta( $id, 'product_deliverydate', true );
			break;
		}
	
		case 'featured': {
			if( get_post_meta($id,'product_featured',true) == 'on') 
				echo 'Yes';
			break;
		}
	endswitch;

}


/*
 * quick_edit_custom_box allows to add HTML in Quick Edit
 * Please note: it files for EACH column, so it is similar to manage_posts_custom_column
 */
add_action('quick_edit_custom_box',  'misha_quick_edit_fields', 10, 2);

function misha_quick_edit_fields( $column_name, $post_type ) {

	// you can check post type as well but is seems not required because your columns are added for specific CPT anyway

	switch( $column_name ) :
		case 'brief': {

			// you can also print Nonce here, do not do it ouside the switch() because it will be printed many times
			wp_nonce_field( 'misha_q_edit_nonce', 'misha_nonce' );

			// please note: the <fieldset> classes could be:
			// inline-edit-col-left, inline-edit-col-center, inline-edit-col-right
			// each class for each column, all columns are float:left,
			// so, if you want a left column, use clear:both element before
			// the best way to use classes here is to look in browser "inspect element" at the other fields

			// for the FIRST column only, it opens <fieldset> element, all our fields will be there
			echo '<fieldset class="inline-edit-col-right">
				<div class="inline-edit-col">
					<div class="inline-edit-group wp-clearfix">';

			echo '<label class="alignleft">
					<span class="title">brief</span>
					<span class="input-text-wrap"><input type="text" name="brief" value=""></span>
				</label>';

			break;

		}

		case 'description': {

			// you can also print Nonce here, do not do it ouside the switch() because it will be printed many times
			wp_nonce_field( 'misha_q_edit_nonce', 'misha_nonce' );

			// please note: the <fieldset> classes could be:
			// inline-edit-col-left, inline-edit-col-center, inline-edit-col-right
			// each class for each column, all columns are float:left,
			// so, if you want a left column, use clear:both element before
			// the best way to use classes here is to look in browser "inspect element" at the other fields

			// for the FIRST column only, it opens <fieldset> element, all our fields will be there
			echo '<fieldset class="inline-edit-col-right">
				<div class="inline-edit-col">
					<div class="inline-edit-group wp-clearfix">';

			echo '<label class="alignleft">
					<span class="title">description</span>
					<span class="input-text-wrap"><input type="text" name="description" value=""></span>
				</label>';

			break;

		}

	
		case 'client': {

			// you can also print Nonce here, do not do it ouside the switch() because it will be printed many times
			wp_nonce_field( 'misha_q_edit_nonce', 'misha_nonce' );

			// please note: the <fieldset> classes could be:
			// inline-edit-col-left, inline-edit-col-center, inline-edit-col-right
			// each class for each column, all columns are float:left,
			// so, if you want a left column, use clear:both element before
			// the best way to use classes here is to look in browser "inspect element" at the other fields

			// for the FIRST column only, it opens <fieldset> element, all our fields will be there
			echo '<fieldset class="inline-edit-col-right">
				<div class="inline-edit-col">
					<div class="inline-edit-group wp-clearfix">';

			echo '<label class="alignleft">
					<span class="title">client</span>
					<span class="input-text-wrap"><input type="text" name="client" value=""></span>
				</label>';

			break;

		}
	
		case 'featured': {

			echo '<label class="alignleft">
					<input type="checkbox" name="featured">
					<span class="checkbox-title">Featured product</span>
				</label>';

			// for the LAST column only - closing the fieldset element
			echo '</div></div></fieldset>';

			break;

		}

	endswitch;

}


/*
 * Quick Edit Save
 */
add_action( 'save_post', 'misha_quick_edit_save' );

function misha_quick_edit_save( $post_id ){

	// check user capabilities
	if ( !current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// check nonce
	if ( !wp_verify_nonce( $_POST['misha_nonce'], 'misha_q_edit_nonce' ) ) {
		return;
	}

	// update the brief
	if ( isset( $_POST['brief'] ) ) {
 		update_post_meta( $post_id, 'product_brief', $_POST['brief'] );
	}

	// update the content
	if ( isset( $_POST['description'] ) ) {
		update_post_meta( $post_id, 'product_description', $_POST['description'] );
   }
   // update the client
	if ( isset( $_POST['client'] ) ) {
		update_post_meta( $post_id, 'product_client', $_POST['client'] );
   }

	// update checkbox
	if ( isset( $_POST['featured'] ) ) {
		update_post_meta( $post_id, 'product_featured', 'on' );
	} else {
		update_post_meta( $post_id, 'product_featured', '' );
	}


}



add_action( 'admin_enqueue_scripts', 'misha_enqueue_quick_edit_population' );
function misha_enqueue_quick_edit_population( $pagehook ) {

	// do nothing if we are not on the target pages
	if ( 'edit.php' != $pagehook ) {
		return;
	}

	wp_enqueue_script( 'populatequickedit', get_stylesheet_directory_uri() . "/assets/js/populate.js", array( 'jquery' ) );

}


function filter_projects() {
	$catSlug = $_POST['category'];
  
	$ajaxposts = new WP_Query([
	  'post_type' => 'post',
	  'posts_per_page' => -1,
	  'category_name' => $catSlug,
	  'orderby' => 'menu_order', 
	  'order' => 'desc',
	]);
	$response = '';
  
	if($ajaxposts->have_posts()) {
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
		$response .= get_template_part('templates/_components/project-list-item');
	  endwhile;
	} else {
	  $response = 'empty';
	}
  
	echo $response;
	exit;
  }
  add_action('wp_ajax_filter_projects', 'filter_projects');
  add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');

?>