<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>

    <body style="color:lightgreen; background-color:purple;">
        <br><br>
        <div align="center">
            <button onclick="toggleData()" value="Toggle Data" type="button" style="color:purple; background-color:lightgreen;"> Toggle Data </button>
        </div>
        <br>

        <div align="center" id="dataDisplay"></div>

        <script>
            var dataDownloaded = false;
            function toggleData()
            {
                if( !dataDownloaded )
                {
                    $.ajax( 
                    {
                        url: "./getData.php",
                        type: "POST",
                        data: { "file" : "file1.txt" },
                        success: function( data )
                        {
                            dataDownloaded = true;
                            document.getElementById( "dataDisplay" ).innerHTML = data;
                        }
                    });
                }

                else
                {
                    $( "#dataDisplay" ).toggle();
                }
            }
        </script>
    </body>
</html>
