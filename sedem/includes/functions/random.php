<?php

function random_fxn(){
    
    $digits_needed = 8;
    $random_number = '';
    $count = 0;
    
    while($count < $digits_needed){
        $random_digit = mt_rand(0,9);
        
        $random_number .= $random_digit;
        $count++;
    }
    echo $random_number();
    
}

?>