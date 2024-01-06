<?php 
totalpv();
?>
<?php 

if(is_user_logged_in()){
    $pesan = 'Password Wifinya adalah "BentarTungguinDuluYa"';
}else{
    $pesan = 'Anda harus login dulu untuk mendapatkan password wifi.';
}

echo "<p>$pesan</p>";
?>
    <script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>
</body>
</html>