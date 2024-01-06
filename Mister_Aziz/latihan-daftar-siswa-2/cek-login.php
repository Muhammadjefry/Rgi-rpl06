<?php

echo 'Gunakan halaman ini untuk mengecek apakah kamu sudah login atau belum.';

if( isset($_COOKIE['data_nis']) ) {
    echo 'Halo, user #' . $_COOKIE['data_nis'] . '!';
} else {
    echo 'Anda belum login.';
}