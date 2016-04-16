<?php
    $exerciseFiveDB = new mysqli( "localhost", "root", "jfelen62", "exercise five" );
    if( $exerciseFiveDB->connect_error )
    {
        die( "Error connecting to database" );
    }

    $createTable = "CREATE TABLE `People` (
                    `FName` text NOT NULL,
                    `LName` text NOT NULL
                    )";

    if( !$exerciseFiveDB->query( $createTable ) === true )
    {
        die( "Error Creating table: " . $exerciseFiveDB->error );
    }
?>
