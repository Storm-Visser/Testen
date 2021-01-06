<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Boodschappenlijstje</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <div id="menu">
            <p><a href="index.php">Mijn lijst</a></p>
            <p><a href="addProduct.php">Product toevoegen</a></p>
        </div>
        <div id="content">
        <?php
            include 'DBConnect.php';
            $groente = "groente";
            $bami = array($groente);
            $query = "SELECT * FROM boodschappenlijst";
            echo "<table class='border'>
                    <tr class='border'>
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
        </div>
    </body>
</html>