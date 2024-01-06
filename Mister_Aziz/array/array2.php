<?php
echo "<br>
<br>" ;
$siswa = array(
        array(
            'Anita',
            'XI IPA',
            74
        ),
        array(
            'Budi',
            'XI IPA',
            71
        ),
        array(
            'Cahyo',
            'XI IPA',
            63
        ),
    );  
echo $siswa[1] [0]. '  dari kelas  '  .$siswa[1][1]. ' mendapatkan nilai  '  .$siswa[1][2].' pada ulangan kemarin.'; 
?>