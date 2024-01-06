<?php 
// $api_url = 'http://192.168.1.29/jefry/3ideots.json';
$default_id = ( isset($_GET['i']) ) ? $_GET['i'] : 'tt1187043'  ;
$api_url = 'http://www.omdbapi.com/?apikey=431753c5&i=' . $default_id;
$data_mentah = file_get_contents($api_url);
$data_proses_1 = json_decode( $data_mentah );
// echo '<pre>';
// var_dump($data_proses_1);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Sacramento:regular);
        :root {
         --text-color: #fff;
         --bg-color: #1b1f24;
         --second-bg-color: #22282f;
         --main-color: #13bbff;
         --other-color: #c3cad5;
                
         --h1-font: 4.5rem;
         --h2-font: 2.9rem;
         --p-font: 1rem;
}
        body{
            display: flex;
            /* justify-content: center; */
            background: var(--bg-color);
        }
        .formaa button,
        #forma .bung button {
          display: inline-block;
          padding: 11px 26px;
          background: var(--main-color);
          color: var(--bg-color);
          border: 2px solid var(--main-color);
          border-radius: 8px;
          font-size: 15px;
          font-weight: 600;
          transition: all 0.5s ease;
          margin-bottom: 100px;
        }
        .formaa button:hover,
        #forma .bung button:hover {
          background: transparent;
          color: var(--main-color);
          box-shadow: 0 0 20px var(--main-color);
        }
        .formaa{
            margin: 150px auto;
        }
        .formaa input{
            height: 10px;
            padding: 10px 0 10px 10px;
            width: 100%;
            margin-bottom: 10px;
        }
        /* .formaa button{ */
            /* display: block; */
            /* margin-top: 10px;
            width: 100px;
            height: 30px;
        } */
        .formaa h1{
            font-family: 'Sacramento',sans-serif;
            text-align: center;
            margin-top: -0.1em;
            margin-bottom: -0.2em;
            font-size: 3em;
            color: var(--main-color);
        }
        #forma{
            margin: 20px auto;
            width: 60%;
        }
       .formaa input:focus,
        #forma input:focus,
        #forma textarea:focus
        {
            outline: none;
            border: none;
            background: transparent;
          color: var(--main-color);
          box-shadow: 0 0 20px var(--main-color); 
        }
        #forma input{
            height: 10px;
            padding: 10px 0 10px 10px;
            width: 100%;
            margin-bottom: 10px;
        }
        #forma .bung{
            display: flex;
            justify-content: space-between;
        }
        #forma > input{
            height: 10px;
            padding: 10px 0 10px 10px;
            width: 45%;
            margin-bottom: 10px;
        }
        #forma .bung img{
            margin-bottom: 10px;
            
        }
        #forma .bung textarea{
            margin-bottom: 10px;
            padding: 10px 0 10px 10px;

        }
      
        #forma label{
             display: block;
            margin-bottom: 10px;
            font-family:sans-serif;
            color: var(--main-color);
        }
        /* #forma .bung button{
            display: block;
            margin-top: 10px;
            width: 100px;
            height: 30px;
        } */
    </style>
</head>
<body>
  
    <form action="" method="GET" class="formaa">
        <h1>New Movie</h1>
            <input type="text" name="i" >
            <button>Submit</button>
    </form>
    <?php
     if(isset($data_proses_1->Response) && 
     $data_proses_1->Response == 'True' ) { ?>
    <form id="forma">
    <label for="">Judul</label>
    <input type="text" name="judul" value="<?php echo $data_proses_1->Title; ?>">
    <div class="bung">
         <div>
            <label for="">Synopsis</label>
            <textarea name="sinopsis" id="" cols="50" rows="10" ><?php echo $data_proses_1->Plot; ?></textarea>
            <label for="">Negara</label>
           <input type="text" name="negara" id="" value="<?php echo $data_proses_1->Country; ?>" >
           <label for="">Released</label>
           <input type="text" name="released" id="" value="<?php echo $data_proses_1->Released; ?>" >
            <button type="submit">Submit</button>
        </div>
         <div>
           <label for="">Poster</label>
           <img src="<?php echo $data_proses_1->Poster; ?>"  alt="" style="width:150px;">
           <input type="text" name="poster" id="" value="<?php echo $data_proses_1->Poster; ?>" >
        </div>
    </div>
    </form>
    <?php } ?>
    <script>
        document.querySelector("#forma").addEventListener("submit",function(e){
            e.preventDefault(); // cegah perilaku default (Submit)
            var aaa = new FormData(e.target);
            aaa.append('action', 'selipkan_film');

        fetch( '<?php echo admin_url("admin-ajax.php");?>', {
        method: 'POST',
        credentials: 'same-origin',
        body: aaa
    } )
    // .then((response) => response.json())
    .then((response) => response.text())
    .then((data) => {
       
        console.log(data);
        })
    .catch((error) => {
        console.log(error);
        })
    });

        
    </script>
</body>
</html>