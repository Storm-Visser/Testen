<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>add a product</title>
</head>

<body>
    <?php
        include 'DBConnect.php';
        $Name = $_GET["name"];
        $TableName1 = "gerecht";
        $TableName2 = "boodschappenlijst";
        //haal de ingredienten op
        $query1 = "SELECT * FROM " . $TableName1 . " WHERE name = " . $Name;
        if(!$stmt1 = mysqli_prepare($conn, $query)) 
            {
                echo "Failed to prepare statement " , mysqli_error($conn);
            }
            else 
            {
                if(!mysqli_stmt_execute($stmt1)) 
                {
                    echo "Failed to execute statement";
                }
                else 
                {
                    mysqli_stmt_bind_result($stmt1, $productName);
                }
            }



        //zet het in de database
        $query2 = "INSERT INTO " . $TableName2 . " VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
        if(!$stmt2 = mysqli_prepare($conn, $query2)) 
        {
            echo "Failed to prepare statement " , mysqli_error($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt2, 's', $Name);
            
        }

    ?>
</body>

</html>