<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>add a product</title>
</head>

<body>
    <?php
        include 'DBConnect.php';
        $name = $_GET["name"];
        $tableName = "boodschappenlijst";
        $query = "DELETE FROM $tableName WHERE `product` = '$name' LIMIT 1";
        if(!$stmt = mysqli_prepare($conn, $query)) 
        {
            echo "Failed to prepare statement " , mysqli_error($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, 's', $name);
            if(!mysqli_stmt_execute($stmt)) 
            {
                header("Location: index.php?R=2");
            }
            else 
            {
                header("Location: index.php?R=1");
            }
        }
    ?>
    
</body>

</html>