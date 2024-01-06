<?php
require_once( 'teks.php' );

/* mulai kerjakan dari sini */

$xxx = $ipsum;
$t = 'Kancil';
$c = 'Jalal ';
$b = ($xxx);
$xxx = str_ireplace($t,$c,$b);

////------simple-------

// $xxx = str_ireplace('Kancil','Jalal',$xxx);
//$xxx = str_replace($t,$c,$b); bpeduli huruf besar kecil

/* STOP!!! */
echo '<pre>' . $xxx . '</pre>';