<?php include 'header.php' ?>  
    <div id="content">
        <?php
            include 'DBConnect.php';
            $query = "SELECT naam FROM gerecht ORDER BY naam ASC";
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
                        <td class='left'>$productName</td>
                        <td class='right'><a href='addGerecht.php?name=" . $productName . "'>Voeg toe</a></td>
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