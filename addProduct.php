<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>add a product</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    </form>
    <?php
        include 'DBConnect.php';
        $groente = "groente";
        $bami = array($groente);
        $query = "SELECT * FROM producten";
        echo "table style='border:1px solid black'>
                tr>
                        th>ID/th>
                        th>Product/th>
                        th>Addth>
                /tr>";
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
                    echo "tr>
                    td>$ID/td>
                    td>$gerechtName/td>
                    /tr>";
                }
            }
        }
        echo "/table>";

        function addProduct($ID)
        {
            
        }
    ?>
</body>

</html>