<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<?php if( is_user_logged_in() ) { ?>
	<div id="kanvas">
		<button id="hadir">PEKO!</button>
		<br/>
		<p>This site is only accessible by devices connected to the same network.</p>
	</div>

	<script>
function gel(el) {
	return document.querySelector(el);
}

gel('#hadir').addEventListener('click', function(e) {
	const d = new FormData();
	d.append('action','absen');
	
	fetch(absensi_misc_data.ajax_url, {
		method: "POST",
		credentials: 'same-origin',
		body: d
	})
	.then((response) => response.json())
	.then((data) => {
		console.log(data);
		alert(data);
	})
	.catch((error) => {
		console.log(error);
	});
});
	</script>
<?php } else { ?>
	<h2>Who?</h2>
<?php } ?>

<?php
if( isset($_GET['mode']) && $_GET['mode'] == 'wannagohome' ) {
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
}
?>


	
<?php wp_footer(); ?>
</body>
</html>