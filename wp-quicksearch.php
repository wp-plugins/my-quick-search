<?php
/*
Plugin Name: My Quick Search
Plugin URI: http://www.adityasubawa.com/blog/post/86/my-quick-search-wordpress-plugins.html
Description: Display quick custom search form as a stylish search form widgets in WordPress.
Version: 1.3
Author: Aditya Subawa
Author URI: http://www.adityasubawa.com
*/
class wp_adityasearch extends WP_Widget{
    
    function __construct(){
     $params=array(
            'description' => 'Display Simple quick custom search form', //deskripsi  dari plugin  yang di tampilkan
            'name' => 'My Quick Search'  //title dari plugin
        );
        
        parent::__construct('wp_adityasearch', '', $params); 
    }
    
    public function form($instance){
       ?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('author_credit'); ?>"><?php _e('Give credit to plugin author?'); ?><input type="checkbox" class="checkbox" <?php checked( $instance['author_credit'], 'on' ); ?> id="<?php echo $this->get_field_id('author_credit'); ?>" name="<?php echo $this->get_field_name('author_credit'); ?>" /></label></p>
<p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=ZMEZEYTRBZP5N&lc=ID&item_name=Aditya%20Subawa&item_number=426267&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" alt="<?_e('Donate')?>" /></a></p>

	   <?php
    }
    
    public function widget($args, $instance){
      extract($args, EXTR_SKIP);
    $authorcredit = isset($instance['author_credit']) ? $instance['author_credit'] : false ; // give plugin author credit
    echo $before_widget;
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
	 ?>
	 <form class="quick_search" method="post" id="adityasearch" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<p>
<input type="text" name="s" id="s" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" />
</p>
</form>
<?php
echo "<style type=\"text/css\">
#adityasearch {
text-align: center;
}

#adityasearch input[type=text] {
-webkit-border-radius: 20px;
-moz-border-radius: 20px;
border-radius: 20px;
border: 1px solid #bbb;
height: 26px;
width: 100%;
color: #ccc;
-webkit-box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
-moz-box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
text-indent: 30px;
background: #fff url(http://www.adityasubawa.com/images/icn_search.png) no-repeat;
background-position: 10px 6px;
}

#adityasearch input[type=text]:focus {
outline: none;
color: #666666;
border: 1px solid #77BACE;
-webkit-box-shadow: inset 0 2px 2px #ccc, 0 0 10px #ADDCE6;
-moz-box-shadow: inset 0 2px 2px #ccc, 0 0 10px #ADDCE6;
box-shadow: inset 0 2px 2px #ccc, 0 0 10px #ADDCE6;
}
</style>";

	 if ($authorcredit) { ?>
			<p style="font-size:10px;">
				Plugins by <a href="http://www.adityasubawa.com" title="Bali Web Design">Bali Web Design</a>
			</p>
			<?php }
	echo $after_widget;
  }
}
add_action('widgets_init', 'register_wp_adityasearch');
function register_wp_adityasearch(){
    register_widget('wp_adityasearch');
}
?>