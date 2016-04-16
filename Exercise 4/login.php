<?php
    session_start();
    if( isset( $_SESSION[ "error" ] ) )
    {
        $error = (String) $_SESSION[ "error" ];
        echo $error;
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div align="center">
            <form method="post" action="/process.php">
                <p>
                Enter Your Username: <br>
                </p>
                <input type="text" name="username">
                
                <p>
                Enter Your Password: <br>
                </p>
                <input type="password" name="username">
                
                <button type="submit" value="Submit"> Submit </button>
            </form>
        </div>
    </body>
</html>