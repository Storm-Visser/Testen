<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Boodschappenlijstje</title>
        <link rel="stylesheet" href="style/stylecss">
    </head>
    <body>
        <?php
            include 'DBConnect.php';
            $groente = "groente";
            $bami = array($groente);
            $query = "SELECT * FROM ingrediënten";
            echo "<table style='border:1px solid black'>
                    <tr>
                            <th>ID</th>
                            <th>Product</th>
                    </tr>";
            if(!$stmt = mysqli_prepare($conn, $query)) 
            {
                echo "Failed to prepare statement";
            }
            else 
            {
                if(!mysqli_stmt_execute($stmt)) 
                {
                    echo "Failed to execute statement";
                }
                else 
                {
                    mysqli_stmt_bind_result($stmt, $ID, $gerechtName);
                    mysqli_stmt_store_result($stmt);
                    while(mysqli_stmt_fetch($stmt)) 
                    {
                        echo "<tr>
                            <td>$ID</td>
                            <td>$gerechtName</td>
                        </tr>";
                    }
                }
            }
            echo "</table>";
        ?>
    </body>
</html>