<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div align="center">
            <?php
                $username = $_POST[ 'username' ];
                $password = $_POST[ 'password' ];
                
                $repInFile = $username . ":" . $password;
                
                $finalLine = null;   //for check on no new line for last name in file
                
                //go through file
                $file = fopen( 'users.txt', 'r+' ); 
                if( $file )
                {
                    while( ( $currLine = fgets( $file ) ) !== false ) 
                    {
                        //maybe add trim
                        if( $currLine === $repInFile )   //they are a user, set the session variables
                        {
                            $_SESSION[ "currUser" ] = $username;
                            $_SESSION[ $username ] = true;  //says that they have successfully logged in
                            exec('php home.php &> /dev/null &');
                            die();
                        }
                    }
                    
                    //if here they are not a user
                    $_SESSION[ "error" ] = "Your id or password is incorrect.  Please try again.";
                    exec('php login.php &> /dev/null &');
                    die();
                }
                
                else
                {
                    echo 'Error cannot find file';
                }
            ?>
        </div>
    </body>
</html>