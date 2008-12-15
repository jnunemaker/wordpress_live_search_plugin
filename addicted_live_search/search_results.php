<?php 
require('../../../wp-blog-header.php'); 

if (isset($_GET['s']) && trim($_GET['s']) != '') {
  
  $term = mysql_real_escape_string(trim($_GET['s']));
  $sql = "SELECT 
            * 
          FROM 
            wp_posts wp 
          WHERE 
            wp.post_type = 'post' AND 
            wp.post_status = 'publish' AND 
            wp.post_date <= '" . date('Y-m-d H:i:s', time()) . "' AND
            ((wp.post_title LIKE '%${term}%') OR (wp.post_content LIKE '%${term}%')) 
          ORDER BY 
            wp.post_date DESC 
          LIMIT 10";
  $posts = $wpdb->get_results($sql);
  
  if (count($posts) > 0) {
    echo '<ul>';
    foreach($posts as $post) {
      echo '<li><a href="' . get_permalink($post->ID) . '">' . the_title('', '', false) . '</a></li>';
    }
    echo '</ul>';
  } else {
    echo '<p>No results found.</p>';
  }
  
}
?>