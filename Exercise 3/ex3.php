<!DOCTYPE html>
<html>
    <head>
    </head>
    
    <body bgcolor="FFAE19">
    
        <br><br>
        <div align="center">
            <p style="color:green; font-size:24px">
                <?php
                    $name =  $_POST['name'];    //get the name that they inputted
                    $alreadyRegistered = false; //will be set to true if the user is already registered
                    $name = trim( $name );
                    
                    $finalLine = null;   //for check on no new line for last name in file
                    $file = fopen( 'names.txt', 'r+' ); 
                    if( $file )
                    {
                        while( ( $line = fgets( $file ) ) !== false ) //loop through file
                        {
                            $finalLine = $line;
                            if( trim( $line ) === $name )   //they are already registered
                            {
                                echo "{$name}, you've already been registered.";
                                $alreadyRegistered = true;
                                break;
                            }
                        }
                        
                        if( !$alreadyRegistered )   //register them
                        {
                            echo "Congratulations {$name}, you've been registered!";
                                
                            if( $finalLine === trim( $finalLine ) ) //check incase need to add new line since the file did not end with a new line
                            {
                                $name = "\n{$name}";
                            }
                            fwrite( $file, $name );
                            fwrite( $file, "\n" );
                            fclose( $file );
                        }
                    }
                    
                    else
                    {
                        echo 'Error cannot find file';
                    }
                ?>
            </p>
            <button onclick="goBack()"> Go Back</button>
            <script>
                function goBack()
                {
                    window.history.back();
                }
            </script>
        </div>
    </body>
</html>