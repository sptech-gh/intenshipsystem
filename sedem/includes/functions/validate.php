<?php

function validate_num_input($input){
    if(!is_numeric($input)){
        echo "ERROR: INPUT MUST BE NUMERIC";
    }
    
}

function validate_input_string($input){
    if(strlen($input)!=5){
        echo "ERROR: INPUT MUST NOT BE LESS OR EQUAL TO 5";
    }
    
}

?>