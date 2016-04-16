<?php
    //three variables
    $element_one = "ONE";
    $element_two = 2;
    $element_three = 3.0;
    
    $GLOBALS = array( $element_one, $element_two ); //global variable and array
    array_push( $GLOBALS, $element_three );
?>