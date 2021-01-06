<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>voeg een gerecht toe</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div id="content">
        <?php
            include 'DBConnect.php';
            $groente = "groente";
            $bami = array($groente);
            $query = "SELECT * FROM producten";
            echo "<table style='border:1px solid black'>
                    <tr>
                            <th>Product</th>
                            <th>Add<th>
                    </tr>";
            if(!$stmt = mysqli_prepare($conn, $query)) 
            {
                echo "Failed to prepare statement " , mysqli_error($conn);
            }
            else 
            {
                if(!mysqli_stmt_execute($stmt)) 
                {
                    echo "Failed to execute statement";
                }
                else 
                {
                    mysqli_stmt_bind_result($stmt, $ID, $productName);
                    mysqli_stmt_store_result($stmt);
                    while(mysqli_stmt_fetch($stmt)) 
                    {
                        echo "<tr>
                        <td>$productName</td>
                        <td><a href='addProduct.php?name=" . $productName . "'>Voeg toe</a></td>
                        </tr>";
                    }
                }
            }
            echo "</table>";
            if(!empty($_GET["R"]))
            {
                if($_GET["R"] == 1)
                {
                    echo "<p>Product toegevoegd aan boodschappenlijstje</p>";
                }
                else
                {
                    echo "<p>er is iets fout gegaan met het toevoegen van het product</p>";
                }
            }
        ?>
    </div>
</body>

</html>