<?php get_header(); ?>

<?php 
           if(have_posts()){
            while(have_posts()){
                the_post();
                // Template mulai disini
                    ?>
                    <!-- Taruh Template html di tempat ini -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5" style="background: linear-gradient(rgba(53, 53, 53, .7), rgba(53, 53, 53, .7)), url( <?php echo fimage(get_the_ID()); ?>  ) center center no-repeat;">
      <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php the_title();  ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a class="text-white" href="#"><?php echo get_the_author_meta('display_name');  ?></a>
            </li>
            <li class="breadcrumb-item">
              <a class="text-white" href="#"><?php echo get_the_date(); ?></a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
            <?php echo get_post_pv(get_the_ID()) . ' Views '; set_post_pv(get_the_ID());  ?>
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden my-5 px-lg-0">
      <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
          <div class="col-lg-2 ps-lg-0" style="min-height: 400px"></div>
          <div
            class="col-lg-8 about-text py-5 wow fadeIn"
            data-wow-delay="0.5s">
            <div class="p-lg-5 pe-lg-0 entry-content">
              <!-- content starts here -->
             <?php the_content(); ?>
              <!-- content ends here -->
            </div>
          </div>
          <div class="col-lg-2 ps-lg-0" style="min-height: 400px"></div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <?php
                // Template Berakhir disini
            }
        }
             ?>



  <?php get_footer(); ?>