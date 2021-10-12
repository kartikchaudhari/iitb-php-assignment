<?php 
	
	function base_url($str){
		require "config.php";
		return $base_url.$str;
	}

	/* Clean up any data */
    function clean_post_input($data) {
        /* trim whitespace */
        $data = trim($data);
        
        $data = htmlspecialchars($data);
        return $data;
    }

	
?>