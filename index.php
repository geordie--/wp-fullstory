<?php

/*
Plugin Name: wp-fullstory
Plugin URI: https://github.com/geordie--/wp-fullstory
Description: Simple WordPress plugin to embed FullStory snippet
Author: Giorgio Delle Grottaglie
Version: 1.0
License: GPL
Author URI: https://github.com/geordie--/
*/


add_action('admin_menu', 'fullstory_admin_menu');

function fullstory_admin_menu() {
  add_menu_page('FullStory JS Snippet', 'FullStory', 'administrator','fullstory_options', 'fullstory_admin_overview');
  add_action( 'admin_init', 'register_fullstory_settings' );
 }

function register_fullstory_settings() {
  register_setting( 'fullstory-group', 'fullstory_snippet' );
 } 

function fullstory_admin_overview() { ?>

<div class="wrap">
<h2>FullStory Snippet</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'fullstory-group' ); ?>
        <p style="width: 70%;">Paste your FullStory Snippet snippet here </p>
        <textarea name="fullstory_snippet" id="fullstory_snippet" cols="60" rows="15"><?php echo get_option('fullstory_snippet'); ?></textarea>
        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>


<?php }

function embed_snippet() {
  echo get_option("fullstory_snippet");
}

add_action('wp_footer', 'embed_snippet');

 ?>
