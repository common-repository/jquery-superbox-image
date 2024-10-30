<?php
/*
Plugin Name: jQuery Superbox! Image 
Plugin URI: http://mweldan.net
Version: 1.0
Author: Weldan Jamili <web@mweldan.net>
Description: Yet another plugin to enable lightbox effect in your post. Using jQuery Superbox! plugin
*/

if (!class_exists('superboximage') ) {
        class superboximage {
        
                function superboximage() {
                
                }
                
                function _loadscripts() {
                        wp_enqueue_script('jquery');
                        
                        wp_enqueue_script(
                                'superbox', 
                                plugins_url('jquery-superbox-image/jquery-superbox-0.9.1/jquery.superbox.js'), 
                                'superbox', 
                                '0.9.1' 
                        );
                        
                        wp_enqueue_style(
                                'superbox', 
                                plugins_url('jquery-superbox-image/jquery-superbox-0.9.1/jquery.superbox.css'), 
                                'superbox', 
                                '0.9.1' 
                        );
                       
                }
                
                function _runscripts() {
                ?>
                <script type="text/javascript">
                jQuery(document).ready(function() {
                        jQuery.noConflict();
                        jQuery("a img,p img").each(function() {                                
                                if ( this.className.match(/wp-image/gi) 
                                || this.className.match(/attachment-thumbnail/gi) 
                                || this.className.match(/superbox/gi)
                                )
                                {
                                        jQuery(this).parent().attr("rel", "superbox[gallery][superbox]");
                                }
                        });
                        jQuery.superbox.settings = {
	                        boxId: "superbox", // Id attribute of the "superbox" element
	                        boxClasses: "", // Class of the "superbox" element
	                        overlayOpacity: .8, // Background opaqueness
	                        boxWidth: "600", // Default width of the box
	                        boxHeight: "400", // Default height of the box
	                        loadTxt: "Loading...", // Loading text
                                closeTxt: "<img src='<?php echo plugins_url(); ?>/jquery-superbox-image/jquery-superbox-0.9.1/icon-exit.png' alt='' width='30' style='cursor:pointer' />",
		                prevTxt: "<img src='<?php echo plugins_url(); ?>/jquery-superbox-image/jquery-superbox-0.9.1/icon-prev.png' alt='' width='30' style='cursor:pointer' />",
		                nextTxt: "<img src='<?php echo plugins_url(); ?>/jquery-superbox-image/jquery-superbox-0.9.1/icon-next.png' alt='' width='30' style='cursor:pointer' />",
                        };                        
                        jQuery.superbox();
                });
                </script>
                
                <?php
                }
        
        }
}

if (class_exists('superboximage') ) {
        $superbox = new superboximage();
        
        if ( isset($superbox) ) {
                add_action('wp_head', array(&$superbox, '_loadscripts'), 1);
                add_action('wp_footer', array(&$superbox, '_runscripts'), 1);
        }
}


?>
