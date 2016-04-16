<?php
    session_start();
    if( isset( $_SESSION[ "error" ] ) )
    {
        $error = (String) $_SESSION[ "error" ];
        echo $error;
        unset( $_SESSION[ "error" ] );  //so it doesn't keep reprinting if you reload login.php
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body style="color:yellow; background-color:lightblue;">
        <div align="center">
            <form method="post" action="./process.php">
                <p>Enter Your Username: <br></p>
                <input type="text" name="username">

                <p>Enter Your Password: <br></p>
                <input type="password" name="password">

                <button type="submit" value="Submit" style="color:yellow; background-color:lightblue;"> Submit </button>
            </form>
        </div>
    </body>
</html>
