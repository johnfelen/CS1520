<?php
    $exerciseFiveDB = new mysqli( "localhost", "root", "jfelen62", "exercise five" );
    if( $exerciseFiveDB->connect_error )
    {
        die( "Error connecting to database" );
    }

    $tuples = "SELECT * FROM `People`";
    if( !$exerciseFiveDB->query( $tuples ) ) //create table if not there
    {
        include "create-db.php";
    }

    $secondTime = false;
    if( isset( $_POST[ "firstName" ] ) && isset( $_POST[ "lastName" ] ) )
    {
        $secondTime = true; //allows the table to be printed out after the form
        $firstName = $_POST[ "firstName" ];
        $lastName = $_POST[ "lastName" ];

        $queryInfo = "SELECT * FROM `People` WHERE FName = '{$firstName}' AND LName = '{$lastName}'";
        if( mysqli_num_rows( $exerciseFiveDB->query( $queryInfo ) ) )
        {
            echo "{$firstName} {$lastName} you are already in the database.";
        }

        else
        {
            $queryInfo = "INSERT INTO `People` ( `FName`, `LName` ) VALUES ( '{$firstName}', '{$lastName}' )";
            if( $exerciseFiveDB->query( $queryInfo ) )
            {
                echo "{$firstName} {$lastName} you have been added to the database.";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body style="color:blue; background-color:lightgreen;">
        <div align="center">
            <form method="post" action="./list-db.php">

                <p>Enter Your Name: <br></p>
                <input type="text" placeholder="First Name" name="firstName">
                <input type="text" placeholder="Last Name" name="lastName">

                <br><br>
                <button type="submit" value="Submit" style="color:blue; background-color:lightgreen;"> Submit </button>
                <br>
            </form>
            <?php
                if( $secondTime )
                {
                    echo "<p>People already in the database:<br><br>";
                    $listTuples = $exerciseFiveDB->query( $tuples );
                    while( $row = $listTuples->fetch_assoc() )
                    {
                        echo "{$row[ "FName" ]} {$row[ "LName" ]}<br>";
                    }
                    echo "</p>";
                }
            ?>
        </div>
    </body>
</html>
