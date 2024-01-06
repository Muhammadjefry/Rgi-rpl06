<?php

define( 'SERVERNAME', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', '' );
define( 'DB_NAME', 'data_siswa' );

function userid() {
    $ip = explode( '.', $_SERVER['REMOTE_ADDR'] )[3];
    if( $ip == 37 ) {
        $uid = 9;
    } elseif( $ip == 11 ) {
        $uid = 1;
    } elseif( $ip == 26 ) {
        $uid = 2;
    } elseif( $ip == 30 ) {
        $uid = 3;
    } elseif( $ip == 28 ) {
        $uid = 4;
    } elseif( $ip == 12 ) {
        $uid = 5;
    } elseif( $ip == 29 ) {
        $uid = 6;
    } elseif( $ip == 23 ) {
        $uid = 7;
    } else {
        $uid = 0;
    }
    return $uid;
}
function translateNama($uid) {
    if( $uid == 9 ) {
        $nama = "Azis";
    } elseif( $uid == 1 ) {
        $nama = "Dimas";
    } elseif( $uid == 2 ) {
        $nama = "Udin";
    } elseif( $uid == 3 ) {
        $nama = "Lucky";
    } elseif( $uid == 4 ) {
        $nama = "Jalal";
    } elseif( $uid == 5 ) {
        $nama = "Sulaiman";
    } elseif( $uid == 6 ) {
        $nama = "Jeffry";
    } elseif( $uid == 7 ) {
        $nama = "Alvin";
    } else {
        $nama = "Tuyul";
    }
    return $nama;
}