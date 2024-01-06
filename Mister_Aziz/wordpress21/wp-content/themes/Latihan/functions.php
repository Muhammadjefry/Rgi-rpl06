<?php 

function abc(){
    return 'Copy Right BY Muhammad Jfry';
}

function totalpv(){
$old = get_option('total_pv', 0 ); // ambil data total_pv dari table wp_options, jika tidak ada gunakan 0 sebagai nilai
$new = $old + 1 ;
update_option('total_pv', $new);// update data di baris ' total_pv di wo options nilai yang baru adalah $ new

echo '<hr><p> Website ini sudah dilihat sebanyak '.$new.' kali.<p/>'; 

}

function get_post_pv($postID){
    $old =get_post_meta(
        $postID,
        'post_pv',
        true
    );
    // ambil dari wp_post metamilik artikel dengan id ynag disebut. klo hasilnya ada , gunakan hasil tsb, klo ga ada hasilnya adalah false         
    $new = ($old != false) ? $old+1 : 1;
    // false kita anggap mulai dari 0
    return $new;                        
}
// hanya menyimpan data baru untuk metadata post_pv funsi ini tidak mencetak apapun
function set_post_pv($postID){
    update_post_meta(
        $postID,
        'post_pv',
        get_post_pv($postID)
    );
}