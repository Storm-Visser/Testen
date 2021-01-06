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
        $TableName = "boodschappenlijst";
        $query = "INSERT INTO " . $TableName . " VALUES(NULL, ?)";
        if(!$stmt = mysqli_prepare($conn, $query)) 
        {
            echo "Failed to prepare statement " , mysqli_error($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt, 's', $Name);
            if(!mysqli_stmt_execute($stmt)) 
            {
                header("Location: selectProduct.php?R=2");
            }
            else 
            {
                header("Location: selectProduct.php?R=1");
            }
        }
    ?>
    
</body>

</html>