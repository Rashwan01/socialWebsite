<?php 
function convertTime($start)
{

	$time_now = date('Y-m-d H:i:s');
					$start_date = new datetime($start); // Time of Post
					$end_date = new datetime($time_now); ////rime now
					$interval = $start_date->diff($end_date); // diffrence between them










					if($interval->y >= 1) {
						if($interval == 1)
							$time_message = $interval->y . ' year ago'; //1 year ago
						else 
							$time_message = $interval->y . ' years ago'; //1+ year ago
					}
					else if ($interval-> m >= 1) {
						if($interval->d == 0) {
							$days = ' ago';
						}
						else if($interval->d == 1) {
							$days = $interval->d . ' day ago';
						}
						else {
							$days = $interval->d . ' days ago';
						}


						if($interval->m == 1) {
							$time_message = $interval->m . ' month'. $days;
						}
						else {
							$time_message = $interval->m . ' months'. $days;
						}

					}
					else if($interval->d >= 1) {
						if($interval->d == 1) {
							$time_message = 'Yesterday';
						}
						else {
							$time_message = $interval->d . ' days ago';
						}
					}
					else if($interval->h >= 1) {
						if($interval->h == 1) {
							$time_message = $interval->h . ' hour ago';
						}
						else {
							$time_message = $interval->h . ' hours ago';
						}
					}
					else if($interval->i >= 1) {
						if($interval->i == 1) {
							$time_message = $interval->i . ' minute ago';
						}
						else {
							$time_message = $interval->i . ' minutes ago';
						}
					}
					else {
						if($interval->s < 30) {
							$time_message = 'Just now';
						}
						else {
							$time_message = $interval->s . ' seconds ago';
						}
					}


					return $time_message;
				}

				?>
