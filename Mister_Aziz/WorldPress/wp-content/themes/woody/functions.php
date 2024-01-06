<?php 

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

function fimage($postID){
    if( has_post_thumbnail($postID) ){// punya
        $featured_img_url = get_the_post_thumbnail_url($postID,'full');
    }else{// tidak punya
        $featured_img_url = 'https://cdn.pnghd.pics/data/272/gambar-baby-boss-keren-17.jpg';
    }
    return $featured_img_url;
}

function truncate($string,$length=100,$append="&hellip;") {
    $string = trim($string);
  
    if(strlen($string) > $length) {
      $string = wordwrap($string, $length);
      $string = explode("\n", $string, 2);
      $string = $string[0] . $append;
    }
  
    return $string;
  }

  /// code cara mengatasi agar  memanggil framework tidak gagal / error 
  if (!is_admin()) add_action('wp_enqueue_scripts', 'woody_scripts_enqueue', 111);
  function woody_scripts_enqueue() {
      
      // css
      wp_deregister_style('font-awesome');
      wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');
      wp_enqueue_style('font-awesome');

      wp_deregister_style('bootstrap-icons');
      wp_register_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css');
      wp_enqueue_style('bootstrap-icons');

      wp_deregister_style('animate');
      wp_register_style('animate',  get_template_directory_uri() . '/ori/lib/animate/animate.min.css');
      wp_enqueue_style('animate');

      wp_deregister_style('owlcarousel');
      wp_register_style('owlcarousel',  get_template_directory_uri() . '/ori/lib/owlcarousel/assets/owl.carousel.min.css');
      wp_enqueue_style('owlcarousel');

      wp_deregister_style('lightbox');
      wp_register_style('lightbox',  get_template_directory_uri() . '/ori/lib/lightbox/css/lightbox.min.css');
      wp_enqueue_style('lightbox');

      wp_deregister_style('bootstrap');
      wp_register_style('bootstrap',  get_template_directory_uri() . '/ori/css/bootstrap.min.css');
      wp_enqueue_style('bootstrap');

      wp_deregister_style('pribadi');
      wp_register_style('pribadi',  get_template_directory_uri() . '/ori/css/style.css');
      wp_enqueue_style('pribadi');
  



      // js
      wp_deregister_script('jquery');
      wp_register_script(
          'jquery', // handle
          'https://code.jquery.com/jquery-3.4.1.min.js', // src
          array(), // dependency
          '3.4.1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('jquery');


      wp_deregister_script('bootstrap');
      wp_register_script(
          'bootstrap', // handle
          'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', // src
          array(), // dependency
          '1.3.0', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('bootstrap');


      wp_deregister_script('wow');
      wp_register_script(
          'wow', // handle
          get_template_directory_uri() . '/ori/lib/wow/wow.min.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('wow');


      wp_deregister_script('easing');
      wp_register_script(
          'easing', // handle
          get_template_directory_uri() . '/ori/lib/easing/easing.min.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('easing');



      wp_deregister_script('waypoints');
      wp_register_script(
          'waypoints', // handle
          get_template_directory_uri() . '/ori/lib/waypoints/waypoints.min.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('waypoints');

      wp_deregister_script('counterup');
      wp_register_script(
          'counterup', // handle
          get_template_directory_uri() . '/ori/lib/counterup/counterup.min.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('counterup');

      wp_deregister_script('owlcarousel');
      wp_register_script(
          'owlcarousel', // handle
          get_template_directory_uri() . '/ori/lib/owlcarousel/owl.carousel.min.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('owlcarousel');

      wp_deregister_script('isotope');
      wp_register_script(
          'isotope', // handle
          get_template_directory_uri() . '/ori/lib/isotope/isotope.pkgd.min.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('isotope');

      wp_deregister_script('lightbox');
      wp_register_script(
          'lightbox', // handle
          get_template_directory_uri() . '/ori/lib/lightbox/js/lightbox.min.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('lightbox');
      

      wp_deregister_script('pribadi');
      wp_register_script(
          'pribadi', // handle
          get_template_directory_uri() . '/ori/js/main.js', // src
          array(), // dependency
          '1', // version
          array(
              'strategy' => 'defer',
              'in_footer' => true
          )
      );
      wp_enqueue_script('pribadi');
  
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





































































?>