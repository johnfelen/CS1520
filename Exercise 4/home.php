<?php
    session_start();
    if( isset( $_SESSION[ "currUser" ] ) )
    {
        $currUser = $_SESSION[ "currUser" ];
        if( isset( $_SESSION[ $currUser ] ) && $_SESSION[ $currUser ] === true )    //the true is since I set two session variables earlier
        {
            echo "Welcome {$currUser} to Exercise 4's site";
        }
        
        else    //the two elses are for the failing either of the session variable checks
        {
            $_SESSION[ "error" ] = "You have not logged in.  Please log in first.";
            exec('php login.php &> /dev/null &');
            die();
        }
    }
    
    else
    {
        $_SESSION[ "error" ] = "You have not logged in.  Please log in first.";
        exec('php login.php &> /dev/null &');
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    </body>
</html>