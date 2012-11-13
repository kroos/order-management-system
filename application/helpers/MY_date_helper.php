<?php
//the name of the file is indicated to the extend of the native date helper
#############################################################################################################################
//date format
///*
		function date_my($string)
			{
				$temp = explode(' ', $string);
				$tempdate = explode('-', $temp[0]);
				$temptime = explode(':', $temp[1]);
				$year = $tempdate[0];
				$month = $tempdate[1];
				$day = $tempdate[2];
				$hour = $temptime[0];
				$minute = $temptime[1];
				$sec = $temptime[2];
				$mktime = mktime($hour, $minute, $sec, $month, $day, $year);
				$string = mdate("%D, %j %M %Y %g:%i %a", $mktime);
				return $string;
			}

		function date_stamp($string)
			{
				$tempdate = explode('/', $string);
				$month = $tempdate[0];
				$day = $tempdate[1];
				$year = $tempdate[2];
				$mktime = mktime(0, 0, 0, $month, $day, $year);
				return $mktime;
			}

		function my_date($string)
			{
				return mdate("%D, %j %M %Y %g:%i %a", mysql_to_unix($string));
			}

		function date_now()
			{
				return mdate('%Y-%m-%d %H:%i:%s', mysql_to_unix(now()));
			}
//*/
#############################################################################################################################

?>