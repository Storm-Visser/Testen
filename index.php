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
            <p><a href="selectProduct.php">Product toevoegen</a></p>
            <p><a href="addNewProduct.php">addNewProduct</a></p>
        </div>
        <div id="content">
        <?php
            include 'DBConnect.php';
            $groente = "groente";
            $bami = array($groente);
            $query = "SELECT * FROM boodschappenlijst";
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
                    mysqli_stmt_bind_result($stmt, $ID, $gerechtName);
                    mysqli_stmt_store_result($stmt);
                    while(mysqli_stmt_fetch($stmt)) 
                    {
                        echo "<tr>
                            <td>$gerechtName</td>
                        </tr>";
                    }
                }
            }
            echo "</table>";
            
            //Yannik's delete dingetje, hij haalt de rijen uit de db en laat het zien in de dropdown
            ?>

            <form method="post" action="index.php">
                <p>Verwijder een product</p>
                <select name="product">
                    <?php
                    $query1 = "SELECT product FROM boodschappenlijst";
                    $sqly = mysqli_query($conn, $query1);
                    while ($row = mysqli_fetch_assoc($sqly))
                    {
                        ?>
                        <option value="<?php echo $row["product"]; ?>"><?php echo $row['product']; ?></option>
                        <?php } ?>
                </select>
                <input type="submit" name="delete" value="Verwijder product">
            </form>
            
             <!--Dit is voor het compleet leeghalen van de lijst  -->
             <br>
            <form method="post" action="index.php">
                <input type="submit" name="delall" value="Alles verwijderen" >
            </form>
            
            <?php
            if (isset($_POST['delete']))
            {
                $product = $_POST['product'];
                $query2 = "DELETE FROM `boodschappenlijst` WHERE `product` = '$product' ";
                if (!$stmt = mysqli_prepare($conn, $query2))
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
                        echo "<p> <font color=red> Product is verwijderd! </p>";
                        echo "<meta http-equiv='refresh' content='1.0'>";
                    }
                }
            }
            
            if(isset($_POST['delAll']))
            {
                $query2 = "TRUNCATE TABLE boodschappenlijst";
                if(!$stmt = mysqli_prepare($conn, $query))
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
                        echo "Het boodschappenlijstje is leeg";
                    }
                }
            }
            ?>
        </div>
    </body>
</html>