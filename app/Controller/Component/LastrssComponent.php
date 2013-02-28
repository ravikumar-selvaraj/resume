<?php 
/*
 * LastRSS CakePHP Component
 * Copyright (c) 2007 Jimmy Gleason
 * www.jimmygleason.com
 *
 * Based on the work of Matt Curry (http://bakery.cakephp.org/articles/view/simplepie-cakephp-component) &
 * Based on the work of Scott Sansoni (http://cakeforge.org/snippet/detail.php?type=snippet&id=53) 
 *
 * @author Jimmy Gleason
 * @version 1.0
 * @license MIT
 *
 */  

class LastrssComponent extends Component {
   public $cache;

   function __construct() {
      $this->cache = CACHE . 'rss' . DS; 
   }

   function feed($feed_url) {
	
      // Make the cache dir if it doesn't exist
      if (!file_exists($this->cache)) {
        // uses('folder');
		App::import('Utility', 'Folder');
         $folder = new Folder();
         $folder->create($this->cache);
      }

      // Include the vendor class
     App::import('Vendor', 'lastrss');
      // Setup LastRSS
      $feed = new lastrss();
      $feed->cache_dir = $this->cache;
      $feed->cache_time = 3600; // one hour

      // Load RSS file
      if($rss = $feed->Get($feed_url)) {
         $items = $rss;
         return $items;
      } else {
		  
         // Return false
         return false;
      }
   }
}
?>