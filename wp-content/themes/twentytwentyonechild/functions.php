<?php 
	// Enqueue scripts
	add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_child_enqueue_styles' );
	function twenty_twenty_one_child_enqueue_styles() {
		// Import parent theme css file
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
		// Add bootstrap css & js file
		wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1.3' ); 
		wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.1.3', true );
		// Add jquery form js file
		wp_enqueue_script( 'jquery-form');
	}

	// Rewrite submit entry page url
	add_action('init', function() {
		add_rewrite_rule(
			'([^/]*)/submit-entry',
			'index.php?page_id=16',
			'top'
		);
	});

	// Save data into database
	add_action('wp_ajax_nopriv_save_entry', 'save_entry');
	add_action('wp_ajax_save_entry', 'save_entry');
	function save_entry() {
		// Get form data into variable
		$first_name 	= wp_strip_all_tags($_POST['first_name']);
		$last_name 		= wp_strip_all_tags($_POST['last_name']);
		$email 			= wp_strip_all_tags($_POST['email']);
		$phone 			= wp_strip_all_tags($_POST['phone']);
		$description 	= wp_strip_all_tags($_POST['description']);
		$competition_id = wp_strip_all_tags($_POST['competition_id']);
		$entry_title 	= $first_name.' '.$last_name;

		// Create post argument
		$my_post = array(
			'post_title'    => $entry_title,
			'post_status'   => 'publish',
			'post_type'     => 'entries',
		);
		
		// Insert the post into the database
		$new_post_id = wp_insert_post( $my_post );
		if ($new_post_id != "" && $new_post_id != 0) {
			// Save meta value
			update_field('first_name', $first_name, $new_post_id);
			update_field('last_name', $last_name, $new_post_id);
			update_field('email', $email, $new_post_id);
			update_field('phone', $phone, $new_post_id);
			update_field('description', $description, $new_post_id);
			update_field('competition_id', $competition_id, $new_post_id);

			// Send response to submit entry page
			wp_send_json_success( array('save_data' => 'success') );

		} else {
			// Send response to submit entry page
			wp_send_json_success( array('save_data' => 'fail') );
		}
	}	
?>
