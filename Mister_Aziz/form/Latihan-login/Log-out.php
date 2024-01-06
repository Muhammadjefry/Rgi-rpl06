<?php 
setcookie(
    'teslogin',
    'oke',
    time() - 1,
);
echo 'Anda berhasil logout';


?>