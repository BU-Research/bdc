<?php
/*
Plugin Name: Ajax Load More for Relevanssi
Plugin URI: http://connekthq.com/plugins/ajax-load-more/extensions/relevanssi/
Description: An Ajax Load More extension that adds compatibility with Relevanssi
Text Domain: ajax-load-more-for-relevanssi
Author: Darren Cooney
Twitter: @KaptonKaos
Author URI: https://connekthq.com
Version: 1.0
License: GPL
Copyright: Darren Cooney & Connekt Media
*/


if(!class_exists('ALM_Relevanssi')) :   
   
   class ALM_Relevanssi{	   
      
   	function __construct(){	
         add_filter('alm_relevanssi', array(&$this, 'alm_relevanssi_get_posts'), 10, 1);	
      }
      
      
      
      /*
   	*  alm_relevanssi_get_posts
   	*  Get relevanssi search results and return post ids in post__in wp_query param
   	*
   	*  @return $args
   	*  @since 1.0
   	*/
      function alm_relevanssi_get_posts($args){
 
      	if(function_exists('relevanssi_do_query')){         	
         	
         	$old_posts_per_page = $args['posts_per_page'];
         	$old_offset = $args['offset'];
         	$args['fields'] = 'ids'; 
         	$args['posts_per_page'] = -1; // We need to get all search results for this to work
         	$args['offset'] = 0; // We don't want an offset (ALM handles this)
         	
         	$query = new WP_Query($args);
         	relevanssi_do_query($query);   
         	
      		if ( ! empty( $query->posts ) ) {
         		      			      			
      			$args['post__in'] = $query->posts; // $relevanssi_query->posts array
      			$args['orderby'] = 'post__in'; // override orderby to relevance
      			$args['s'] = ''; // Reset 's' term value
      			$args['posts_per_page'] = $old_posts_per_page; // Reset 'posts_per_page' before sending data back
      			$args['offset'] = $old_offset; // Reset 'offset' before sending data back
      			    			
      		}  
      		    			
      		return $args;	
      	}  
      	    	
      }
   }
   
   
   
   /*
   *  ALM_Relevanssi
   *  The main function responsible for returning the one true ALM_Relevanssi Instance.
   *
   *  @since 2.0.0
   */
   function ALM_Relevanssi(){
      global $ALM_Relevanssi;
      
      if( !isset($ALM_Relevanssi) ){
         $ALM_Relevanssi = new ALM_Relevanssi();
      }
      
      return $ALM_Relevanssi;
   }      
   ALM_Relevanssi(); // initialize
   
endif;