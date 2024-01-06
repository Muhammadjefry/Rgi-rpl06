<?php
/** KASUS:
    klien sudah memiliki desain website, mereka ingin memasukkan iklan dengan tampilan yang mirip dengan artikel disekitarnya, supaya orang tidak langsung sadar bahwa itu adalah iklan.

    - ubah isi 7 artikel yang ada supaya sesuai dengan $articles yang disediakan
    - atur supaya 'title' dan 'excerpt' terpotong setelah 20 dan 85 karakter
    - saat ini artikel iklan berada di posisi terakhir, pindahkan artikel iklan supaya bia berada diantara artikel #5 dan #6
*/





/* FUNGSI YANG MUNGKIN BERGUNA
    memotong string setelah melewati x karakter
    contoh:
      echo trunkasi( 'Merah Putih Teruslah Kau Berkibar!', 20 );
    
    kode tersebut akan mencetak "Merah Putih Teruslah..."
*/
function trunkasi($string, $limit) {
  if(strlen($string) <= $limit) return $string;
  if(false !== ($breakpoint = strpos($string, ' ', $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . '...';
    }
  }
  return $string;
}





/** DATA
*/

$articles = array(
    array(
        'title' => 'His mother had always taught him',
        'label' => 'history',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/aaron-burden-Aa3ALtIxEGY-unsplash.jpg',
        'excerpt' => 'His mother had always taught him not to ever think of himself as better than others. He\'d tried to live by this motto. He never looked down on those who were less fortunate or who had less money than him. But the stupidity of the group of people he was talking to made him change his mind.',
    ),
    array(
        'title' => 'He was an expert but not in a discipline',
        'label' => 'fiction',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/aaron-burden-b9drVB7xIOI-unsplash.jpg',
        'excerpt' => 'He was an expert but not in a discipline that anyone could fully appreciate. He knew how to hold the cone just right so that the soft server ice-cream fell into it at the precise angle to form a perfect cone each and every time. It had taken years to perfect and he could now do it without even putting any thought behind it.',
    ),
    array(
        'title' => 'Dave watched as the forest burned up on the hill',
        'label' => 'history',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/adam-bixby-Ix78f0AuCBI-unsplash.jpg',
        'excerpt' => 'Dave watched as the forest burned up on the hill, only a few miles from her house. The car had been hastily packed and Marta was inside trying to round up the last of the pets. Dave went through his mental list of the most important papers and documents that they couldn\'t leave behind. He scolded himself for not having prepared these better in advance and hoped that he had remembered everything that was needed. He continued to wait for Marta to appear with the pets, but she still was nowhere to be seen.',
    ),
    array(
        'title' => 'All he wanted was a candy bar',
        'label' => 'mystery',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/adam-stefanca-JrM_SWb2gJA-unsplash.jpg',
        'excerpt' => 'All he wanted was a candy bar. It didn\'t seem like a difficult request to comprehend, but the clerk remained frozen and didn\'t seem to want to honor the request. It might have had something to do with the gun pointed at his face.',
    ),
    array(
        'title' => 'Hopes and dreams were dashed that day',
        'label' => 'fiction',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/ales-nesetril-Im7lZjxeLhg-unsplash.jpg',
        'excerpt' => 'Hopes and dreams were dashed that day. It should have been expected, but it still came as a shock. The warning signs had been ignored in favor of the possibility, however remote, that it could actually happen. That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down.',
    ),
    array(
        'title' => 'Dave wasn\'t exactly sure how he had ended up',
        'label' => 'classic',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/alisa-anton-JhxGkGgd3Sw-unsplash.jpg',
        'excerpt' => 'Dave wasn\'t exactly sure how he had ended up in this predicament. He ran through all the events that had lead to this current situation and it still didn\'t make sense. He wanted to spend some time to try and make sense of it all, but he had higher priorities at the moment. The first was how to get out of his current situation of being naked in a tree with snow falling all around and no way for him to get down',
    ),
    array(
        'title' => 'This is important to remember',
        'label' => 'crime',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/ameya-purohit-xWLgCy2JpWo-unsplash.jpg',
        'excerpt' => 'This is important to remember. Love isn\'t like pie. You don\'t need to divide it among all your friends and loved ones. No matter how much love you give, you can always give more. It doesn\'t run out, so don\'t try to hold back giving it as if it may one day run out. Give it freely and as much as you want.',
    ),
    /*
    array(
        'title' => 'One can cook on and with an open fire',
        'label' => 'classic',
        'pic' => 'http://192.168.1.37/azis/img/dummyjson/amin-hasani-uDSMTV06s4U-unsplash.jpg',
        'excerpt' => 'One can cook on and with an open fire. These are some of the ways to cook with fire outside. Cooking meat using a spit is a great way to evenly cook meat. In order to keep meat from burning, it\'s best to slowly rotate it',
    ),
    */
);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Cards</title>
    <style>
/* Block */
.card {
  width: calc(25% - 36px);

  font-family: 'Playfair Display', serif;
  text-align: center;

  transition: all .125s;
  transform: scale(1) translateY(0px);
}

/* Elements */
.card__wrapper {
  padding-top: .1px;
  padding-bottom: .1px;
  position: relative;

  background-color: #ffffff;
  color: #999999;
  box-shadow: 0 0 5px 0 rgba(0,0,0,.05);
}
.card__wrapper:after {
  content: '';
  position: absolute;
  z-index: -1;
  top: 15px;
  right: 15px;
  bottom: 0;
  left: 15px;

  box-shadow: 0 5px 15px 0 rgba(0,0,0,.2);
  transition: all .125s;
  transform: scale(1) translateY(0px);
}
.card__box {
  padding-right: 35px;
  padding-left: 35px;
  margin-top: 25px;
  margin-bottom: 25px;
}
.card__item  {
  margin-top: 20px;
  margin-bottom: 20px;
}
.card__item--small  {
  margin-top: 10px;
  margin-bottom: 10px;
}
.card__feature {
  margin-top: 0;
  margin-right: 0;
  margin-bottom: 0;
  margin-left: 0;
}
.card__img {
  display: block;
  max-width: 100%;
  height: 240px;
  width: 100%;
  object-fit: cover;
}
.card__header {
  position: relative;
  z-index: 1;
}
.card__title {
  color: #222222;

  font-size: 30px;
  font-weight: 400;
  line-height: 1.25;
}
.card__label {
  color: #cccccc;

  font-family: 'Montserrat', sans-serif;
  font-size: 8px;
  text-transform: uppercase;
  letter-spacing: .2em;
}
.card__divider {
  display: block;
  width: 100%;
  height: 15px;

  border: none;
  background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSIyOHB4IiBoZWlnaHQ9IjE1cHgiIHZpZXdCb3g9IjAgMCAyOCAxNSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjggMTUiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGZpbGw9IiNERURFREUiIGQ9Ik0yNy41LDdoLTZDMjEuMiwzLjEsMTgsMCwxNCwwUzYuOCwzLjEsNi41LDdoLTZDMC4yLDcsMCw3LjIsMCw3LjVTMC4yLDgsMC41LDhoNmMwLjMsMy45LDMuNSw3LDcuNSw3czcuMi0zLjEsNy41LTdoNkMyNy44LDgsMjgsNy44LDI4LDcuNVMyNy44LDcsMjcuNSw3eiBNMTQsMWMzLjQsMCw2LjIsMi42LDYuNSw2SDcuNUM3LjgsMy42LDEwLjYsMSwxNCwxeiBNMTQsMTRjLTMuNCwwLTYuMi0yLjYtNi41LTZoMTIuOUMyMC4yLDExLjQsMTcuNCwxNCwxNCwxNHoiLz48L3N2Zz4=);
  background-repeat: no-repeat;
  background-position: center center;
}
.card__body {
  font-size: 12px;
  line-height: 1.75;
}

/* Modifiers */
.card:hover {
  cursor: pointer;
  transform: scale(1.05);
}
.card:hover .card__wrapper {
  box-shadow: 0 0 10px 0 rgba(0,0,0,10);
}
.card:hover .card__wrapper:after {
  transform: scale(0.95) translateY(10px);
}

/* Demo */
body {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background-color: #e9ebea;
  text-align: center;
}
.card {
  display: inline-block;
  margin-top: calc( ( 100vh - 506px ) / 2 );
  margin-right: 15px;
  margin-left: 15px;
  top: 50%;
}
    </style>
</head>
<body>

<?php 
  $nurut = 0;
foreach( $articles as $a ) { 
  $nurut = $nurut + 1;
  if($nurut > 5 && $nurut < 7){
   echo '<article class="card">
    <div class="card__wrapper">

        <figure class="card__feature">
        <img src="http://192.168.1.37/azis/img/dummyjson/camilo-jimenez-qZenO_gQ7QA-unsplash.jpg" class="card__img" alt="waves" width="275" height="240">
        </figure>

        <div class="card__box">

        <header class="card__item card__header">
            <h6 class="card__item card__item--small card__label">Ad</h6>
            <h2 class="card__item card__item--small card__title">Raid: Shadow Legends</h2>
        </header>

        <hr class="card__item card__divider">

        <section class="card__item card__body">
            <p>Download Raid: Shadow Legends using the coupon code pleaseKillMe666 to get free...</p>
        </section>

        </div>

    </div>
</article>';
  }
  echo '<article class="card">
  <div class="card__wrapper">

      <figure class="card__feature">
      <img src="'.$a['pic'].'" class="card__img" alt="waves" width="275" height="240">
      
      </figure>

      <div class="card__box">

      <header class="card__item card__header">
          <h6 class="card__item card__item--small card__label">'.$nurut.'</h6>
          <h2 class="card__item card__item--small card__title">'. trunkasi( $a['title'], 20 ).'</h2>
      </header>

      <hr class="card__item card__divider">

      <section class="card__item card__body">
          <p>'. trunkasi( $a['excerpt'], 85 ).'</p>
      </section>

      </div>

  </div>
</article>'
  ?>
  
<?php 


} ?>

    <!-- IKLAN MULAI -->
  
    <!-- IKLAN BERAKHIR -->



    
</body>
</html>