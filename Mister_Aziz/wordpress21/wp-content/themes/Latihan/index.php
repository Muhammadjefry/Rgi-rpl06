<?php get_header(); ?>
    <h1>Ini adalah index.php </h1>
<?php 
if(have_posts()){
    while(have_posts()){
        the_post();

        //Start Tampilan
     echo '<h2>' .$post->post_name .'('. get_post_pv($post->ID) . 'views)</h2>';                                                                                     
        //$new = ($old != false);
        /*
        judul : the_title();
        content : the_content();
        excerpt : the_excerpt();
        ...........
        ( kalau digunakan di dalam echo tambahkan 'get_' ke awal nama fungsi)
        */
        //END
    }
}else{
    // Tidak ada artikel
}
?>
 <?php get_footer(); ?>

