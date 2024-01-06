<?php get_header(); ?>
    <h1>INI HALAMAN SINGULAR
         </h1>
<?php 

if(have_posts()){
    while(have_posts()){
        the_post();

        $old =get_post_meta(
            $post->ID,
            'post_pv',
            true
        );
        // ambil dari wp_post metamilik artikel dengan id ynag disebut. klo hasilnya ada , gunakan hasil tsb, klo ga ada hasilnya adalah false                                 
        $new = ($old != false) ? $old+1 : 1;
    // false kita anggap mulai dari 0
       
    update_post_meta(
        $post->ID,
        'post_pv',
        $new
    );
     
    echo '<hr><p> Website ini sudah dilihat sebanyak '.$new.' kali.<p/>'; 

      the_content();

      echo '<p>' .abc(). '</p>';
 
    }
}else{
    // Tidak ada artikel
}
?>
 <?php get_footer(); ?>

