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
            $query = "SELECT name FROM gerecht";
            echo "<table style='border:1px solid black'>
                    <tr>
                            <th>Gerecht</th>
                            <th>voeg toe<th>
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
                    mysqli_stmt_bind_result($stmt, $productName);
                    mysqli_stmt_store_result($stmt);
                    while(mysqli_stmt_fetch($stmt)) 
                    {
                        echo "<tr>
                        <td>$productName</td>
                        <td><a href='addGerecht.php?name=" . $productName . "'>Voeg toe</a></td>
                        </tr>";
                    }
                }
            }
            echo "</table>";
            if(!empty($_GET["R"]))
            {
                if($_GET["R"] == 1)
                {
                    echo "<p>Gerecht toegevoegd aan boodschappenlijstje</p>";
                }
                else
                {
                    echo "<p>er is iets fout gegaan met het toevoegen van het gerecht</p>";
                }
            }
        ?>
    </div>
</body>

</html>