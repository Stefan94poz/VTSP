<?php
function setExamCookie(){
	$db_call = new SsluzbaModel();
	$db_call->query('SELECT * FROM prijava_ispita WHERE id = 1  ORDER BY start_date DESC');
	$row = $db_call->single();
	 //var_dump($row);
	//echo $row['start_date'] . " " . $row['end_date'];
	$cookie_name = "prijava_ispita";
	$cookie_value = "true";

	$start_date_str = date('d.m.Y' , strtotime($row['start_date']));

	$end_date_str = date('d.m.Y' , strtotime($row['end_date']));

	$start_date = new DateTime($start_date_str);
	$end_date = new DateTime($end_date_str);

 	$interval = $start_date->diff($end_date);
	$valid_date = $interval->format("%r%a");
	$time_left = "Ostalo je " . $interval->days." dana ";
	$interval->days;

	if (isset($_COOKIE["prijava_ispita"]) == false and $valid_date >= 0 ) {
			setcookie($cookie_name, $cookie_value, time() + (86400 * $interval->days)); // 86400 = 1 day
	}

	if($valid_date >= 0){
		unset($_COOKIE[$cookie_name]);
		setcookie($cookie_name, $cookie_value, time() + (86400 * $interval->days));
	}else {
		setcookie($cookie_name, $cookie_value, time() - (86400 * 0));
	}
}
?>
