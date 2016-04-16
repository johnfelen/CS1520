<?php
    session_start();
    if( isset( $_SESSION[ "currUser" ] ) )
    {
        $currUser = $_SESSION[ "currUser" ];
        unset( $_SESSION[ "currUser" ] );   //the site logs them out if they leave the webpage
    }

    else
    {
        $_SESSION[ "error" ] = "You have not logged in.  Please log in first.";
        header( "Location: login.php" );
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body style="color:yellow; background-color:lightblue;">
        <div align="center">
            <?php
                echo "{$currUser}, Welcome to Exercise 4's site.";
            ?>
        </div>
    </body>
</html>
