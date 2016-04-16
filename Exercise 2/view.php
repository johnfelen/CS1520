<!DOCTYPE html>
<html>
    <head>
    </head>
    
    <body>
    
        <?php 
            include 'include.php';
            foreach( $GLOBALS as $value )   //iterate through global array
            {
                echo $value;    //display output
                echo "\n";
                if( $value === 2 )  //conditional to check if it is an 2 typed int
                {
                    echo '<body bgcolor="#E6E6FA">';    //affecting the view
                }
            }
        ?>
    
    </body>
</html>