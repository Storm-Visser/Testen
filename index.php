<?php include 'header.php' ?>
        <div id="content">
        <?php
            include 'DBConnect.php';
            $groente = "groente";
            $bami = array($groente);
            $query = "SELECT product, count(product) FROM boodschappenlijst GROUP BY product";
            echo "<table class='border'>
                    <tr class='border'>
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
                    mysqli_stmt_bind_result($stmt, $gerechtName, $count);
                    mysqli_stmt_store_result($stmt);
                    while(mysqli_stmt_fetch($stmt)) 
                    {
                        echo "<tr>
                            <td>$gerechtName</td>
                            <td>$count</td>
                            <td><a href='deleteProduct.php?name=" . $gerechtName . "'>Verdwijder</a></td>
                        </tr>";
                    }
                }
            }
            
            echo "</table>";

            if(!empty($_GET["R"]))
            {
                if($_GET["R"] == 1)
                {
                    echo "<p>Product verdwijderd van het boodschappenlijstje</p>";
                }
                else if($_GET["R"] == 2)
                {
                    echo "<p>er is iets fout gegaan met het toevoegen van het product</p>";
                }
                else
                {
                    echo "<p>Alles is verdwijderd</p>";
                }
            }
            ?>
            
             <!--Dit is voor het compleet leeghalen van de lijst  -->
             <br>
            <form method="post" action="index.php">
                <input type="submit" name="delAll" value="Alles verwijderen" >
            </form>
            
            <?php
            //Alles verdwijderen
            if(isset($_POST['delAll']))
            {
                $query2 = "TRUNCATE TABLE boodschappenlijst";
                if(!$stmt = mysqli_prepare($conn, $query2))
                {
                    echo "failed to prepare statement";
                }
                else
                {
                    if(!mysqli_stmt_execute($stmt))
                    {
                        echo "failed to execute statement";
                    }
                    else
                    {
                        header("Location: index.php?R=3");
                    }
                }
            } 
            ?>
        </div>
    </body>
</html>