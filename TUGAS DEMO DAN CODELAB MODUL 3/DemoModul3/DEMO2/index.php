<?php

class cetakbilangan{
    public function inputn($n){
        for($i = 1;$i<=$n;$i++){
            if($i%4==0 && $i%6==0){
                echo "Pemrograman Website 2024\n";
            }elseif($i%5==0){
                echo "2024\n";
            }elseif($i%4==0){
                echo "Pemrograman\n";
            }elseif($i%6==0){
                echo "Website\n";
            }else{
                echo $i . "\n";
            }
        }
    }
}

$obj = new cetakbilangan();
$obj->inputn(25);