<?php 
function cekBIsaDibagi($i,$d){
    if($i % $d ==0){
        $output = true;
    }else{
        $output = false;
    }
    return $output;
}

/////////////////

for($cetak=1;$cetak <=100;$cetak++){
    if(cekBIsaDibagi($cetak,3) && cekBIsaDibagi($cetak,5)){
        echo "FooBar<br/>";
    }else if(cekBIsaDibagi($cetak,3)){
        echo "Foo<br/>";
   }else if(cekBIsaDibagi($cetak,5)){
    echo "Bar<br/>";
    }else{
    echo $cetak.'<br/>';
}
}




?>

