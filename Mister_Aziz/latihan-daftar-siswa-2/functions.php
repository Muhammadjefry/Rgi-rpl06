<?php
if( $_SERVER['REQUEST_METHOD']=='GET'&&realpath(__FILE__)==realpath($_SERVER['SCRIPT_FILENAME'])){header('HTTP/1.0 403 Forbidden',TRUE,403 );die("<h2>Access Denied!</h2>");}
//Menunjukan waktu GMT+7
date_default_timezone_set('Asia/Jakarta');
define( 'SERVERNAME', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', '' );
define( 'DB_NAME', 'chat1' );

function userid() {
    return $_COOKIE['data_nis'];
}
function itungUsia($x) {
    $year = (date('Y') - date('Y',strtotime($x)));
    return $year;
}
function translateGend($x) {
    $gend = ( $x == 0 ) ? 'L' : 'P';
    return $gend;
}
function translateClass($x) {
    if( $x == 1 ) {
        $clas = 'TB';
    } elseif( $x == 2 ) {
        $clas = 'OTO';
    } else {
        $clas = 'RPL';
    }
    return $clas;
}
function relativeDate($date) {
	$secondsago = time() - $date;
	if ($secondsago <= 59) {$timestamp = "less than a minute ago";}
	else if ($secondsago <= 119) {$timestamp = floor(($secondsago / 60)) . " minute ago (" . strftime('%R', $date) . ")";}
	else if ($secondsago <= 3599) {$timestamp = round(($secondsago / 60)) . " minutes ago (" . strftime('%R', $date) . ")";}
	else if ($secondsago <= 7199) {$timestamp = round(($secondsago / 3600),1) . " hours ago (" . strftime('%a %R', $date) . ")";}
	else if ($secondsago <= 86400) {$timestamp = round(($secondsago / 3600)) . " hours ago (" . strftime('%a %R', $date) . ")";}
	else if ($secondsago <= 345600) {$timestamp = round(($secondsago / 86400)) . " days ago (" . strftime('%a %R', $date) . ")";}
	else { $timestamp = strftime('%d %m %Y %R', $date); }

	return $timestamp;
}
function storeIsOpen() {
    $status = FALSE;
    $storeSchedule = [
        'Mon' => ['08:00 AM' => '07:00 PM'],
        'Tue' => ['08:00 AM' => '07:00 PM'],
        'Wed' => ['08:00 AM' => '07:00 PM'],
        'Thu' => ['08:00 AM' => '07:00 PM'],
        'Fri' => ['08:00 AM' => '07:00 PM'],
        'Sat' => ['08:00 AM' => '07:00 PM']
    ];

    //get current East Coast US time
    $timeObject = new DateTime('Asia/Jakarta');
    $timestamp = $timeObject->getTimeStamp();
    $currentTime = $timeObject->setTimestamp($timestamp)->format('H:i A');

    // loop through time ranges for current day
    foreach ($storeSchedule[date('D', $timestamp)] as $startTime => $endTime) {

        // create time objects from start/end times and format as string (24hr AM/PM)
        $startTime = DateTime::createFromFormat('h:i A', $startTime)->format('H:i A');
        $endTime = DateTime::createFromFormat('h:i A', $endTime)->format('H:i A');

        // check if current time is within the range
        if (($startTime < $currentTime) && ($currentTime < $endTime)) {
            $status = TRUE;
            break;
        }
    }
    return $status;
}
function secondsTo($seconds) {
    $t = round($seconds);
    return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
  }
