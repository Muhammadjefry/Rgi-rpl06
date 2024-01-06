<?php
setcookie(
        'data_nis', // nama cookie yang ingn dihapus
        0, // nilai cookie, tidak penting karna ingin di hapus
        time()-1, // simpan cookie sampai 1 detik yang lalu
        '/'
 );
echo 'Anda sudah logout.';
