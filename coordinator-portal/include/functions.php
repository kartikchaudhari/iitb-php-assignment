<?php 
	/*
		provide web path to access aseets
	*/
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

    /*
		display different types of bootstrap 3 alert 
		component base on parameters.

		@param char $type takes a alert type as character
		@param string $message takes a string of message to display in alert
		@return string returns a bootstrap 3 alert commponent based on alert type.
    */
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

	/*
		it formats the php date into mysql compatible date.

		@param Date $date takes php date 
		@return Date return mysql compatible date.
	*/
	function db_date($date){
		$date1 = strtr($date, '/', '-');
		return date('Y-m-d', strtotime($date1));
	}

	/*
		it formats the php mysql into human friendly date.

		@param Date $date takes mysql date 
		@return Date returns user friendly date (Ex. October 21, 2021 )
	*/
	function pretty_date($date){
		$date1 = strtr($date, '/', '-');
		return date('F d, Y', strtotime($date1));
	}

	/*
		gets discipline name from database based on course_id stored in json string.

		@param string $json contains the json string of courses_id
		@return string returns course name according to course_id
	*/
	function get_courses($json){
		$courses=json_decode($json,TRUE);
		for ($i=0; $i <count($courses); $i++) { 
			echo get_course_name($courses[$i]).",";
		}
	}

	/*
		gets discipline name from database based on course id.

		@param int $c_id contains id of course 
		@return string returns course name according to course_id
	*/
	function get_course_name($c_id){
		require "config.php";
	    $sql="SELECT * FROM iitb_discipline WHERE d_id=$c_id";
	    $query=mysqli_query($con,$sql);
	    if ($query->num_rows>0) {
	    	$result=mysqli_fetch_assoc($query);
	    	return $result['d_name'];
	    }
	}

	/*
		gets workshop type from database based on workshop id.

		@param int $w_id contains id of workshop
		@return string returns workshop type according to workshop id
	*/
	function get_workshop_type($w_id){
		require "config.php";
	    $sql="SELECT * FROM iitb_workshop_type WHERE type_id=$w_id";
	    $query=mysqli_query($con,$sql);
	    if ($query->num_rows>0) {
	    	$result=mysqli_fetch_assoc($query);
	    	return $result['type_name'];
	    }
	}

	/*
		gets participant type from database based on participant type id.

		@param int $p_id participant type id of participant type
		@return string returns participant type according to participant type id
	*/
	function get_participant_type($p_id){
		require "config.php";
	    $sql="SELECT * FROM iitb_participants_type WHERE type_id=$p_id";
	    $query=mysqli_query($con,$sql);
	    if ($query->num_rows>0) {
	    	$result=mysqli_fetch_assoc($query);
	    	return $result['type_name'];
	    }
	}

	/*
		gets number of feedback submitted from database and based
		on those feedbacks the category of workshop is determined.

		@param Date $w_date date of workshop
		@return string returns submitted feedback with the category of workshop
	*/
	function count_participants_category($w_date){
		require "config.php";
	    $sql="SELECT count(student_id) AS 'participants_count' FROM iitb_feedback WHERE feedback_date='$w_date'";
	    $query=mysqli_query($con,$sql);
	    if ($query->num_rows>0) {
	    	$result=mysqli_fetch_assoc($query);
	    	return $result['participants_count']." | ".determine_workshop_category($result['participants_count']);
	    }
	    else{
	    	return "0"." | ".determine_workshop_category($result['participants_count']);
	    }
	}

	/*
		determines the category of workshop based on the submitted feedback

		@param int $participants_count number of participants
		@return string returns returns category of workshop
	*/
	function determine_workshop_category($participants_count){
		if ($participants_count>=101) {
			return "Workshop";
		}
		else if($participants_count>=51 && $participants_count <=100){
			return "Mini-Workshop";
		}
		else if ($participants_count<51) {
			return "Invalid";
		}
		else{
			return "Invalid";
		}

	}

	
	/*
		converts the month number into month name

		@param int $monthNum accepts month number
		@return string returns the month name 
	*/ 
	function num_to_month($monthNum){
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        return $dateObj->format('F'); // March
	}

	
?>