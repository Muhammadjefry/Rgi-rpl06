<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
global $wpdb;
$table = $wpdb->prefix . "absensi";
$user_id = get_current_user_id();
$current_week = date( 'W', time() );

$logs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE user_id=$user_id ORDER BY timestamp ASC LIMIT 1000") );

	$xxx = array();
	foreach( $logs as $log ) {
		$t = $log->timestamp;
		if( date( 'W', $t ) == $current_week ) {
			if( $log->action == 1 ) {
				$xxx['starts'][] = $t;
			} else {
				$xxx['ends'][] = $t;
			}
		}
}

$t_count_s = count($xxx['starts']) - 1; // because index starts from 0
$t_count_e = count($xxx['ends']) - 1;

$t_starts = array_sum($xxx['starts']);

if( $t_count_s > $t_count_e ) {
		// $xxx['ends'][] = $xxx['ends'][($t_count_e)];
		$xxx['ends'][] = time();
		$state = 1;
} else {
		$state = 0;
}
$t_ends = array_sum($xxx['ends']);

$totalSeconds = $t_ends - $t_starts;

if( $state == 1 ) {
		echo '<p>Minggu ini anda telah login selama:<br/><span class="play" data-atime="' . (time() + $totalSeconds) . '"></span></p>';
} else {
		echo '<p>Minggu ini anda telah login selama:<br/><span class="pause">' . sprintf('%02d:%02d:%02d', ($totalSeconds/3600),($totalSeconds/60%60), $totalSeconds%60) . '</span></p>';
}
?>
<script>
function secondsToHHMMSS(totalSeconds) {
  var hours = Math.floor(totalSeconds / 3600),
    minutes = Math.floor((totalSeconds - hours * 3600) / 60),
    seconds = totalSeconds - hours * 3600 - minutes * 60;

  // Padding the values to ensure they are two digits
  if (hours < 10) {
    hours = "0" + hours;
  }
  if (minutes < 10) {
    minutes = "0" + minutes;
  }
  if (seconds < 10) {
    seconds = "0" + seconds;
  }

  // return hours + 'h:' + minutes + 'm:' + seconds + 's';
  return hours + ":" + minutes + ":" + seconds;
}

var h1 = document.querySelector(".play");
var starts = Math.floor(new Date().getTime() / 1000.0);
var ends = h1.getAttribute("data-atime");
setInterval(function () {
  ends++;
  h1.innerText = secondsToHHMMSS(ends - starts);
}, 1000);
</script>


	
<?php wp_footer(); ?>
</body>
</html>