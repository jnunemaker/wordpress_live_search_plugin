<?php
/*
Plugin Name: Addicted To Live Search
Plugin URI: http://addictedtonew.com/archives/145/wordpress-live-search-plugin/
Description: Adds live search with ajax to the default search box
Author: John Nunemaker
Version: 1.1
Author URI: http://addictedtonew.com/
*/

function addicted_add() {
	echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6/prototype.js"></script>' . "\n";
	echo '<script type="text/javascript" src="' . get_bloginfo('siteurl') . '/wp-content/plugins/addicted_live_search/live_search.js"></script>' . "\n";
	echo '
	<script type="text/javascript">
		AddictedToLiveSearch.url = "' . get_bloginfo('siteurl') . '/wp-content/plugins/addicted_live_search/search_results.php";
	</script>';
}

add_action('wp_footer', 'addicted_add');

function addicted_search_rewrite($wp_rewrite) {
	$rules = array('wp-content/plugins/addicted_live_search/search_results.php' => '/');
	$wp_rewrite->rules = $rules + $wp_rewrite->rules;
}

add_filter('generate_rewrite_rules', 'addicted_search_rewrite');
?>