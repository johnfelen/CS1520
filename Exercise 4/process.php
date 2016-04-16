<?php
    session_start();
    $username = $_POST[ "username" ];
    $password = $_POST[ "password" ];
    $loginCreds = trim( $username . ":" . $password );

    $file = fopen( "users.txt", "r+" );
    if( $file )
    {
        while( ( $currLine = fgets( $file ) ) !== false )
        {
            $currLine = trim( $currLine );

            if( $currLine === $loginCreds )   //they are a user, set the session variables
            {
                $_SESSION[ "currUser" ] = $username;
                header( "Location: home.php" );
                die();
            }
        }

        //if here they are not a user
        $_SESSION[ "error" ] = "Your id or password is incorrect.  Please try again.";
        header( "Location: login.php" );
    }

    else
    {
        echo "Error cannot find file";
    }
?>
