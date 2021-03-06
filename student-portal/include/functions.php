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

    function alert($type,$message){
		switch ($type) {
			case 's':
				return '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span>'.$message.'</span>
                        </div>';
			break;

			case 'i':
				return '<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span>'.$message.'</span>
                        </div>';
			break;

			case 'w':
				return '<div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span>'.$message.'</span>
                        </div>';
			break;

			case 'e':
				return '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span>'.$message.'</span>
                        </div>';
				break;
		}
	}

	function get_course_name($c_id){
		require "config.php";
	    $sql="SELECT * FROM iitb_discipline WHERE d_id=$c_id";
	    $query=mysqli_query($con,$sql);
	    if ($query->num_rows>0) {
	    	$result=mysqli_fetch_assoc($query);
	    	return $result['d_name'];
	    }
	}
	
?>