<?php
/*
Plugin Name: Your Lightbox
plugin URl: http://pixel.org.il
Description: Display lightbox with your message or like button to all visitors
Author: Reuven Karasik(Kinging)
Version: 1.0
Author URl: reuven.karasik.org
*/

function msp(){
echo "Here you can set the settings of the lightbox."."<br />";
include "settings/lbsettings.php";
};




function my_plugin_menu() {
    add_posts_page('Configure Lightbox', 'Configure Lightbox', '8', 'yl', 'msp');
};
add_action('admin_menu', 'my_plugin_menu');





include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
//include_once( ABSPATH . 'wp-admin/includes/link-template.php' );


$plugin_path = plugins_url();


  If (!is_plugin_active('your-text-manager/ytm.php')) {
      //plugin is activated
   

function my_init() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		//wp_deregister_script('jquery'); 
		//wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, '1.3.2'); 
		wp_enqueue_script('jquery');


	};
};



add_action('init', 'my_init');




function jquery_tabify() {
    wp_enqueue_script(
        'jquery-tabify',
        $plugin_path . '/wp-content/plugins/your-lightbox/includes/jquery.colorbox.js',
        array( 'jquery' )
    );
}
add_action( 'wp_enqueue_scripts', 'jquery_tabify' );









function add_newstyle_stylesheet() {
    wp_register_style( 'newstyle', $plugin_path . '/wp-content/plugins/your-lightbox/includes/colorbox.css' );
    wp_enqueue_style( 'newstyle' );
}
add_action( 'wp_enqueue_scripts', 'add_newstyle_stylesheet' );




function head_code(){


     $code = "<script>jQuery(document).ready(function(){jQuery('.inline').colorbox({inline:true, width:'50%'});";
  
    if(get_option('lightbox_switch_ytm') == "yes"){

	
	$code.= "jQuery('.inline').click();";
		
	
        };

    $code .= "});</script>";
    
    echo $code;
 
	
};




add_action('wp_head', 'head_code');




function foot_code() {
   
    echo "<p style='display: none;'><a class='inline' id='reuven'  href='#inline_content'>Inline HTML</a></p><div style='display:none'><div id='inline_content' style='padding:10px; background:#fff; padding-bottom: 200px;'><h1>".get_option('lightbox_title_ytm')."</h1><br /><div id='content'>".get_option('lightbox_content_ytm')."</div>";
    
     if(get_option('like_switch_ytm') == "yes"){

	
	echo "<div id='fb-root'></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = '//connect.facebook.net/he_IL/all.js#xfbml=1&appId=472916912801050';fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>";
	echo "<div class='fb-like' data-href='".get_option('like_url_ytm')."' data-send='false' data-width='450' data-show-faces='true'></div><br /><br /><br /><br /><br /><br /><br /><br />";
	
        };
    
    
    echo "</div></div>";
}

add_action('wp_footer', 'foot_code');






}








?>