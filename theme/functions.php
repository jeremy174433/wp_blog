<?php

add_theme_support( 'post-thumbnails' );

// ---------- ALLOW WORDPRESS API USAGE ---------- //
function add_cors_http_header() {
    header( 'Access-Control-Allow-Origin: *' );
}
add_action( 'init', 'add_cors_http_header' );

// ---------- SITE STYLES & SCRIPTS ---------- //
function askingfranklin_scripts() {
	
	// Styles
	wp_enqueue_style('bootstrap-reboot', get_template_directory_uri() . '/css/bootstrap/bootstrap-reboot.min.css', time());
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', time());
	wp_enqueue_style('style', get_stylesheet_uri(), time());
	wp_enqueue_style('index-style', get_template_directory_uri() . '/css/public/index.css', time());
	
	// Scripts
	// wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery/jquery-3.3.1.min.js', ['jquery'], time(), false);
	// wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', time());
}
add_action( 'wp_enqueue_scripts', 'askingfranklin_scripts' );

// ---------- SITE WIDGETS ---------- //
function askingfranklin_widgets_init() {
 
	register_sidebar ([
		'name'          => 'Form Article',
		'id'            => 'form-newsletter',
		'description'   => __( 'Ce widget est destiné à insérer un formulaire sur la page d\'un article de blog', 'textdomain' ),
		'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
	]);

}
add_action( 'widgets_init', 'askingfranklin_widgets_init' );

// ---------- GENERATED POST SUMMARY ---------- //
function replace_ca($matches) {
	return '<h' . $matches[1] . $matches[2] . ' id="'. sanitize_title( $matches[3] ) .'">'. $matches[3] .'</h'. $matches[4] .'>';
}
add_filter('the_content', 'add_anchor_to_title', 12);
  
function add_anchor_to_title($content) {   
	if( is_singular( 'post' ) ) { // if is an article
		global $post;
		$pattern = '/<h([2-4])(.*?)>(.*?)<\/h([2-4])>/i';
		$content = preg_replace_callback($pattern, 'replace_ca', $content);
		return $content;
	}
	else {
		return $content;
	}
}

function post_generated_summary() {
	global $post;
	$obj = '<nav id="article-summary" class="d-flex flex-column my-5 px-3 px-lg-5 py-3">
			<p class="fw-600 mt-0 mb-3">Sommaire :</p>';
	$original_content = $post->post_content;
	$patt = '/<h([2-4])(.*?)>(.*?)<\/h([2-4])>/i';
	preg_match_all($patt, $original_content, $results);
  
	$lvl1 = 0;
	$lvl2 = 0;
	$lvl3 = 0;
  
	foreach ( $results[3] as $k => $r ) {
	  	switch( $results[1][$k] ) {
			case 2:
				$lvl1++;
				$niveau = '<span class="summary-title-lvl"> '. $lvl1 .'. </span>';
				$lvl2 = 0;
				$lvl3 = 0;
				break;
  
			case 3:
				$lvl2++;
				$niveau = '<span class="summary-title-lvl"> '. $lvl1 . '.' . $lvl2 .'. </span>';
				$lvl3 = 0;
				break;
  
			case 4:
				$lvl3++;
				$niveau = '<span class="summary-title-lvl"> '. $lvl1 . '.' . $lvl2 . '.' . $lvl3 .'. </span>';
				break;
		}
		$obj .= '<a href="#'. sanitize_title( $r ) .'" class="w-fit-content mw-fit-content mb-3 summary-title-lvl-'. $results[1][$k]. '">'. $niveau . $r .'</a>';
	}
	$obj .= '</nav>';

	if ( $echo ) {
		echo $obj;
	}
	else {
		return $obj;
	}
}
add_shortcode('summary','post_generated_summary');