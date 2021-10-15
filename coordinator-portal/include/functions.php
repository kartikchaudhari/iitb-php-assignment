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

	function db_date($date){
		$date1 = strtr($date, '/', '-');
		return date('Y-m-d', strtotime($date1));
	}

	function get_courses($json){
		$courses=json_decode($json,TRUE);
		for ($i=0; $i <count($courses); $i++) { 
			echo get_course_name($courses[$i]).",";
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

	function get_workshop_type($w_id){
		require "config.php";
	    $sql="SELECT * FROM iitb_workshop_type WHERE type_id=$w_id";
	    $query=mysqli_query($con,$sql);
	    if ($query->num_rows>0) {
	    	$result=mysqli_fetch_assoc($query);
	    	return $result['type_name'];
	    }
	}

	function get_participant_type($p_id){
		require "config.php";
	    $sql="SELECT * FROM iitb_participants_type WHERE type_id=$p_id";
	    $query=mysqli_query($con,$sql);
	    if ($query->num_rows>0) {
	    	$result=mysqli_fetch_assoc($query);
	    	return $result['type_name'];
	    }
	}

	
?>